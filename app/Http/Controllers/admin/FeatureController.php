<?php

namespace App\Http\Controllers\admin;

use App\Models\admin\Feature;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\admin\Controller;
// use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;

class FeatureController extends Controller
{

    public function index()
    {
        Gate::authorize('features.index');
        $query = Feature::query();
        $features = $query
            ->filter(request()->all())->paginate(PAGINATE);
        return view('dashbourd.realestate_workflow.features.index', [
            'features' => $features
        ]);
    }


    public function create()
    {
        Gate::authorize('features.create');
        $feature = new feature();
        return view('dashbourd.realestate_workflow.features.create', [
            'feature' => $feature,
        ]);
    }


    public function store(Request $request)
    {
        Gate::authorize('features.create');
        $request->validate([
            'name_ar' => 'sometimes|required|unique:features,name_ar|max:255',
            'name_en' => 'sometimes|required|unique:features,name_en,|max:255',
        ], $this->getmessage());
        $feature = Feature::create($request->all());
        return redirect()->route('dashbourd.realestate_workflow.features.index')->with('success', 'new feature added successfully');
    }



    public function edit($id)
    {
        Gate::authorize('features.edit');
        $feature = Feature::find($id);
        return view('dashbourd.realestate_workflow.features.edit', [
            'feature' => $feature,
        ]);
    }


    public function update(Request $request, $id)
    {
        Gate::authorize('features.update');
        $feature = Feature::find($id);
        $request->validate([
            'name_ar' => 'sometimes|required|unique:features,name_ar,' . $id . '|max:255',
            'name_en' => 'sometimes|required|unique:features,name_en,' . $id . '|max:255',
        ], $this->getmessage());

        $feature->update($request->all());
        return redirect()->route('dashbourd.realestate_workflow.features.index')->with('success', 'operation successfully');
    }


    public function destroy($id)
    {
        Gate::authorize('features.delete');
        $feature = Feature::find($id);
        $feature->delete();
        return redirect()->route('dashbourd.realestate_workflow.features.index')->with('success', 'operation successfully');
    }
    public function getmessage()
    {
        return [
            'name_ar.required' => 'Please enter the feature arabic name',
            'name_ar.unique' => 'arabic name of features must be unique',
            'name_en.required' => 'Please enter the feature english name',
            'name_en.unique' => 'english name of features must be unique',
            'attatchment.mimes' => 'importing files must be type of excel '


        ];
    }


  
}
