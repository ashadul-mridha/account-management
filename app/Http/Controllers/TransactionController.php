<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Member;
use App\BankAccount;
use App\Paymentinfo;
use App\Transaction;
use App\Transactioncal;
use App\Supplier;
use App\Balance;
use App\AddProduct;
use Toastr;

class TransactionController extends Controller
{

    

    // public function create(){
    //     $member = Member::all();
    //     $bank = BankAccount::all();
    //     return view('transaction.create',compact('member','bank'));
    // }

    // public function store(Request $request){
    //     $reqm = new Paymentinfo;

    //     $reqm->member_id = $request->member_id;
    //     $reqm->bussniess_name = $request->bussniess_name;
    //     $reqm->transaction_type = $request->transaction_type;
    //     $reqm->reasone = $request->reasone;
    //     $reqm->trade = $request->trade;
    //     $reqm->family_number = $request->family_number;
    //     $reqm->bank_id = $request->bank_id;
    //     $reqm->note = $request->note;
    //     $reqm->pay_type = $request->pay_type;
    //     $reqm->amount = $request->amount;

    //     $reqm->save();


    //     $transaction = new Transaction;

    //     $transaction->member_id = $request->member_id;
    //     $transaction->bank_id = $request->bank_id;
    //     $transaction->payment_id = $reqm->id;
    //     $transaction->amount = $request->amount;


    //     if($request->check != null){
    //         $transaction->check_num = $request->check;
    //     }

    //     if ($request->transaction_type == 'loan') {
    //         $transaction->dr = $request->amount;
    //     } elseif($request->transaction_type == 'saving') {
    //         $transaction->cr = $request->amount;
    //     } elseif($request->transaction_type == 'fixed_dipposit') {
    //         $transaction->cr = $request->amount;
    //     }

    //     $transaction->save();

    //     if ($reqm->transaction_type == 'loan') {
    //         return redirect()->route('allloan.transaction');
    //     } elseif($reqm->transaction_type == 'saving') {
    //         return redirect()->route('allsaving.transaction');
    //     } elseif($reqm->transaction_type == 'fixed_dipposit') {
    //         return redirect()->route('fixed.transaction');
    //     }

    //     return redirect()->back();
        

    // }
    // public function allloan(){
    //     $data = Paymentinfo::with('member')
    //             ->where('transaction_type', '=', 'loan')
    //             ->orderBy('id', 'DESC')
    //             ->get();

            
    //     return view('transaction.allloan',compact('data'));
    // }
    // public function allsaving(){
    //     $data = Paymentinfo::with('member')
    //             ->where('transaction_type', '=', 'saving')
    //             ->orderBy('id', 'DESC')
    //             ->get();

            
    //     return view('transaction.allsaving',compact('data'));
    // }
    // public function fixed(){
    //     $data = Paymentinfo::with('member')
    //             ->where('transaction_type', 'fixed_dipposit')
    //             ->orderBy('id', 'DESC')
    //             ->get();

            
    //     return view('transaction.allfixed',compact('data'));
    // }

    public function payment(){

        $bank = BankAccount::all();
        $supplier = Supplier::all();
        return view('transaction.payment',compact('bank','supplier'));
    }

    public function allpayment(){

        $payment_all = Transactioncal::with('bank','supplier')
                                    ->whereNotnull('dr')
                                    ->orderBy('id', 'DESC')
                                    ->get();
        return view('transaction.allpayment',compact('payment_all'));
    }


    public function get_bank_info(Request $request){

        $bank_info = BankAccount::find($request->id);
        return response()->json($bank_info);
    }

    public function received(){

        $bank = BankAccount::all();
        $supplier = Supplier::all();
        return view('transaction.received',compact('bank','supplier'));
    }

    public function allreceived(){

        $recived_all = Transactioncal::whereNotnull('cr')
                        ->orderBy('id', 'DESC')
                        ->get();
        return view('transaction.allreceived',compact('recived_all'));
    }

    public function get_bank_info_re(Request $request){

        $bank_info = BankAccount::find($request->id);
        return response()->json($bank_info);


    }

    public function get_bank_info_re_t(Request $request){

        $supplier = Supplier::find($request->id);
        return response()->json($supplier);
    }

