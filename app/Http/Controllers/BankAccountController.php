<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BankAccount;
use App\Transaction;
use App\Paymentinfo;
use App\Transactioncal;
use App\Balance;
use PDF;
use DB;
use Toastr;

class BankAccountController extends Controller
{
    public function __construct()
	{
		$this->middleware('admin');
	}

    public function create(){
        return view('bank.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'account_name' => 'required',
            'account_number' => 'required|numeric',
            'account_type' => 'required',
            'address' => 'required'
        ]);
        
        $bank_account = new BankAccount;

        $bank_account->name = $request->name;
        $bank_account->account_name = $request->account_name;
        $bank_account->account_number = $request->account_number;
        $bank_account->account_type = $request->account_type;
        $bank_account->address = $request->address;

        $bank_account->save();
        Toastr::success('Added New Bank Account', 'Done', ["positionClass" => "toast-top-right"]);

        return redirect()->route('index.bank');

    }

    public function index(){
        $bank_accounts = BankAccount::all();
        return view('bank.index',compact('bank_accounts'));
    }
    public function show($id){
        $bank_account = BankAccount::findorfail($id);
        return view('bank.show',compact('bank_account'));
    }
    public function delete($id){
        $bank_account = BankAccount::findorfail($id);
        $bank_account->delete();
        
        Toastr::error('Bank Account Delete', 'Done', ["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
    public function edit($id){
        $bank_account = BankAccount::findorfail($id);
        return view('bank.edit',compact('bank_account'));
    }
    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            'account_name' => 'required',
            'account_number' => 'required|numeric',
            'account_type' => 'required',
            'address' => 'required'
        ]);

        $bank_account = BankAccount::findorfail($request->id);

        $bank_account->name = $request->name;
        $bank_account->account_name = $request->account_name;
        $bank_account->account_number = $request->account_number;
        $bank_account->account_type = $request->account_type;
        $bank_account->address = $request->address;

        $bank_account->save();
        Toastr::warning('Update Bank Account', 'Done', ["positionClass" => "toast-top-right"]);

        return redirect()->route('index.bank');

    }
    public function transaction($id){

        $bank_account = BankAccount::findorfail($id);
        $ac_info = Transactioncal::where('bank_id',$id)
                                ->get();

        $open_balance = Balance::where('bank_id',$id)
                                ->first();
        
        if ($open_balance != null) {
            $open_balance = (int) $open_balance->amount;
        }else{
            $open_balance = 0;
        }
        $debit = Transactioncal::where('bank_id',$id)
                                ->whereNotnull('dr')
                                ->get()
                                ->sum('dr');

        $credit = Transactioncal::where('bank_id',$id)
                                ->whereNotnull('cr')
                                ->get()
                                ->sum('cr');

        
        $sum = $credit + $open_balance;
        $current_balance = $sum - $debit;
                                
        return view('bank.transaction',compact('bank_account','ac_info','open_balance','debit','credit','current_balance'));
    }

    //pdf
    public function pdf($id){
        $bank_account = BankAccount::findorfail($id);
        $ac_info = Transactioncal::where('bank_id',$id)
                                ->get();

        $open_balance = Balance::where('bank_id',$id)
                                ->first();
        
        if ($open_balance != null) {
            $open_balance = (int) $open_balance->amount;
        }else{
            $open_balance = 0;
        }
        $debit = Transactioncal::where('bank_id',$id)
                                ->whereNotnull('dr')
                                ->get()
                                ->sum('dr');

        $credit = Transactioncal::where('bank_id',$id)
                                ->whereNotnull('cr')
                                ->get()
                                ->sum('cr');

        
        $sum = $credit + $open_balance;
        $current_balance = $sum - $debit;

        $pdf = PDF::loadview('bank.pdf',compact('bank_account','ac_info','open_balance','debit','credit','current_balance'));
		return $pdf->download('Transaction.pdf',);
    }

    public function addbalance(){
        $bank = BankAccount::all();
        return view('bank.add-balance',compact('bank'));
    }

    

    public function storebalance(Request $request){

        $balance = new Balance;

        $username = session()->get('name');

        $balance->amount = $request->amount;
        $balance->bank_id = $request->bank_id;
        $balance->note = $request->notes;
        $balance->create_date = $request->amount;
        $balance->created_by = $username;


        $balance->save();
        Toastr::success('Add Balance To Account', 'Done', ["positionClass" => "toast-top-right"]);

        return redirect()->back();

    }

}
