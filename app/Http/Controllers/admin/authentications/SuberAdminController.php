<?php

namespace App\Http\Controllers\admin\authentications;

use App\Http\Controllers\admin\Controller;
use App\Models\admin\Admin;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Validation\Rule;

class SuberAdminController extends Controller
{

    public function index()
    {
        $admins = Admin::with('roles')->where('suber_admin', '1')->get();
        return view('dashbourd.suberadmins.index', [
            'admins' => $admins,
        ]);
    }


    public function create()
    {
        return view('dashbourd.suberadmins.create', [
            'admin' => new Admin(),
        ]);
    }



    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(Admin::class),

            ],
            'password' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255',"unique:admins,username"],
            'phone_number' => ['required','unique:admins,phone_number','regex:/^(010|011|012|015|017)\d{8}$/','string', 'max:255'],
        ]);


        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'username' => $request->username,
            'phone_number' => $request->phone_number,
            'suber_admin' => 1,
        ]);

        return redirect()->route('dashbourd.wzgate.suberadmins.index')
            ->with('success', 'added admin successfully');
    }





    public function edit(Admin $suberadmin)
    {

        return view('dashbourd.suberadmins.edit', [
            'admin' => $suberadmin,
        ]);
    }


    public function update(Request $request, Admin $suberadmin)
    {

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255', "unique:admins,email,$suberadmin->id",

            ],
            'password' => ['sometimes', 'required', 'string', 'max:255'],
            'username' => ['sometimes', 'required', 'string', 'max:255',"unique:admins,username,$suberadmin->id"],
            'phone_number' => ['sometimes', 'required', 'string', 'max:255','regex:/^(010|011|012|015|017)\d{8}$/',"unique:admins,phone_number,$suberadmin->id"],
        ]);



        $suberadmin->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::check($suberadmin->password, $request->password) ? $suberadmin->password : Hash::make($request->password),
            'username' => $request->username,
            'phone_number' => $request->phone_number,
           
        ]);



        return redirect()->route('dashbourd.wzgate.suberadmins.index')
            ->with('success', 'update  admin successfully');
    }


    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();
        return redirect()->route('dashbourd.wzgate.suberadmins.index')
            ->with('success', 'admin deleted successfully');
    }
}
