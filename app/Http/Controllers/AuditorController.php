<?php

namespace App\Http\Controllers;

use App\Models\AddOn;
use App\Models\Salesman;
use App\Models\Product;
use App\Models\Project;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuditorController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:auditor-list|auditor-create|auditor-edit|auditor-delete', ['only' => ['index','show']]);
         $this->middleware('permission:auditor-create', ['only' => ['create','store']]);
         $this->middleware('permission:auditor-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:auditor-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $data=Salesman::orderBy('created_at','desc')->paginate(30);
        return view('/auditor/index',compact('data'));
    }

   //  public function create()
    // {
       //  $AuditorData = Auditor::all();
        // $product = Product::all();
        // $addOn = AddOn::all();
        // $uiid=Str::uuid()->toString();
         // return $salesman;
        // return view('/salesman/create', compact('AuditorData'));
    // }

    public function getdataAudit($id)
    {
        $data = Project::find($id);
        return $data;
    }


   public function printForm($id){
    $data = Salesman::find($id);
    //$auditorData = Auditor::all();
    return view('auditor.printForm', compact('data'));
   }
   
    
    public function edit($id){
        $data=Auditor::find($id);
        $addOn=addOn::all();
        $project = Project::all();
        $product = Product::all();
        return view('auditor.edit',compact('data','addOn','project','product'));
    }
    
   
    public function update(Request $request){
       $data=Auditor::find($request->id);
        $data->fname=$request->fname;
        $data->mname=$request->mname;
        $data->lname=$request->lname;
        $data->address=$request->address;
        $data->phone=$request->phone;
        $data->occupation=$request->occupation;
        $data->projectName=$request->projectName;
        $data->zone=$request->zone;
        $data->houseNumber_id=$request->houseNumber_id;
        $data->category=$request->category;
        $data->addOn=$request->addOn;
        $data->landSize=$request->landSize;
        $data->uiid=$request->uiid;
        $data->area=$request->area;
        $data->housePrice=$request->housePrice;
        $data->totalPrice=$request->totalPrice;
        $data->downPayment=$request->downPayment;
        $data->installment=$request->installment;
        $data->emi=$request->emi;
        $data->fileCreation=$request->fileCreation;
        $data->idType=$request->idType;
        $data->idNumber=$request->idNumber;
        $data->issueDate=$request->issueDate;
        $data->alternaticePhone=$request->alternaticePhone;
        $data->docs=$request->docs;
        $data->update();
        return redirect(route('auditor.index'))->with('success', 'Auditor Updated Successfully');

    }
      public function destroy($id){
        $data=Auditor::find($id);
        $data->delete();
        return response()->json(['status' => 'Auditor  Deleted successfully']);
    }
}