<?php

namespace App\Http\Controllers;

use App\Models\Salesman;
use App\Models\Enquiry;
use App\Models\Product;
use App\Models\StageFirstDoc;
use App\Models\StageSecondDoc;
use App\Models\StageThirdDoc;
use Illuminate\Support\Str;
use Validator;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Session;


class DocumentController extends Controller
{
    public function index(Request $request)
    {
        $data=DB::table('roles')->whereIn('name', ['salesman', 'auditor', 'accountant'])
    ->pluck('name');
    // return $data;
        return view('document.index',compact('data'));
    }
    public function trashList(Request $request)
    {
        $data=DB::table('roles')->whereIn('name', ['salesman', 'auditor', 'accountant'])
    ->pluck('name');
        return view('document.trash-list',compact('data'));
    }
    
    public function restore($id,$role){
         $roles = [];

        switch ($role) {
            case 'stageFirst':
                
                $roles = StageFirstDoc::withTrashed()->findOrFail($id);
            
                $roles->restore();
            
                break;
            case 'stageSecond':
                $roles = DB::table('roles')->where('name', 'auditor')->pluck('name');
                break;
            case 'stageThird':
                $roles = DB::table('roles')->where('name', 'accountant')->pluck('name');
                break;
                 default:
            return redirect()->route('document.index')->with('error', 'Invalid role');
        }

         return View::make('document.index')->with('success', 'Data restored successfully');
    }

   public function trashData($role)
    {

        $roles = [];

        switch ($role) {
            case 'stageFirst':
                $roles=StageFirstDoc::onlyTrashed()->orderBy('id','DESC')->get();
                break;
            case 'stageSecond':
                $roles = DB::table('roles')->where('name', 'auditor')->pluck('name');
                break;
            case 'stageThird':
                //  $roles = StageFirstDoc::all();
                $roles = DB::table('roles')->where('name', 'accountant')->pluck('name');
                break;
        }

        return response()->json($roles);

    }
     public function fetchData($role)
    {

        $roles = [];

        switch ($role) {
            case 'stageFirst':
                $roles = StageFirstDoc::all();
                break;
            case 'stageSecond':
                // $roles = DB::table('roles')->where('name', 'auditor')->pluck('name');
                $roles=StageSecondDoc::all();
                break;
            case 'stageThird':
                 $roles=StageThirdDoc::all();
                // $roles = DB::table('roles')->where('name', 'accountant')->pluck('name');
                break;
        }

        return response()->json($roles);

    }

    public function docsAdd()
    {
        $data=DB::table('roles')->whereIn('name', ['salesman', 'auditor', 'accountant'])
    ->pluck('name');
        // return $data;
        return view('document.add',compact('data'));
    }
 
    public function stageFirst()
    {
        // $salesman = Salesman::all();
        $data=DB::table('roles')->whereIn('name', ['salesman', 'auditor', 'accountant'])
    ->pluck('name');
    $house=Salesman::with('product')->get();
    // return $house;
        return view('document.stageFirst', compact('data','house'));
    }
    
    public function storeStageFirst(Request $request){
          $validated = $request->validate([
                'title' => 'required',
                'buyerName' => 'required',
                'houseNumber' => 'required|unique:stage_first_docs,houseNumber,' . $request->id,
                'dateIssue' => 'required|date',
                'amountNumber' => 'required|numeric',
                'amountWords' => 'required|regex:/^[A-Za-z\s]+$/',
                'role' => 'required',
            ]);

        $data=new StageFirstDoc();
        $data->title=$request->title;
        $data->buyerName=$request->buyerName;
        $data->houseNumber=$request->houseNumber;
        $data->dateIssue=$request->dateIssue;
        $data->amountNumber=$request->amountNumber;
        $data->amountWords=$request->amountWords;
        $data->role=$request->role;
         $data->product_id=$request->product_id;
        // return $data;
        $data->save();
        Session::put('step1_data', $data);
        return redirect()->route('document.index')->with("success",'Stage First Data Created Successful');
        // return redirect('document.index')
    }
    
