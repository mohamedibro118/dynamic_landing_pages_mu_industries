<?php

namespace App\Http\Controllers\admin;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\admin\Agent;
use App\Models\admin\CompanyProfile;
use App\Models\AdminProfile;
use App\Models\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Intl\Languages;
use App\Traits\Myfun;
use Illuminate\Support\Facades\Gate;

class CompanyProfileController extends Controller
{
    use Myfun;
    public function edit(Request $request): View
    {
        Gate::authorize('company_profile.edit');
        // dd($request->id );
        $user = Auth::guard('admin')->user();
        $agent = $user->agent;
        if ($agent) {
            return view('dashbourd.company_profile.edit', [
                'agent' => $agent,
                'countries' => Countries::getNames(),
                'locales' => Languages::getNames(),
            ]);
        } elseif ($request->id) {
            $agent=Agent::find($request->id);
            if($agent){
                return view('dashbourd.company_profile.edit', [
                'agent' => $agent,
                'countries' => Countries::getNames(),
                'locales' => Languages::getNames(),
            ]);}
            else{
                abort(403);
            }
            
        } elseif ($user->suber_admin) {
            return view('dashbourd.agents.index', [
                'agents' => Agent::paginate(PAGINATE),
            ]);
        } else {
            abort(403);
        }
    }


    public function update(Request $request,$id)
    { 
        Gate::authorize('company_profile.update');
        $agent=Agent::find($id);
        $companyprofile = $agent->companyprofile;
        request()->validate([
            'email' => 'string|email|max:255',
            'phone' => ['sometimes', 'required','regex:/(011)|(012)|(010)|(015)[0-9]{8}/'],
            'whats' => ['sometimes', 'required','regex:/(011)|(012)|(010)|(015)[0-9]{8}/'],
            'logo' => 'image|mimes:jpeg,jpg,gif,webp,png|dimensions:min_width=250,min_height=250|max:1024',
         
        ]);

     
        // $user->profile->fill($request->all())->save();

        if ($companyprofile && $companyprofile->mobile) {
            
            $data = $request->except('logo');
            $oldlogo = $companyprofile->logo;
            if ($request->hasFile('logo')) {
                $logo = $this->uploade($request, 'companyprofile/logo');
                $data['logo'] = $logo;
            }
            $companyprofile->update($data);

            if ($oldlogo && isset($data['logo'])) {
                $this->deleteprev($oldlogo);
                // Storage::disk('uploade')->delete($oldlogo);
            }
        } else {
            $data = $request->except('agent_id', 'logo');
            $data['agent_id'] = $agent->id;
            if ($request->hasFile('logo')) {
               
                $logo = $this->uploade($request, 'companyprofile/logo');
                $data['logo'] = $logo;
            }
            CompanyProfile::create($data);
        }


        return Redirect::route('dashbourd.companyprofiles.edit')->with('success', 'profile-updated');
    }
}
