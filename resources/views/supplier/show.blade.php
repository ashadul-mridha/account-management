@extends('includes.header')
@section('pageTitle', 'Supplier Details')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/datatables/datatables.min.css') }}">
@endpush

@section('content')
<div class="row flex-row">

	<div class="col-12">
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4 class="page-header-title">Supplier Details</h4>
				<div class="widget-options">
					<a  href="{{route('index.supplier')}}" type="button" class="btn btn-primary btn-square mr-1 mb-2">All Supplier</a>
				</div>
			</div>
			<div id="add_div" class="widget-body">
				<form>
					<div class="form-group row">
						<div class="form-group col-md-6">
							<label for="name">Supplier Or Customer Name</label>
							<input id="name" readonly value="{{$supplier->supplier_name}}" class="form-control">
						</div>
						<div class="form-group col-md-6">
							<label for="phn_num">Phone Number</label>
							<input id="phn_num" readonly value="{{$supplier->mobile_number}}" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="form-group col-md-6">
							<label for="name">Type</label>
							<input id="name" readonly value="{{$supplier->type}}" class="form-control">
						</div>
						<div class="form-group col-md-6">
							<label for="acc_num">Account Number</label>
							<input id="acc_num" readonly value="{{$supplier->account_number}}" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="form-group col-md-6">
							<label for="service">Service</label>
							<input id="service" readonly value="{{$supplier->service}}" class="form-control">
						</div>
						<div class="form-group col-md-6">
							<label for="address">Address</label>
							<input id="address" readonly value="{{$supplier->address}}" class="form-control">
						</div>
					</div>
					
				</form>
			</div>
		</div>
	</div>
</div>






@include('commonhtml.deletemodal')

@endsection


@push('scripts')

<script src="{{ asset('assets/vendors/js/base/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.form.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/commonscript.js') }}"></script>
<script src="{{ asset('assets/js/jquery-ui.js') }}"></script>

