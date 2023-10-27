<?php

namespace App\Http\Controllers\admin\authentications;

use App\Http\Controllers\admin\Controller;
use App\Models\admin\Admin;
use App\Models\admin\Agent;
use App\Models\admin\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{

    public function index()
    {
        Gate::authorize('admins.index');
        $query = Admin::query();

        $admins = $query->with('roles')->where('suber_admin', '0')->get();
        return view('dashbourd.authentication.admins.index', [
            'admins' => $admins,
        ]);
    }


    public function create()
    {
        Gate::authorize('admins.create');
        $roles = Role::all();
        $agents = Agent::select('id', 'name_' . App::getLocale() . ' as name')->get();
        return view('dashbourd.authentication.admins.create', [
            'admin' => new Admin(),
            'roles' => $roles,
            'agents' => $agents,
        ]);
    }


    public function store(Request $request)
    {
        Gate::authorize('admins.create');
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(Admin::class),

            ],
            'roles' => 'required|array|min:1',
            'password' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255','unique:admins,username'],
            'phone_number' => ['required', 'string', 'max:255','regex:/^(010|011|012|015|017)\d{8}$/'],
            'agent_id' => ['required', 'int'],
        ]);


        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'username' => $request->username,
            'phone_number' => $request->phone_number,
            'agent_id' => $request->agent_id
        ]);

        $admin->roles()->attach($request->roles);

        return redirect()->route('dashbourd.authentication.admins.index')
            ->with('success', 'added admin successfully');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(Admin $admin)
    {
        Gate::authorize('admins.edit');
        $roles = Role::all();
        $agents = Agent::select('id', 'name_' . App::getLocale() . ' as name')->get();
        return view('dashbourd.authentication.admins.edit', [
            'admin' => $admin,
            'roles' => $roles,
            'agents' => $agents
            // 'admin_roles' => $admin_roles
        ]);
    }


    public function update(Request $request, Admin $admin)
    {
        Gate::authorize('admins.update');
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255', "unique:admins,email,$admin->id",

            ],
            'roles' => 'required|array|min:1',
            'password' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255',"unique:admins,username,$admin->id"],
            'phone_number' => ['required', 'string', 'max:255','regex:/^(010|011|012|015|017)\d{8}$/'],
            'agent_id' => ['required', 'int'],
        ]);


        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'username' => $request->username,
            'phone_number' => $request->phone_number,
            'agent_id' => $request->agent_id
        ]);

        $admin->roles()->sync($request->roles);

        return redirect()->route('dashbourd.authentication.admins.index')
            ->with('success', 'update  admin successfully');
    }


    public function destroy($id)
    {
        Gate::authorize('admins.delete');
        $admin = Admin::find($id);
        $admin->delete();
        return redirect()->route('dashbourd.authentication.admins.index')
            ->with('success', 'admin deleted successfully');
    }

    public function forceDelete($id)
    {
        Gate::authorize('admins.force_delete');
        $admin = Admin::onlyTrashed()->where('id', $id)->first();
        $admin->forceDelete();

        return redirect()->back()->with('success', 'success operation');;
    }


    public function trash()
    {
        Gate::authorize('admins.trash');
        $admins = Admin::onlyTrashed()->where('suber_admin', '0')->paginate(PAGINATE);
        return view('dashbourd.authentication.admins.trashed', [
            'admins' => $admins
        ]);
    }


    public function restore($id)
    {
        Gate::authorize('admins.restore');
        $admin = Admin::onlyTrashed()->where('id', $id)->first();
        $admin->restore();
        return redirect()->route('dashbourd.authentication.admins.index')->with('success', 'success operation');
    }
}
