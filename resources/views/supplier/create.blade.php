@extends('includes.header')
@section('pageTitle', 'Add Supplier Or Customer')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/datatables/datatables.min.css') }}">
@endpush

@section('content')



<div id="add_client" class="row flex-row">
	<div class="col-12">
		<!-- Form -->
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				{{-- @include('includes.message') --}}
				<h4 class="page-header-title">Add Supplier Or Customer</h4>
				<div class="widget-options">
					<a  href="{{route('index.supplier')}}" type="button" class="btn btn-primary btn-square mr-1 mb-2">All Supplier Or Customer</a>
				</div>
				<div style="display: none;" class="widget-options">
					<button type="button" data-toggle="collapse" data-target="#add_div" aria-haspopup="true" aria-expanded="true" class="dropdown-toggle">
						<i class="la la-ellipsis-h"></i>
					</button>
				</div>

			</div>
			<div id="add_div" class="widget-body">
				<form id="add_form" action="{{route('store.supplier')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
					{{ csrf_field() }}

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Supplier Or Customer Name</label>
						<div class="col-lg-9">
							<input required name="supplier_name" value="{{old('supplier_name')}}" placeholder="Enter Your Supplier Name" type="text" class="form-control">
							@error('supplier_name')
                            	   <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Mobile Number</label>
						<div class="col-lg-9">
							<input required id="mobile_number" name="mobile_number" value="{{old('mobile_number')}}" placeholder="Enter Your Mobile Number" type="text" class="form-control">
							@error('mobile_number')
                        	    <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Account Number</label>
						<div class="col-lg-9">
							<input required name="account_number" id="account_num" value="{{old('account_number')}}" placeholder="Enter Your Mobile Number" type="text" class="form-control">
							@error('account_number')
                        	    <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">User Type</label>
						<div class="col-lg-9">
							<select name="type" id="type" class="form-control">
								<option value="supplier">Supplier</option>
								<option value="customer">Customer</option>
							</select>
							@error('type')
                        	    <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">What Service You Serve?</label>
						<div class="col-lg-9">
							<input required name="service" value="{{old('service')}}" placeholder="Enter Your Service" type="text" class="form-control">
							@error('service')
                        	    <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Address</label>
						<div class="col-lg-9">
							<input  name="address" value="{{old('address')}}" placeholder="Enter Your Address" type="text" class="form-control">
							@error('address')
                        	    <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label"></label>
						<div class="col-lg-9">
							<button id="add_save_btn" type="submit" class="btn btn-primary btn-square mr-1 mb-2">SAVE</button>
						</div>
					</div>
				</form>
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

<script>
    $('#mobile_number').on('keyup',function(){

       var num = $(this).val()
	   $('#account_num').val(num)
    
    
    })
</script>

<script src="{{ asset('assets/vendors/js/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/buttons.print.min.js') }}"></script>


@endpush



