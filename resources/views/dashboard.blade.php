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
					<a class="btn btn-danger" href="{{route('dashboard.pdf')}}">Save PDF</a>
				</div>
			</div>
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4 class="page-header-title">Current Month Transaction</h4>
				<div class="widget-options">
					<div>
						<h4 style="display: inline">Total Debit:</h4>
						<span>{{ $debit}}</span>
					</div>
					<div>
						<h4 style="display: inline">  Total Credit:</h4>
						<span>{{ $credit}}</span>
					</div>
				</div>
			</div>
			<div class="widget-body">
				<div class="table-responsive">
					<table style="color:#04243c;" id="thedatatable" class="p-l-0 p-r-0 table table-bordered table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Bank Information</th>
								<th>Customer Information</th>
								<th>Debit</th>
								<th>Credit</th>
								<th>Notes</th>
							</tr>
						</thead>
						<tbody>
							@php
								$sl= 1;
							@endphp
							@foreach ($monthly_data as $row)
							<tr>
								<td>{{$sl++}}</td>
		
								<td>
								{{ $row->bank->name}}
								<br>
								{{$row->bank->account_number}}
								</td>
		
								<td>
								{{ $row->supplier->supplier_name}}
								<br>
								{{ $row->supplier->mobile_number}}
								</td>
		
								<td>{{$row->dr == null ? '' : $row->dr}}</td>
		
								<td>{{$row->cr == null ? '' : $row->cr}}</td>
								
								</td>
								<td>{{$row->notes}}</td>
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









