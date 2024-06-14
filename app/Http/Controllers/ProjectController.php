<?php

namespace App\Http\Controllers;

use App\Models\AddOn;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class ProjectController extends Controller
{
     function __construct()
    {
         $this->middleware('permission:project-list|project-create|project-edit|project-delete', ['only' => ['index','show']]);
         $this->middleware('permission:project-create', ['only' => ['create','store']]);
         $this->middleware('permission:project-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:project-delete', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        $project=Project::latest()->paginate(30);
        return view('project.index',compact('project'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $data=AddOn::all();
        return view('project.create',compact('data'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name'=>'required|unique:projects,name',
            'location'=>'required',
            'phone'=>'required|numeric',
            'email'=>'required|email|unique:projects,email',
        ]);

        $project=new Project();
        $project->name=$request->name;
        $project->location=$request->location;
        $project->phone=$request->phone;
        $project->email=$request->email;
        if (is_array($request->addOn)) {
         $project->addOn = implode(',', $request->addOn);
        } else {
        $project->addOn = $request->addOn;
        }
        // return $project;
        $project->save();
        return redirect()->route('project')->with('success','Property created successfully.');
    }
    public function edit($id)
    {
        $addOn=AddOn::all();
        $data=Project::find($id );
        // return $project;
        return view('project.edit',['project'=>$data,'addOn'=>$addOn]);
    }

    
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name'=>'required',
            'location'=>'required',
            'phone'=>'required|numeric',
            'email'=>'required|email',
        ]);

        $project=Project::find($request->id);
        $project->name=$request->name;
        $project->location=$request->location;
        $project->phone=$request->phone;
        $project->email=$request->email;
        if (is_array($request->addOn)) {
         $project->addOn = implode(',', $request->addOn);
        } else {
        $project->addOn = $request->addOn;
        }
        $project->update();
        return redirect()->route('project')
                        ->with('success','Project updated successfully');
    }

    public function destroy($id){
        $data=Project::find($id);
        $data->delete();
        return response()->json(['status' => 'Project  Deleted successfully']);
    }
}
