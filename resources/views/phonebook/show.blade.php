@extends('includes.header')
@section('pageTitle', 'PhoneBook Details')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/datatables/datatables.min.css') }}">
@endpush

@section('content')
<div class="row flex-row">

	<div class="col-12">
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4 class="page-header-title">PhoneBook Details</h4>
				<div class="widget-options">
					<a  href="{{route('index.phonebook')}}" type="button" class="btn btn-primary btn-square mr-1 mb-2">All PhoneBook</a>
				</div>
			</div>
			<div id="add_div" class="widget-body">
				<form>
					<div class="form-group row">
						<div class="form-group col-md-6">
							<label for="name">Name</label>
							<input id="name" readonly value="{{$phonebook->name}}" class="form-control">
						</div>
						<div class="form-group col-md-6">
							<label for="phn_num">Phone Number</label>
							<input id="phn_num" readonly value="{{$phonebook->mobile_number}}" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="form-group col-md-12">
							<label for="address">Address</label>
							<input id="address" readonly value="{{$phonebook->address}}" class="form-control">
						</div>
					</div>
					<div class="form-group row">
						<div class="form-group col-md-12">
							<label for="notes">Notes</label>
							<input id="notes" readonly value="{{$phonebook->notes}}" class="form-control">
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

