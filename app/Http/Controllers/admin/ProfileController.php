<?php

namespace App\Http\Controllers\admin;

use App\Traits\Myfun;

use App\Models\admin\AdminProfile as AdminAdminProfile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Intl\Languages;
class ProfileController extends Controller
{
    use Myfun;
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {

        $user = Auth::guard('admin')->user();

        return view('dashbourd.profile.edit', [
            'user' => $request->user(),
            'countries' => Countries::getNames(),
            'locales' => Languages::getNames(),
        ]);
    }


    public function update(Request $request)
    {
        $user = Auth::guard('admin')->user();
        request()->validate([
            'username' => ['required',"unique:admins,username,$user->id"],
            'phone_number' => ['required','regex:/^(010|011|012|015|017)\d{8}$/',"unique:admins,phone_number,$user->id"],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'birthday' => ['nullable', 'date', 'before:today'],
            'country' => ['required', 'string', 'size:2'],
            'whats'=>['nullable','regex:/^(010|011|012|015|017)\d{8}$/'],
            'logo' => 'image|mimes:jpeg,jpg,gif,webp,png|dimensions:min_width=520,min_height=400|max:1024',
        ]);
       
        
        $user->username = $request->username;
        $user->phone_number = $request->phone_number;
        if ($request->password) {
            $user->password =Hash::make($request->password);
        }
        $user->save();

        // $user->profile->fill($request->all())->save();

        $profile = $user->profile;
        // dd( $profile->first_name);
        if ($profile->first_name) {

            $data = $request->except('logo');
            if ($request->hasFile('logo')) {
                $logo = $this->uploade($request, 'profile');
                $data['logo'] = $logo;
            }
            $profile->update($data);
        } else {

            $request->merge([
                'admin_id' => $user->id,
            ]);
            $data = $request->except('logo');
            if ($request->hasFile('logo')) {
                $logo = $this->uploade($request, 'profile');
                $data['logo'] = $logo;
            }
            AdminAdminProfile::create($data);
        }


        return Redirect::route('profile.edit')->with('success', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