    public function paymentstore(Request $request){
        
        $userId = session()->get('id');
        $username = session()->get('name');

        $transactioncal = new Transactioncal;

        $transactioncal->bank_id = $request->bank_id;
        $transactioncal->supplier_id = $request->supplier_id;
        $transactioncal->pay_type = $request->pay_type;
       // $transactioncal->amount = $request->amount;
        $transactioncal->notes = $request->notes;
        
        $transactioncal->dr = $request->amount;
        $transactioncal->user_id = $userId;
        $transactioncal->created_by = $username;


        if($request->check != null){
            $transactioncal->check_num = $request->check;
        }

        //check is balance in insuficcient
        $open_balance = Balance::where('bank_id',$request->bank_id)
                                ->first();
        
        if ($open_balance != null) {
            $open_balance = (int) $open_balance->amount;
        }else{
            $open_balance = 0;
        }
        $debit = Transactioncal::where('bank_id',$request->bank_id)
                                ->whereNotnull('dr')
                                ->get()
                                ->sum('dr');

        $credit = Transactioncal::where('bank_id',$request->bank_id)
                                ->whereNotnull('cr')
                                ->get()
                                ->sum('cr');

        
        $sum = $credit + $open_balance;
        $current_balance = $sum - $debit;

        //customer payment
        $payment_amount = AddProduct::where('supplier_name',$request->supplier_id)
                                        ->get()
                                        ->sum('product_price');


        $customer_debit = Transactioncal::where('supplier_id',$request->supplier_id)
                                    ->whereNotnull('dr')
                                    ->get()
                                    ->sum('dr');                              

        
        $cus_payable_amount = $payment_amount - $customer_debit;

        if ($current_balance >= $request->amount) {
            if ($cus_payable_amount >= $request->amount) {
                $transactioncal->amount = $request->amount;
                $transactioncal->save();

                Toastr::success('Payment Money Successfully', 'Done', ["positionClass" => "toast-top-right"]);
            }else{
                Toastr::error('You paid more taka to the customer', 'Opps', ["positionClass" => "toast-top-right"]);
            }
        }else{
            Toastr::error('You Current Balance Is Low', 'Opps', ["positionClass" => "toast-top-right"]);
        }

        return redirect()->route('allpayment.transaction');
    }

    public function receivedstore(Request $request){
        
        $userId = session()->get('id');
        $username = session()->get('name');

        $transactioncal = new Transactioncal;

        $transactioncal->bank_id = $request->bank_id;
        $transactioncal->supplier_id = $request->supplier_id;
        $transactioncal->pay_type = $request->pay_type;
        $transactioncal->amount = $request->amount;
        $transactioncal->notes = $request->notes;
        
        $transactioncal->cr = $request->amount;
        $transactioncal->user_id = $userId;
        $transactioncal->created_by = $username;


        if($request->check != null){
            $transactioncal->check_num = $request->check;
        }

        $transactioncal->save();
        
        Toastr::success('Received Money Successfully', 'Done', ["positionClass" => "toast-top-right"]);

        return redirect()->route('allreceived.transaction');
    }

    public function filterbydatepayment(Request $request){

        $request->validate([
            'start' => 'required',
            'end' => 'required'
        ]);

        $start = $request->start;
        $end = $request->end;

       

        $payment_all = Transactioncal::with('bank','supplier')
						->whereDate('created_at','>=',$start)
						->whereDate('created_at','<=',$end)
                        ->whereNotnull('dr')
						->get();

        Toastr::success('Filter By Dated', 'Done', ["positionClass" => "toast-top-right"]);
        return view('transaction.allpayment',compact('payment_all'));



    }

    public function filterbydatereceived(Request $request){

        $request->validate([
            'start' => 'required',
            'end' => 'required'
        ]);

        $start = $request->start;
        $end = $request->end;

       

        $recived_all = Transactioncal::with('bank','supplier')
						->whereDate('created_at','>=',$start)
						->whereDate('created_at','<=',$end)
                        ->whereNotnull('cr')
						->get();

        
        Toastr::success('Filter By Dated', 'Done', ["positionClass" => "toast-top-right"]);

        return view('transaction.allreceived',compact('recived_all'));

    }

    // public function ajaxpayment(Request $request){
    //     $start = $request->start;
    //     $end = $request->end;

       

    //     $recived_all = Transactioncal::with('bank','supplier')
	// 					->whereDate('created_at','>=',$start)
	// 					->whereDate('created_at','<=',$end)
	// 					->get();

    //                     return response()->json($recived_all);
    // }

    
    
}
