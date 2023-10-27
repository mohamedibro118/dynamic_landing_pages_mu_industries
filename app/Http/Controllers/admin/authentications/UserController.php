<?php

namespace App\Http\Controllers\admin\authentications;
use Illuminate\Http\Request;
use App\Models\admin\User;
use App\Models\admin\Role;
use App\Models\admin\profile;
use Illuminate\Foundation\Auth\ConfirmsPasswords;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
   
    public function __construct()
    {
   
    }



    public function index()
    {   
        Gate::authorize('users.index');
        $users=User::paginate(PAGINATE);
        return view('dashbourd.authentication.users.index')->with('users',$users);
    }

    public function create()
    {   
        $roles=Role::all();
        if($roles->count()==0){
            return redirect()->route('role.create');
        }
        return view('dashbourd.authentication.users.create')->with('roles',$roles);
    }

    
    // public function store(Request $request)
    // {   
    //     $this->validate($request,[
    //         'name' => 'required',
    //         'email' =>'required',
    //         'password' => 'required',
    //          'roles' => 'required'
    //     ]);
    //     $user=User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => FacadesHash::make($request->password)
    //     ]);

    //    $profile= profile::create([
    //            'name'=>$user->name,
    //            'email'=>$user->email,
    //            'password'=>$user->password,
    //            'user_id'=>$user->id
    //     ]);

    //     $user->roles()->attach($request->roles);
    //     return redirect()->route('dashbourd.authentication.users.index');
    // }

    public function edit($id)
    {
        $roles=Role::all();
        $user=User::find($id);
        return view('dashbourd.authentication.users.edit')->with('user',$user)->with('roles',$roles);
    }

   
    public function update(Request $request, $id)
    {
        $user=User::find($id);
        $this->validate($request,[
            'name' => 'required',
            'email' =>'required',
            'password' => 'required',
            'roles'=>'required'
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>FacadesHash::make($request->password)
        ]);

       $user->profile->update([
               'name'=>$user->name,
               'email'=>$user->email,
               'password'=>$user->password,
               'user_id'=>$user->id
        ]);
        $user->roles()->sync($request->roles);
        return redirect()->route('dashbourd.authentication.users.index');
    }

    public function destroy($id)
    {
        Gate::authorize('users.delete');
       $user=User::find($id);
       $user->delete();
       return redirect()->route('dashbourd.authentication.users.index');
    }
}
