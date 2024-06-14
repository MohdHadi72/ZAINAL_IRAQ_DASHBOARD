<?php

namespace App\Http\Controllers;

use App\Models\AddZone;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class AddZoneController extends Controller
{
    
    public function index()
    {
       
        $data = AddZone::with('getproject')->paginate(50);
        return view('addZone.index', compact('data'));
    }

    public function create()
    {
        $data = Project::all();
        return view('addZone.create', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'projectName_id' => 'required',
            'zone' => [
                'required',
                Rule::unique((new AddZone())->getTable())->where('projectName_id', $request->projectName_id),
            ],
        ]);

        // If validation passes, create a new AddZone instance and save it to the database
        $data = new AddZone();
        $data->projectName_id = $request->projectName_id;
        $data->zone = $request->zone;
        // return $data;
        $data->save();

        // Redirect back with a success message
        return redirect()->route('addZone')->with('success', 'Add-On created successfully');
    }

    public function edit($id)
    {
        $data = AddZone::with('getproject')->where('id', $id)->first();
        $project = Project::all();
        // return $data;
        return view('addZone.edit', compact('data', 'project'));
    }
    public function update(Request $request)
{
    $request->validate([
        'projectName_id' => 'required',
        'zone' => [
            'required',
            Rule::unique('add_zones')->where('projectName_id', $request->projectName_id)->ignore($request->id),
        ],
    ]);

    $data = AddZone::find($request->id);
    $data->projectName_id = $request->projectName_id;
    $data->zone = $request->zone;
 
    $data->update();

    return redirect()->route('addZone')->with('success', 'Add-On updated successfully');
}
public function destroy($id){
    $data=AddZone::find($id);
    $data->delete();
    return response()->json(['status' => 'Add-On  Deleted successfully']);
}

}


