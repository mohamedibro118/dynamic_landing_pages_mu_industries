<?php

namespace App\Http\Controllers\admin;


use App\Models\admin\lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class LeadsController extends Controller
{


    public function index()
    {   
        // Gate::authorize('leads.index');

        $leads=lead::query()->filter(request()->all())->orderBy('id','desc')->paginate(15);
        return view('dashbourd.leads.index')->with('leads',$leads);
    }

   

    
    public function store(Request $request)
    {   
       
        $this->validate($request,[
            'name' => 'required|string',
            'email' =>'required|email|max:255',
            'phone' => ['required','regex:/^(010|011|012|015|017)\d{8}$/','unique:leads,phone'],
        ], $this->getmessage());
       

        $lead=lead::create(request()->all());
        return response()->json([
            'data' => $lead, // Include any data you want in the response
            'message' => 'Lead created successfully.', // Add a success message
        ]);
    }

    public function edit($id)
    {
      
        $lead=lead::find($id);
        return view('dashbourd.leads.edit')->with('lead',$lead);
    }

   
    
    public function destroy($id)
    {
        Gate::authorize('leads.delete');
        $lead=lead::find($id);
        $lead->delete();
        return redirect()->back();  
    }



   
    
    public function getmessage(){
        return [
            
            'name.required' => 'Please enter lead name',
            'email.*' => 'invalid email ',
            'phone.required' => 'Please enter phone',
            'phone.unique' => 'this phone number already exist with the same unit or compound',
            'phone.regex' => 'Please enter a valid Egyptian phone number, starting with 010, 011, 012, 015, or 017.',
            'srcaction.required'=>'source of lead required',
            'location.*'=>'required'
            
            
        ];
    }
   
    
}