    public function stageSecond()
    {
        $data=DB::table('roles')->whereIn('name', ['salesman', 'auditor', 'accountant'])
        ->pluck('name');
        // $house=Salesman::with('product')->get();
        $house = StageFirstDoc::with('project','salesman')->get();
        // return $house;
        return view('document.stageSecond', compact('data','house'));
    }
 public function storeStageMiddle(Request $request)
{
    $request->validate([
        'title' => 'required',
        'houseNumber' => 'required|unique:stage_first_docs,houseNumber,' . $request->id,
        'workPlace' => 'required',
        'buyerName' => 'required',
        'phone' => 'required|numeric',
        'address' => 'required',
        'firstInstallment' => 'required',
        'role' => 'required',
        'dateIssueFile' => 'required|date',
        'idNumber' => 'required',
        'occupation' => 'required',
        'category' => 'required',
        'dateIssue' => 'required|date',
        'housePrice' => 'required',
        'buildArea' => 'required',
        'landArea' => 'required',
        'buyersign' => 'required|max:500',
        'agentsign' => 'required|max:500',
        'accountantsign' => 'required|max:500',
    ]);

$fileName = basename($request->accountantsign);

// Move the file to the public/images folder
if (file_exists($request->buyersign)) {
    // Assuming public/images is the destination folder
    $destinationPath = public_path('images');
    // Move the file to the destination folder
    rename($request->buyersign, $destinationPath . '/' . $fileName);
}    

$fileName2 = basename($request->accountantsign);

// Move the file to the public/images folder
if (file_exists($request->agentsign)) {
    // Assuming public/images is the destination folder
    $destinationPath = public_path('images');
    // Move the file to the destination folder
    rename($request->agentsign, $destinationPath . '/' . $fileName2);
}


$fileName3 = basename($request->accountantsign);

// Move the file to the public/images folder
if (file_exists($request->accountantsign)) {
    // Assuming public/images is the destination folder
    $destinationPath = public_path('images');
    // Move the file to the destination folder
    rename($request->accountantsign, $destinationPath . '/' . $fileName3);
}

// Creating and populating the StageSecondDoc instance
$stageSecondDoc = new StageSecondDoc();
$stageSecondDoc->title = $request->title;
$stageSecondDoc->houseNumber = $request->houseNumber;
$stageSecondDoc->workPlace = $request->workPlace;
$stageSecondDoc->buyerName = $request->buyerName;
$stageSecondDoc->phone = $request->phone;
$stageSecondDoc->alternatePhone = $request->alternatePhone;
$stageSecondDoc->address = $request->address;
$stageSecondDoc->priceAddOn = $request->priceAddOn;
$stageSecondDoc->emiPeriod = $request->emiPeriod;
$stageSecondDoc->firstInstallment = $request->firstInstallment;
$stageSecondDoc->role = $request->role;
$stageSecondDoc->buyersign = 'images/' . $fileName;
$stageSecondDoc->dateIssueFile = $request->dateIssueFile;
$stageSecondDoc->idNumber = $request->idNumber;
$stageSecondDoc->occupation = $request->occupation;
$stageSecondDoc->category = $request->category;
$stageSecondDoc->dateIssue = $request->dateIssue;
$stageSecondDoc->housePrice = $request->housePrice;
$stageSecondDoc->buildArea = $request->buildArea;
$stageSecondDoc->landArea = $request->landArea;
$stageSecondDoc->agentsign = 'images/' . $fileName2;
$stageSecondDoc->accountantsign = 'images/' . $fileName3;
$stageSecondDoc->product_id = $request->product_id;
// return $stageSecondDoc;
$stageSecondDoc->save();

        return redirect(route('document.index'))->with('success', 'stage-2 Created Successfully');
}

