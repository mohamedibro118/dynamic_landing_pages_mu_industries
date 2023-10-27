<?php

namespace App\Http\Controllers\themes;

use App\Models\themes\SnipptsCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
class SnipptsCodeController extends Controller
{
  
  
    public function edit(Request $request)
    {

        $user = Auth::guard('admin')->user();
        $codes=SnipptsCode::where('admin_id',$user->id)->first();
        return view('dashbourd.snippet_code.edit', [
            'google_script' => $codes?->google_script,
            'google_noscript' => $codes?->google_noscript,
        ]);
    }
    
    public function update(Request $request)
    {
        $user = Auth::guard('admin')->user();
        $codes=SnipptsCode::where('admin_id',$user->id)->first();
        if ($codes){
            $codes->update($request->all());
        }else {
            $request->merge(['agent_id'=>$user->agent_id,'admin_id'=>$user->id]);
            SnipptsCode::create($request->all());
        }

        return redirect()->back()->with('success','successfully updated');
    }

    
    public function destroy(SnipptsCode $snipptsCode)
    {
        //
    }
}
