<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PhoneBook;
use Toastr;

class PhoneBookController extends Controller
{
    public function __construct()
	{
		$this->middleware('admin');
	}

    public function create(){
        return view('phonebook.create');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'mobile_number' => 'required|numeric',
            'notes' => 'required',
            'address' => 'required'
        ]);

        $phonebook = new PhoneBook;

        $phonebook->name = $request->name;
        $phonebook->mobile_number = $request->mobile_number;
        $phonebook->address = $request->address;
        $phonebook->notes = $request->notes;

        $phonebook->save();
        Toastr::success('PhoneBook Added Successful', 'Done', ["positionClass" => "toast-top-right"]);

        return Redirect()->route('index.phonebook');
    }
    public function index(){

        $phonebook = PhoneBook::all();

        return view('phonebook.index',compact('phonebook'));
    }

    public function show($id){
        $phonebook = PhoneBook::findorfail($id);

        return view('phonebook.show',compact('phonebook'));
    }

    public function delete($id){
        
        $phonebook = PhoneBook::findorfail($id);

        $phonebook->delete();
        Toastr::error('PhoneBook Deleted Successful', 'Done', ["positionClass" => "toast-top-right"]);

        return Redirect()->route('index.phonebook');
    }

    public function edit($id){
        $phonebook = PhoneBook::findorfail($id);
        return view('phonebook.edit',compact('phonebook'));
    }

    public function update(Request $request){

        $request->validate([
            'name' => 'required',
            'mobile_number' => 'required|numeric',
            'notes' => 'required',
            'address' => 'required'
        ]);
        
        $phonebook = Phonebook::findorfail($request->id);

        $phonebook->name = $request->name;
        $phonebook->mobile_number = $request->mobile_number;
        $phonebook->address = $request->address;
        $phonebook->notes = $request->notes;

        $phonebook->save();
        Toastr::warning('PhoneBook Updated Successful', 'Done', ["positionClass" => "toast-top-right"]);

        return Redirect()->route('index.phonebook');
    }
}
