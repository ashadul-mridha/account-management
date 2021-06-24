@extends('includes.header')
@section('pageTitle', 'show Payment')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/datatables/datatables.min.css') }}">
@endpush

@section('content')
<div class="row flex-row">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4 class="page-header-title">Payment</h4>
				<div class="widget-options">
					<a  href="{{route('payment.transaction')}}" type="button" class="btn btn-primary btn-square mr-1 mb-2">Payment</a>
				</div>
				<div style="display: none;" class="widget-options">
					<button type="button" data-toggle="collapse" data-target="#add_div" aria-haspopup="true" aria-expanded="true" class="dropdown-toggle">
						<i class="la la-ellipsis-h"></i>
					</button>
				</div>
			</div>
	<div class="col-12">
		<!-- Form -->
		<div class="widget has-shadow">
			<div class="text-center mt-3">
                {{-- <h1>Bank Name: {{$bank_account->name}}</h1>
                <h2>Account Name: {{$bank_account->account_name}}</h2>
                <h3>Account Number: {{$bank_account->account_number}}</h3> --}}
            </div>
			<div class="widget-body">
				<div class="table-responsive">
					<table style="color:#04243c;" id="table_id" class="p-l-0 p-r-0 table table-bordered table-hover table-striped">
						<thead>
                            <tr>
								<th>Sl No:</th>
								<th>Date</th>
								<th>Transaction Id</th>
								<th>Note</th>
								<th>Ammount</th>
								<th>Debit</th>
								<th>Credit</th>
							</tr>
						</thead>
						<tbody>
                            @php
                                $sl = 1;
                                $tran_id = mt_rand( 1000000000, 9999999999 );
                            @endphp
                            @foreach ($payment_all as $row)
                            <tr>
                                <td>{{$sl++}}</td>
                                <td>{{date('d-m-Y', strtotime($row->created_at))}}</td>
                                <td>{{$tran_id++}}</td>
                                <td>{{$row->notes}}</td>
                                <td>{{$row->amount}}</td>
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
<script src="{{ asset('assets/js/jquery.form.min.js') }}"></script>

<script src="{{ asset('assets/vendors/js/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/buttons.print.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready( function () {
    $('#table_id').DataTable();
    } );
</script>

@endpush



