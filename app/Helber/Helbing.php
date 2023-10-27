<?php
namespace App\Helber;
use App\Models\admin\Dbnotification;
use App\Models\admin\Module;
use App\Models\admin\Agent;
use App\Models\Message;
use App\Models\Sitesitting;
use Illuminate\Support\Facades\Auth;

class Helbing
{


  public static function getCompanyDetails(){
    $agent=Agent::where('status','active')->first();
    return $agent;
    }

  public static function getTelData($caller){
    $agent = $caller->agent;
    $admin = $caller->admin;
    // dd($admin);
    $mobile = '';
    $whats = '';
    $companyprofile = $agent ? $agent->companyprofile : '';
     
    if ($companyprofile && $companyprofile->cta_source == 'company') {

        $mobile = $companyprofile->phone;
        $whats = $companyprofile->whats;
    } elseif ($admin) {
        $mobile = $admin->phone_number;
        $whats = $admin->profile->whats;
    }
    // dd($whats);
   
    return ['phone'=>$mobile,'whats'=>$whats];
    }
  }
   
  