    public function stageThird()
    {
        $data=DB::table('roles')->whereIn('name', ['salesman', 'auditor', 'accountant'])
        ->pluck('name');
        // $house=StageSecondDoc::with('salesman')->where('project','project_id')->get();
        $house = StageSecondDoc::with('project','salesman')->get();

        // return $house;
        return view('document.stageThird', compact('data','house'));
    }
    
    public function finalStage(Request $request)
{
    $request->validate([
        'title' => 'required',
        'houseNumber' => 'required|unique:stage_third_docs,houseNumber,' . $request->id,
        'workPlace' => 'required',
        'buyerName' => 'required',
        'phone' => 'required|numeric',
        'address' => 'required',
        'firstInstallment' => 'required',
        'zone'=> 'required',
        'dateIssueFile' => 'required|date',
        'idNumber' => 'required',
        'occupation' => 'required',
        'category' => 'required',
        'dateIssue' => 'required|date',
        'housePrice' => 'required',
        'buildArea' => 'required',
        'landArea' => 'required',
        'role' => 'required',
        'buyersign' => 'required|image|mimes:png,jpg,jpeg|max:500',
        'agentsign' => 'required|image|mimes:png,jpg,jpeg|max:500',
        'accountantsign' => 'required|image|mimes:png,jpg,jpeg|max:500',
    ]);
     $data = new StageThirdDoc();
     // Store the buyersign image
    if ($request->hasFile('buyersign')) {
        $buyersign = $request->file('buyersign');
        $buyersignPath = $buyersign->store('public/images');
        // Update the data with image path
        $data->buyersign = str_replace('public/', '', $buyersignPath);
    }

    // Store the agentsign image
    if ($request->hasFile('agentsign')) {
        $agentsign = $request->file('agentsign');
        $agentsignPath = $agentsign->store('public/images');
        // Update the data with image path
        $data->agentsign = str_replace('public/', '', $agentsignPath);
    }

    // Store the accountantsign image
    if ($request->hasFile('accountantsign')) {
        $accountantsign = $request->file('accountantsign');
        $accountantsignPath = $accountantsign->store('public/images');
        // Update the data with image path
        $data->accountantsign = str_replace('public/', '', $accountantsignPath);
    }


    // Creating and populating the StageThirdDoc instance
    $data = new StageThirdDoc();
    $data->title = $request->title;
    $data->houseNumber = $request->houseNumber;
    $data->workPlace = $request->workPlace;
    $data->buyerName = $request->buyerName;
    $data->phone = $request->phone;
    $data->address = $request->address;
    $data->priceAddOn = $request->priceAddOn;
    $data->emiPeriod = $request->emiPeriod;
    $data->firstInstallment = $request->firstInstallment;
     $data->zone = $request->zone;
    $data->buyersign = $buyersignPath;
    $data->dateIssueFile = $request->dateIssueFile;
    $data->idNumber = $request->idNumber;
    $data->occupation = $request->occupation;
    $data->category = $request->category;
    $data->dateIssue = $request->dateIssue;
    $data->housePrice = $request->housePrice;
    $data->buildArea = $request->buildArea;
    $data->landArea = $request->landArea;
    $data->agentsign = $agentsignPath;
    $data->accountantsign = $accountantsignPath;
    $data->role = $request->role;
    // return $data;

    $data->save();

    return redirect(route('document.index'))->with('success', 'Stage 3 Document Created Successfully');
}

    
    public function getHouseNum($id)
    {
        $houseNum = Salesman::with('project')->where('id',$id)->first();
        return $houseNum;
    }
    public function fetchMiddle($id)
    {
        $data = StageFirstDoc::with('salesman')->where('id',$id)->first();
        return $data;
    }
    public function fetchFinal($id)
    {
        $data = StageSecondDoc::with('salesman')->where('id',$id)->first();
        return $data;
    }
    
      public function destroy($id){
        $data=StageFirstDoc::find($id);
        $data->delete();
        return response()->json(['status' => 'Stage-1  Deleted successfully']);
    }
    
    
}
