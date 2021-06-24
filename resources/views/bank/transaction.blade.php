@extends('includes.header')
@section('pageTitle', 'User')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/datatables/datatables.min.css') }}">
@endpush

@section('content')
<div class="row flex-row">
	<div class="col-12">
		<!-- Form -->
		<div class="widget has-shadow">

				<div class="row">
					<div class="col-md-6">
						<a class="btn btn-danger" href="{{route('transaction.pdf',$bank_account->id)}}">Save PDF</a>
					</div>
				</div>

			<div class="container  bg-info">
				<div class="row justify-content-md-center">
				  <div class="col-sm-12 col-md-6 col-lg-6 text-center">
						<h1>Bank Name: {{$bank_account->name}}</h1>
						<h2>Account Name: {{$bank_account->account_name}}</h2>
						<h3>Account Number: {{$bank_account->account_number}}</h3>
				  </div>
				</div>
			  </div>
			  <div class="container">
				  <div class="row justify-content-start">
					  <div class="col-sm-12 col-md-6 col-lg-6">
						  <div class="row">
							  <div class="col-4">
								  <p class="text-primary">Opning Balance:</p>
							  </div>
							  <div class="col-2">
								  <p class="text-primary">{{$open_balance}}</p>
							  </div>
						  </div>
						  <div class="row">
							  <div class="col-4">
								  <p class="text-primary">Account Debit:</p>
							  </div>
							  <div class="col-2">
								  <p class="text-primary">{{$debit}}</p>
							  </div>
						  </div>
						  <div class="row ">
							  <div class="col-4">
								  <p class="text-primary">Account Credit:</p>
							  </div>
							  <div class="col-2">
								  <p class="text-primary">{{$credit}}</p>
							  </div>
						  </div>
						  <div class="row">
							  <div class="col-6">
								  <hr class="text-primary">
							  </div>
						  </div>
						  
						  <div class="row">
							  <div class="col-4">
								  <p class="text-primary">Current Balance:</p>
							  </div>
							  <div class="col-2">
								  <p class="text-primary">{{ $current_balance}}</p>
							  </div>
						  </div>
					  </div>
				  </div>
			  </div>
			<div class="widget-body">
				<div class="table-responsive">
					<table style="color:#04243c;" id="thedatatable" class="p-l-0 p-r-0 table table-bordered table-hover">
						<thead>
                            <tr>
								<th>Sl No:</th>
								<th>Date</th>
								<th>Transaction ID</th>
								<th>Notes</th>
								<th>Debit</th>
								<th>Credit</th>
							</tr>
						</thead>
						<tbody>
                            @php
                                $sl = 1;
                                $tran_id = mt_rand( 1000000000, 9999999999 );
                            @endphp
                            @foreach ($ac_info as $row)
                            <tr>
                                <td>{{$sl++}}</td>
                                <td>{{date('d-m-Y', strtotime($row->created_at))}}</td>
                                <td>{{$tran_id++}}</td>
                                <td>{{$row->notes}}</td>
                                <td>{{$row->dr == null ? ' ' : $row->dr}}</td>
                                <td>{{$row->cr == null ? ' ' : $row->cr}}</td>
                            </tr>  
                            @endforeach
						</tbody>
					</table>
				</div>

			</div>
		</div>
		<!-- End Form -->
	</div>
</div>



@include('commonhtml.deletemodal')

@endsection

@push('scripts')

<script src="{{ asset('assets/vendors/js/base/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

<script src="{{ asset('assets/vendors/js/datatables/datatables.min.js') }}"></script>

<script type="text/javascript">

	var table = $('#thedatatable').DataTable({
		
	});
</script>
@endpush




