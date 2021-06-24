@extends('includes.header')
@section('pageTitle', 'Add Product')

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
				<h4 class="page-header-title">Add New Product</h4>
				<div class="widget-options">
					<a  href="{{route('index.product')}}" type="button" class="btn btn-primary btn-square mr-1 mb-2">All Product</a>
				</div>
				<div style="display: none;" class="widget-options">
					<button type="button" data-toggle="collapse" data-target="#add_div" aria-haspopup="true" aria-expanded="true" class="dropdown-toggle">
						<i class="la la-ellipsis-h"></i>
					</button>
				</div>

			</div>
			<div id="add_div" class="widget-body">
				<form id="add_form" action="{{ route('store.product')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
					{{ csrf_field() }}

                    <div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Select Supplier Name</label>
						<div class="col-lg-9">
                            <select name="supplier_name" id="supplier_name" class="form-control">
                                @foreach ($all_supplier as $row)
                                    <option value="{{$row->id}}">{{$row->supplier_name}}</option>
                                @endforeach
                            </select>
							@error('member_name')
                            	   <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Product Name</label>
						<div class="col-lg-9">
							<input required name="product_name" value="{{old('product_name')}}" placeholder="Enter Your Product Name" type="text" class="form-control">
							@error('product_name')
                            	   <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Product Price</label>
						<div class="col-lg-9">
							<input required name="product_price" value="{{old('product_price')}}" placeholder="Enter Your Product Price" type="text" class="form-control">
							@error('product_price')
                            	   <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Product Quantity</label>
						<div class="col-lg-9">
							<input required name="product_quantity" value="{{old('product_quantity')}}" placeholder="Enter Your Product Quantity" type="text" class="form-control">
							@error('product_quantity')
                            	   <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Car Rent Ammount</label>
						<div class="col-lg-9">
							<input name="car_rent" value="{{old('car_rent')}}"" placeholder="Enter Car Rent Amount" type="text" class="form-control">
							@error('car_rent')
                        	    <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Other Cost</label>
						<div class="col-lg-9">
							<input name="other_cost" value="{{old('other_cost')}}" placeholder="Other Cost" type="text" class="form-control">
							@error('other_cost')
                            	   <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>
        
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label class="col-lg-3 form-control-label">Notes</label>
                        <div class="col-lg-9">
                            <textarea  name="notes" value="{{old('notes')}}" placeholder="Your Notes" type="text" class="form-control" rows="6"></textarea>
                            @error('notes')
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

<script src="{{ asset('assets/vendors/js/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/buttons.print.min.js') }}"></script>


@endpush



