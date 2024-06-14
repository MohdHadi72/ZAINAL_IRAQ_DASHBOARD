<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Project;
use App\Models\Salesman;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
class EnquiryController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:enquiry-list|enquiry-create|enquiry-edit|enquiry-delete', ['only' => ['index','store']]);
         $this->middleware('permission:enquiry-create', ['only' => ['create','store']]);
         $this->middleware('permission:enquiry-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:enquiry-delete', ['only' => ['destroy']]);
    }


    public function index(Request $request)
{ 
     //$data = Enquiry::where('Assigned', $user->email)->get()::orderBy('id','DESC')->paginate(50);
     //$data = Enquiry::where('Assigned', $user->email)->orderBy('id', 'DESC')->paginate(50);
      $User = User::all();
      //$User = auth()->user();
      
     $user = Auth()->user();
        if ($user) {
            if ($user->getRoleNames() == '["Admin"]') {
                $data = Enquiry::orderBy('id', 'DESC')->paginate(50);
            }
            else if($user->getRoleNames() == '["Salesman"]'){
                $data = Enquiry::where('salesman', $user->name)->orderBy('id', 'DESC')->paginate(50);
            }
            else {
                $data = Enquiry::where('Assigned', $user->email)->orderBy('id', 'DESC')->paginate(50);
                
            }
      }  
     
     
     return view('enquiry.index',compact('data','User'))     
      ->with('i', ($request->input('page', 1) - 1) * 10);
     return view('enquiry.index');
}

    public function create(Request $request)
    {
        $data = User::orderBy('id','DESC')->get();
        $project=Project::all();
        return view('enquiry.create',compact('data','project'));
    }
    
    
   public function store(Request $request){
        
    //     if (!$request->has('salesman')) {
    //     alert("Salesman Not selected");
    // } else {
    //     alert("Salesman selected");
    // }
    $this->validate($request, [
        'fname'=>'required',
        'lname'=>'required',
        'phone'=>'required|numeric',
    //   'salesman'=>'required',
        'address'=>'required',
        'occupation'=>'required',
        'projectName'=>'required',
        'Assigned'=>'required',
        'Status'=>'required',
    ]);

    if (!$request->has('salesman')) {
       return redirect()->route('enquiry.index')->with('jsAlert', 'Salseman Not Selected ');
    } else {
        return redirect()->route('enquiry.index')->with('jsAlert', 'Salseman Selected');
    }



    
    $enquiry = Enquiry::create($request->post());
    return redirect()->route('enquiry.index')->with('success','Enquiry Created Successfully');
    
}


public function edit(Enquiry $enquiry,$id)
{
    
    
    $enquiry = Enquiry::with('project')->where('id', $id)->first();
    //  return $enquiry;
     $data = User::orderBy('id','DESC')->get();
     $project=Project::all();
     $roles = DB::table('roles')
            ->orWhere('name', 'salesman')->get();
         
    return view('enquiry.edit',compact('enquiry','project','data','roles'));
}

public function update(Request $request, Enquiry $enquiry){
    $this->validate($request, [
        'fname'=>'required',
        'lname'=>'required',
        'phone'=>'required|numeric',
        'salesman'=>'required',
        'address'=>'required',
        'occupation'=>'required',
        'projectName'=>'required',
    
        
    ]);
    
    $data = Enquiry::find($request->id);
    $data->fname = $request->fname;
    $data->mname = $request->mname;
    $data->lname = $request->lname;
    $data->phone = $request->phone;
    $data->salesman = $request->salesman;
    $data->address = $request->address;
    $data->occupation = $request->occupation;
    $data->projectName = $request->projectName;
    $data->desc = $request->desc;
    $data->update();
    return redirect()->route('enquiry.index')
                    ->with('success','Enquiry Updates successfully');
}
public function destroy($id)
{
    Enquiry::find($id)->delete();
    return redirect()->route('enquiry.index')
  ->with('success','Enquiry deleted successfully');
}

}
