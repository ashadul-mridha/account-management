<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\PhoneBook;
use App\AllMassage;
use Toastr;

class AllMassageController extends Controller
{
    
    public function __construct()
	{
		$this->middleware('admin');
	}

    public function create(){
        $supplier = Supplier::all();
        $phonebook = PhoneBook::all();
        return view('sendsms.create',compact('supplier','phonebook'));
    }

    public function get_phonebook_info(Request $request){

        $phonebook = PhoneBook::find($request->id);
        return response()->json($phonebook);


    }

    public function store(Request $request){
        $request->validate([
            'send_sms' => 'required',
        ]);


        $allmessage = new AllMassage;

        if ($request->supplier_id != null) {
            $allmessage->supplier_id = $request->supplier_id;
        } else {
            $allmessage->phonebook_id = $request->phone;
        }
        
        $allmessage->mobile_num = $request->phone_number;
        $allmessage->address = $request->address;
        $allmessage->sms = $request->send_sms;

        $allmessage->save();
        Toastr::success('Message Sent Successful', 'Done', ["positionClass" => "toast-top-right"]);
        return redirect()->route('index.allmessage');


    }

    public function index(){
        $data = AllMassage::all();
        return view('sendsms.index',compact('data'));
    }
}
