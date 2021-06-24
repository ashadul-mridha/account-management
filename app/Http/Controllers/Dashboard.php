<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Transactioncal;
use Toastr;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use PDF;

class Dashboard extends Controller
{

	public function __construct()
	{
		$this->middleware('admin');
	}

	public function index()
	{
		
		$monthly_data = Transactioncal::with('bank','supplier')
										->whereMonth('created_at',date('m'))
										->whereYear('created_at',date('Y'))
										->get();

		
		$debit = Transactioncal::whereMonth('created_at',date('m'))
								->whereYear('created_at',date('Y'))
								->WhereNotNull('dr')
								->get()
								->sum('dr');

		$credit = Transactioncal::whereMonth('created_at',date('m'))
								->whereYear('created_at',date('Y'))
								->WhereNotNull('cr')
								->get()
								->sum('cr');

		
		return view('dashboard',compact('monthly_data','debit','credit'));
	}

	public function pdf(){

		$monthly_data = Transactioncal::with('bank','supplier')
										->whereMonth('created_at',date('m'))
										->whereYear('created_at',date('Y'))
										->get();

		
		$debit = Transactioncal::whereMonth('created_at',date('m'))
								->whereYear('created_at',date('Y'))
								->WhereNotNull('dr')
								->get()
								->sum('dr');

		$credit = Transactioncal::whereMonth('created_at',date('m'))
								->whereYear('created_at',date('Y'))
								->WhereNotNull('cr')
								->get()
								->sum('cr');

		$pdf = PDF::loadView('transaction.dashpdf',compact('monthly_data','debit','credit'));
		return $pdf->download('currentmonthtran.pdf');						
	}

}