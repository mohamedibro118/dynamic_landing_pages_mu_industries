<?php

namespace App\Http\Controllers;

use App\Http\Controllers\admin\Controller;
use App\Models\admin\Type;
use App\Models\UnitType;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Traits\Myfun;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class UnitTypeController extends Controller
{
    use Myfun;
    public function index()
    {
        // Gate::authorize('types.index');
        $query = UnitType::query();
        $types = $query->filter(request()->all())->paginate(PAGINATE);
        return view('dashbourd.realestate_workflow.types.index', [
            'types' => $types
        ]);
    }


    public function create()
    {
        // Gate::authorize('types.create');
        $type = new UnitType();
        return view('dashbourd.realestate_workflow.types.create', [
            'type' => $type,
        ]);
    }


    public function store(Request $request)
    {
        // Gate::authorize('types.create');
        $inputUnitType = $request->input('name');

        // Check if the unit type already exists
        $unitType = UnitType::firstOrNew(['name' => $inputUnitType]);
        $unitType->save();

        $response = [
            'success' => true,
            'message' => 'Unit type added successfully',
            'id' => $unitType->id // Replace with the actual ID of the newly added unit type
        ];
    
        return response()->json($response);
    }



    public function edit($id)
    {
        // Gate::authorize('types.edit');
        $type = UnitType::find($id);
        return view('dashbourd.realestate_workflow.types.edit', [
            'type' => $type
        ]);
    }





    public function update(Request $request, $id)
    {
        // Gate::authorize('types.update');
        $type = UnitType::find($id);
        $oldimage = $type->image;
        $this->validate($request, [
            'logo' => 'sometimes|required|image|mimes:jpeg,jpg,gif,svg,webp,png|dimensions:min_width=520,min_height=400|max:1024',
            'name_ar' => 'sometimes|required|unique:types,name_ar,' . $id . '|max:255',
            'name_en' => 'sometimes|required|unique:types,name_en,' . $id . '|max:255',
        ], $this->getmessage());
        $data = $request->except(['logo', 'slug_en', 'slug_ar']);
        $data['slug_en'] = Str::slug($request->name_en);
        $data['slug_ar'] = Str::slug($request->name_ar);
        if ($request->hasFile('logo')) {
            $logo = $this->addlogo($request, 'logo', 'uploade/types');
            $data['logo'] = $logo;
        }
        $type->update($data);
        if ($oldimage && isset($data['logo'])) {
            $this->deleteprevlogo($oldimage);
            // Storage::disk('uploade')->delete($oldimage); // by defalut disk is defined in env of filesystem
        }
        return redirect()->route('dashbourd.realestate_workflow.types.index')->with('success', 'success operation');
    }


    public function destroy($id)
    {
        // Gate::authorize('types.delete');
        $type = UnitType::find($id);
        $type->delete();
        return redirect()->route('dashbourd.realestate_workflow.types.index')->with('success', 'success operation');
    }


    public function getmessage()
    {
        return [
            'logo.required' => 'Please choose the image for type',
            'logo.image' => 'file must be image of type jpeg,jpg,gif,svg,webp,png',
            'logo.max' => 'image size must be max 1 mb',
            'logo.mimes' => ' type of image must be jpeg,jpg,gif,svg,webp,png',
            'logo.dimensions' => 'image dimensions must be 520*400',
            'name_ar.required' => 'Please enter the type arabic name',
            'name_ar.unique' => 'arabic name of types must be unique',
            'name_en.required' => 'Please enter the type english name',
            'name_en.unique' => 'english name of types must be unique',
            'attatchment.mimes' => 'importing files must be type of excel '

        ];
    }
}
