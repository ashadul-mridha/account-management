<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddProduct;
use App\Supplier;
use Toastr;

class AddProductController extends Controller
{
    public function __construct()
	{
		$this->middleware('admin');
	}

    public function create(){

        $all_supplier = Supplier::all();
        return view('product.create',compact('all_supplier'));
    }

    public function store(Request $request){

        $request->validate([
            'supplier_name' => 'required',
            'product_name' => 'required',
            'product_price' => 'required|numeric',
            'product_quantity' => 'required|numeric',
            'car_rent' => 'required|numeric',
            'other_cost' => 'required|numeric'
        ]);
        
        $product = new AddProduct;

        $product->supplier_name = $request->supplier_name;
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->car_rent = $request->car_rent;
        $product->other_cost = $request->other_cost;
        $product->notes = $request->notes;

        $product->save();
        Toastr::success('Product Added Successful', 'Done', ["positionClass" => "toast-top-right"]);

        return redirect()->route('index.product');
    }

    public function index(){
        
        $all_product = Addproduct::with('supplier')->get();
        return view('product.index',compact('all_product'));
    }

    public function show($id){

        $product = AddProduct::with('supplier')
                              ->findorfail($id);

        return view('product.show',compact('product'));
    }

    public function delete($id){
        
        $product = Addproduct::findorfail($id);
        $product->delete();

        Toastr::error('Product  Delete Successful', 'Done', ["positionClass" => "toast-top-right"]);
        return redirect()->route('index.product');
    }

    public function edit($id){

        $all_supplier = Supplier::all();
        $product = Addproduct::with('supplier')->findorfail($id);

        return view('product.edit',compact('product','all_supplier'));
    }

    public function update(Request $request){

        $product = AddProduct::findorfail($request->id);
        
        $request->validate([
            'supplier_name' => 'required',
            'product_name' => 'required',
            'product_price' => 'required|numeric',
            'product_quantity' => 'required|numeric',
            'car_rent' => 'required|numeric',
            'other_cost' => 'required|numeric'
        ]);

        $product->supplier_name = $request->supplier_name;
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->car_rent = $request->car_rent;
        $product->other_cost = $request->other_cost;
        $product->notes = $request->notes;

        $product->save();
        Toastr::success('Product Update Successful', 'Done', ["positionClass" => "toast-top-right"]);

        return redirect()->route('index.product');
    }
}
