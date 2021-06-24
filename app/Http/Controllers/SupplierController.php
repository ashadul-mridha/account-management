<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\PhoneBook;
use App\BankAccount;
use App\Transactioncal;
use App\Balance;
use App\AddProduct;
use Toastr;
use PDF;

class SupplierController extends Controller
{
    public function create(){
        return view('supplier.create');
    }

    public function store(Request $request){

        $request->validate([
            'supplier_name' => 'required',
            'mobile_number' => 'required|numeric',
            'type' => 'required',
            'service' => 'required',
            'address' => 'required'
        ]);

        $supplier = new Supplier;

        $supplier->supplier_name = $request->supplier_name;
        $supplier->mobile_number = $request->mobile_number;
        $supplier->account_number = $request->mobile_number;
        $supplier->type = $request->type;
        $supplier->service = $request->service;
        $supplier->address = $request->address;

        $supplier->save();
        Toastr::success('Customer Added Successful', 'Done', ["positionClass" => "toast-top-right"]);

        return redirect()->route('index.supplier');
    }

    public function index(){
        $supplier = Supplier::all();
        return view('supplier.index',compact('supplier'));
    }

    public function show($id){
        $supplier = Supplier::findorfail($id);
        return view('supplier.show',compact('supplier'));
    }

    public function delete($id){
        $supplier = Supplier::findorfail($id);
        $supplier->delete();
        Toastr::error('Customer Delete Successful', 'Done', ["positionClass" => "toast-top-right"]);

        return redirect()->back();
    }

    public function edit($id){
        $supplier = Supplier::findorfail($id);
        return view('supplier.edit',compact('supplier'));
    }

    public function update(Request $request){

        $request->validate([
            'supplier_name' => 'required',
            'mobile_number' => 'required|numeric',
            'type' => 'required',
            'service' => 'required',
            'address' => 'required'
        ]);

        $supplier = Supplier::findorfail($request->id);

        $supplier->supplier_name = $request->supplier_name;
        $supplier->mobile_number = $request->mobile_number;
        $supplier->account_number = $request->mobile_number;
        $supplier->type = $request->type;
        $supplier->service = $request->service;
        $supplier->address = $request->address;

        $supplier->save();
        Toastr::warning('Customer Update Successful', 'Done', ["positionClass" => "toast-top-right"]);

        return redirect()->route('index.supplier');
    }

    public function get_sup_info(Request $request){

        $bank_info = Supplier::find($request->id);
        return response()->json($bank_info);


    }
    public function transaction($id){

        $supplier = Supplier::findorfail($id);
        $ac_info = Transactioncal::where('supplier_id',$id)
                                ->get();

        //customer payment
        $payment_amount = AddProduct::where('supplier_name',$id)
                                        ->get()
                                        ->sum('product_price');


        $customer_debit = Transactioncal::where('supplier_id',$id)
                                    ->whereNotnull('dr')
                                    ->get()
                                    ->sum('dr');                              

        
        $cus_payable_amount = $payment_amount - $customer_debit;

                                
        return view('supplier.transaction',compact('supplier','ac_info','payment_amount','customer_debit','cus_payable_amount'));
    }
    public function pdf($id){

        $supplier = Supplier::findorfail($id);
        $ac_info = Transactioncal::where('supplier_id',$id)
                                ->get();

        //customer payment
        $payment_amount = AddProduct::where('supplier_name',$id)
                                        ->get()
                                        ->sum('product_price');


        $customer_debit = Transactioncal::where('supplier_id',$id)
                                    ->whereNotnull('dr')
                                    ->get()
                                    ->sum('dr');                              

        
        $cus_payable_amount = $payment_amount - $customer_debit;

                       
        $pdf = PDF::loadview('supplier.pdf',compact('supplier','ac_info','payment_amount','customer_debit','cus_payable_amount'));
        return $pdf->download('Supplier Transaction.pdf',);
        
    }


}
