<?php

namespace App\Http\Controllers;

use App\Models\AddOn;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Arr;
class AddOnController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:addon-list|addon-create|addOn-edit|addOn-delete/', ['only' => ['index','store']]);
         $this->middleware('permission:addon-create', ['only' => ['create','store']]);
         $this->middleware('permission:addOn-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:addOn-delete', ['only' => ['destroy']]);
    }
    public function index(){

        $addOn = AddOn::with('project')->latest()->paginate(50);
        // return $addOn;
        return view('addon.index',compact('addOn'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        // return view('addon.index');
    }
    public function create(){
        $project=Project::all();
        return view('addon.create',compact('project'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required|numeric',
        ]);
        AddOn::create($request->all());
        // $addOn = AddOn::create($request->all());
    
        return redirect()->route('addOn')
                        ->with('success','Add-On created successfully');
    }

    public function edit($id){
        // $data=AddOn::find($id);
        $data=AddOn::with('project')->where('id',$id)->first();
         $project=Project::all();
        return view('addon.edit',compact('data','project'));
    }
    public function update(Request $request){
        $this->validate($request, [
        'name' => 'required',
        'price' => 'required|numeric',

    ]);
     $data = AddOn::find($request->id);
     $data->name = $request->name;
    $data->price = $request->price;
    $data->detail = $request->detail;
    $data->projectName = $request->projectName;
    $data->update();
    // return $data;    
    return redirect()->route('addOn')
        ->with('success', 'Add-On updated successfully');
}
    public function destroy($id){
        $data=AddOn::find($id);
        $data->delete();
        return response()->json(['status' => 'Add-On  Deleted successfully']);
    }
}
