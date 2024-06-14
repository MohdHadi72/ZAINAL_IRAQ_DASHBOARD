<?php
    
namespace App\Http\Controllers;
    
use App\Models\AddOn;
use App\Models\AddZone;
use App\Models\Product;
use App\Models\Project;
use Illuminate\Http\Request;
    
class ProductController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);
         $this->middleware('permission:product-create', ['only' => ['create','store']]);
         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::with('project','getZone')->paginate(30);
        // return $products;
        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // $data=AddOn::all();
        $project=Project::all();
        return view('products.create',compact('project'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $validated = $request->validate([
            'projectName_id'=>'required',
            'houseNumber'=>'required',
            'category'=>'required',
            'zone'=>'required',
            'price'=>'required',
            'landSize'=>'required',
            'area'=>'required',
            'downPayment'=>'required',
        ]);
       

        $data=new Product();
        $data->projectName_id=$request->projectName_id;
         $data->zone=$request->zone;
         $data->category=$request->category;
        $data->houseNumber=$request->houseNumber;
        $data->downPayment=$request->downPayment;
        $data->price=$request->price;
        $data->landSize=$request->landSize;
        $data->area=$request->area;
        $data->totalAmount=$request->totalAmount;
        $data->monthTime=$request->monthTime;
        $data->totalPayment=$request->totalPayment;
        // return $data;
        $data->save();
        return redirect()->route('products.index')->with('success','Property created successfully.');
    }
    
    public function getProject($id){
        $data = AddZone::where('projectName_id', $id)->get(); 
        $data1 = Product::where('projectName_id', $id)->get(); 
        $data2 = AddOn::where('projectName', $id)->get();
    $output = '<option>' . 'Select Zone' . '</option>';
    $house = '<option>' . 'Select House' . '</option>';
    $addon = '<option>'.'Select Addon'.'</option>';
    foreach($data as $item)
    {
        $output .= '<option value=' . $item->id . '>' . $item->zone . '</option>';
    }
    foreach($data1 as $item)
    {
        $house .= '<option value=' . $item->id . '>' . $item->houseNumber . '</option>';
    }
     foreach($data2 as $item)
    {
        // $addon .= '<option value=' . $item->id . ' 'data-price="{{ $item->price }}"'>' . $item->name . '</option>';
        $addon .= '<option value="' . $item->id . '" data-price="' . $item->price . '">' . $item->name . '-' . $item->price . '$</option>';

    }
    $result = ['output' => $output,'house'=>$house,'addon'=>$addon];
    return $result;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::with('project','getZone')->where('id',$id)->first();
        // return $product;
        $project=Project::all();
        $data=AddOn::all();
        return view('products.edit',compact('product','project','data'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
         request()->validate([
            'projectName_id'=>'required',
            'houseNumber'=>'required',
            'category'=>'required',
            'zone'=>'required',
            'price'=>'required',
            'landSize'=>'required',
            'area'=>'required',
        ]);
    
        $product->update($request->all());
    
        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
    
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }
}