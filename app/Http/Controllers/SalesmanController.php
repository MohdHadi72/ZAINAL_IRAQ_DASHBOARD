<?php

namespace App\Http\Controllers;

use App\Models\AddOn;
use App\Models\AddZone;
use App\Models\Product;
use App\Models\Project;
use App\Models\Salesman;
use App\Models\Enquiry;
use App\Models\User;
use Illuminate\Support\Str;
use Validator;
use Illuminate\Http\Request;
use DB;

class SalesmanController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:salesman-list|salesman-create|salesman-edit|salesman-delete', ['only' => ['index','show']]);
         $this->middleware('permission:salesman-create', ['only' => ['create','store']]);
         $this->middleware('permission:salesman-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
      $salesman = Salesman::with('product','project','getzone')->latest()->paginate(30);
    //   return $salesman;
        return view('salesman.index',compact('salesman'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   public function create($id){
    $enquiry = Enquiry::find($id);
    $uiid = random_int(1000000000, 9999999999);
    $data = AddOn::with('project')->get();
    $data1 = Project::with('addon')->get();
    $property = Product::all();
    $project = Project::all();
     $user = User::orderBy('id','DESC')->get();
     $roles = DB::table('roles')
            ->orWhere('name', 'Auditor')->get();
    return view('salesman.create', compact('data', 'property', 'project', 'enquiry', 'uiid','roles','user'));
}
    public function store(Request $request){
    $validated = $request->validate([
    'projectName_id' => 'required',
    'houseNumber_id' => 'required',
    'zone' => 'required',   
    'landSize' => 'required|numeric', // Assuming landSize should be numeric, adjust as needed
    'area' => 'required',
    'price' => 'required|numeric', // Assuming price should be numeric, adjust as needed
]);

        $data=new Salesman();
        if (is_array($request->addOn)) {
        $data->addOn = implode(',', $request->addOn);
          } else {
           $data->addOn = $request->addOn;
        }
        
        $data->fname=$request->fname;
        $data->mname=$request->mname;
        $data->lname=$request->lname;
        $data->proviens=$request->proviens;
        $data->address=$request->address;
        $data->phone=$request->phone;
        $data->occupation=$request->occupation;
        $data->idNumber=$request->idNumber;
        $data->issueDate=$request->issueDate;
        $data->uiid=$request->uiid;
        $data->projectName_id=$request->projectName_id;
        $data->houseNumber_id=$request->houseNumber_id;
        $data->category=$request->category;
        // array to string Conversion start
        $data->zone=$request->zone;
        // array to string Conversion End
        $data->emi=$request->emi;
        $data->landSize=$request->landSize;
        $data->area=$request->area;
        $data->price=$request->price;
        $data->addOnPrice=$request->addOnPrice;
        $data->emiAmount=$request->emiAmount;
        $data->downPayment=$request->downPayment;
        $data->AuditorData=$request->AuditorData;
        $data->save();
        return redirect()->route('salesman.index')->with('success','Salesman created successfully.');
        

    }

   //  public function prientAuditor(){
     
     // return view('salesman.create',compact('AuditorData'));
  // }
   

    public function edit($id)
    {
        $data=AddOn::all();
        $property=Product::all();
        $salesman=Salesman::with('product','project','getzone')->where('id',$id )->first();
        $project=Project::all();
        $roles = DB::table('roles')
            ->orWhere('name', 'auditor')->get();
        // return $salesman;qq
        return view('salesman.edit',compact('data','property','salesman','project'));
    }

    public function update(Request $request, $id)
{
    $validated = $request->validate([
        'houseNumber_id' => 'required',
        'category' => 'required',
        'zone' => 'required',
        'landSize' => 'required',
        'area' => 'required',
        'price' => 'required',
    ]);

    $data = Salesman::findOrFail($id); // Assuming Salesman is the model name

    if (is_array($request->addOn)) {
        $data->addOn = implode(',', $request->addOn);
    } else {
        $data->addOn = $request->addOn;
    }

    $data->fname = $request->fname;
    $data->mname = $request->mname;
    $data->lname = $request->lname;
    $data->proviens = $request->proviens;
    $data->address = $request->address;
    $data->phone = $request->phone;
    $data->occupation = $request->occupation;
    $data->idNumber = $request->idNumber;
    $data->issueDate = $request->issueDate;
    $data->uiid = $request->uiid;
    $data->projectName_id = $request->projectName_id;
    $data->houseNumber_id = $request->houseNumber_id;
    $data->category = $request->category;
    $data->zone = $request->zone;
    $data->emi = $request->emi;
    $data->landSize = $request->landSize;
    $data->area = $request->area;
    $data->price = $request->price;
    $data->addOnPrice = $request->addOnPrice;
    $data->emiAmount = $request->emiAmount;
    $data->downPayment = $request->downPayment;

    $data->save();

    return redirect()->route('salesman.index')->with('success', 'Salesman updated successfully');
}

    
    public function getData($id){
        $data=Product::find($id);
        $product=json_decode($data);
        return $product;
    }   

    public function destroy($id){
        $data=Salesman::find($id);
        $data->delete();
        return response()->json(['status' => 'Salesman  Deleted successfully']);
    }
    public function fetchAddon($id)
    {
    $addon = AddOn::where('projectName', $id)->get();
    $output = '<option value="">Select Zone</option>';
    foreach ($addon as $item) {
        $output .= '<option value="' . $item->projectName . '">' . $item->name . '</option>';
    }
    return response()->json(['output' => $output]);
    }
    public function getHouses($zone_id)
{
    $houses = Product::where('zone', $zone_id)->get();
    $houseOptions = '<option value="">Select House</option>';
    foreach ($houses as $house) {
        $houseOptions .= '<option value="' . $house->id . '">' . $house->houseNumber . '</option>';
    }
    return response()->json(['house' => $houseOptions]);
}

  
}
