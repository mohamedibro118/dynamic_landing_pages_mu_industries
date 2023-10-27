<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Str;
use App\Models\admin\Agent;
use Illuminate\Http\Request;
use App\Traits\Myfun;
class AgentController extends Controller
{
    use Myfun;
    public function index()
    {
        $query = Agent::query();
        $agents = $query->filter(request()->all())->paginate(PAGINATE);
        return view('dashbourd.agents.index', [
            'agents' => $agents
        ]);
    }


    public function create()
    {
        $agent = new Agent();
        return view('dashbourd.agents.create', [
            'agent' => $agent,
        ]);
    }


    public function store(Request $request)
    { 
       
        $request->validate([
            'name_en' => 'required|unique:agents,name_en|max:255',
            'name_ar' => 'required|unique:agents,name_ar|max:255',
            'status'=>"in:active,archived"
        ]);
        
        $data = $request->except(['slug_en','slug_ar']);
        
        $data['slug_en'] = Str::slug($request->name_en);
        $data['slug_ar'] = Str::slug($request->name_ar);

       
        $agent = agent::create($data);

        return redirect()->route('dashbourd.dev.agents.index')->with('success', 'success operation');
    }



    public function edit($id)
    {
        $agent = agent::find($id);
        return view('dashbourd.agents.edit', [
            'agent' => $agent
        ]);
    }

    


    public function update(Request $request, $id)
    {
        $agent = agent::find($id);
        $this->validate($request, [
            'name_en' => "sometimes|required|unique:agents,name_en,$id|max:255",
            'name_ar' => "sometimes|required|unique:agents,name_ar,$id|max:255",
            'status'=>"in:active,archived"
         ]);
         $data = $request->except(['slug_en','slug_ar']);
        
         $data['slug_en'] = Str::slug($request->name_en);
         $data['slug_ar'] = Str::slug($request->name_ar);
        
        $agent->update($data);
       
        return redirect()->route('dashbourd.dev.agents.index')->with('success', 'success operation');
    }


    public function destroy($id)
    {
        $agent = agent::find($id);
        $agent->delete();
        return redirect()->route('dashbourd.dev.agents.index')->with('success', 'success operation');
    }

    public function trash()
    {
      
        $agents=agent::onlyTrashed()->paginate(PAGINATE);
        return view('dashbourd.agents.trashed',[
            'agents'=>$agents
        ]);
    }
    public function restore($id)
    {
        $agent=agent::onlyTrashed()->findOrFail($id);
        $agent->restore();
         return redirect()->route('dashbourd.dev.agents.trash')->with('success','operation success');
    }

    public function forceDelete($id)
    {
        $agent=agent::onlyTrashed()->findOrFail($id);
      
        $agent->forceDelete();
      
        return redirect()->route('dashbourd.dev.agents.index');
    }
}
