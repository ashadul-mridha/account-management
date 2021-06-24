@extends('includes.header')
@section('pageTitle', 'Add Nomini')

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
				<h4 class="page-header-title">Add New Nomini</h4>
				<div class="widget-options">
					<a  href="{{route('index.nomini')}}" type="button" class="btn btn-primary btn-square mr-1 mb-2">All Nomini</a>
				</div>
				<div style="display: none;" class="widget-options">
					<button type="button" data-toggle="collapse" data-target="#add_div" aria-haspopup="true" aria-expanded="true" class="dropdown-toggle">
						<i class="la la-ellipsis-h"></i>
					</button>
				</div>

			</div>
			<div id="add_div" class="widget-body">
				<form id="add_form" action="{{ route('store.nomini')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
					{{ csrf_field() }}

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Nomini Name</label>
						<div class="col-lg-9">
							<input required name="name" value="{{old('name')}}" placeholder="Enter Your Name" type="text" class="form-control">
							@error('name')
                            	   <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

                    <div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Member Name</label>
						<div class="col-lg-9">
                            <select name="member_name" id="member_name" class="form-control">
                                @foreach ($member as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>
                                @endforeach
                            </select>
							@error('member_name')
                            	   <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Nomini Picture</label>
						<div class="col-lg-9">
							<input  name="photo" value="{{old('photo')}}"  type="file" class="form-control">
							@error('photo')
                        	    <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Father / Husband</label>
						<div class="col-lg-9">
							<input required name="fatherorhusband" value="{{old('fatherorhusband')}}" placeholder="Enter Your Father or Husband Name" type="text" class="form-control">
							@error('fatherorhusband')
                            	   <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Mother / Wife</label>
						<div class="col-lg-9">
							<input required name="motherorwife" value="{{old('motherorwife')}}" placeholder="Enter Your Mother or Wife Name" type="text" class="form-control">
							@error('motherorwife')
                            	   <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Mobile Number</label>
						<div class="col-lg-9">
							<input required name="mobile_num" value="{{old('mobile_num')}}"" placeholder="Enter Your Mobile Number" type="text" class="form-control">
							@error('mobile_num')
                        	    <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">NID Number</label>
						<div class="col-lg-9">
							<input required name="nid_num" value="{{old('nid_num')}}" placeholder="Enter Your NID Number" type="text" class="form-control">
							@error('nid_num')
                            	   <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Account Number</label>
						<div class="col-lg-9">
							<input required name="account_number" value="{{old('account_number')}}" placeholder="Enter Your Account Number" type="text" class="form-control">
							@error('account_number')
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
						<label class="col-lg-3 form-control-label">NID Front Picture</label>
						<div class="col-lg-9">
							<input  name="nid_photo_front" value="{{old('nid_photo_front')}}"  type="file" class="form-control">
							@error('nid_photo_front')
                        	    <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">NID Back Picture</label>
						<div class="col-lg-9">
							<input  name="nid_photo_back" type="file" value="{{old('nid_photo_back')}}"class="form-control">
							@error('nid_photo_back')
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



