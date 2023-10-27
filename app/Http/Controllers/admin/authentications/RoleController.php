<?php

namespace App\Http\Controllers\admin\authentications;

use App\Models\admin\Role;
use App\Models\admin\RoleAbilities;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{

    public function index()
    {
        Gate::authorize('roles.index');
        $roles = Role::all();
        return view('dashbourd.authentication.roles.index', compact('roles'));
    }


    public function create()
    {
        Gate::authorize('roles.create');
        return view('dashbourd.authentication.roles.create', [
            'role' => new Role(),
        ]);
    }


    public function store(Request $request)
    {
        Gate::authorize('roles.create');
        DB::beginTransaction();
        try {
            $request->validate([
                'name_en' =>'required|string|max:255',
                'abilities' => 'required|array|max:255',
            ]);

            $role = Role::create([
                'name_en' => $request->name_en,
                'name_ar' => $request->name_ar,
            ]);

            foreach ($request->post('abilities') as $ability=>$value) {
                RoleAbilities::create([
                    'role_id' => $role->id,
                    'ability' => $ability,
                    'type' => $value,
                ]);
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }

        return redirect()->route('dashbourd.authentication.roles.index')
        ->with('success','roles added successfully');
    }


    public function show(Role $role)
    {
        //
    }


    public function edit(Role $role)
    {
        Gate::authorize('roles.edit');
        $role_abilities=$role->abilities()->pluck('type','ability')->toArray();
       return view('dashbourd.authentication.roles.edit', [
        'role_abilities' => $role_abilities,
        'role'=>$role
       ]);
    }


    public function update(Request $request, Role $role)
    {
        Gate::authorize('roles.update');
        DB::beginTransaction();
        try {
            $request->validate([
                'name_en' =>'sometimes|required|string|max:255',
                'abilities' => 'sometimes|required|array|max:255',
            ]);

            $role->update([
                'name_en' => $request->name_en,
                'name_ar' => $request->name_ar,
            ]);

            foreach ($request->post('abilities') as $ability=>$value) {
                RoleAbilities::updateOrCreate([
                    'role_id' => $role->id,
                    'ability' => $ability,
                    ],
                    [
                    'type' => $value,
                    ]);
            }
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }

        return redirect()->route('dashbourd.authentication.roles.index')
        ->with('success','roles updated successfully');
    }


    public function destroy($id)
    {
        Gate::authorize('roles.delete');
        $role=Role::find($id);
        $role->delete();
        return redirect()->route('dashbourd.authentication.roles.index')
        ->with('success','roles deleted successfully');
    }
}
