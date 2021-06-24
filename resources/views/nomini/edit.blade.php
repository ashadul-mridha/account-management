@extends('includes.header')
@section('pageTitle', 'Add Member')

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
				<h4 class="page-header-title">Edit Nomini</h4>
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
				<form id="add_form" action="{{ route('update.nomini')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
					{{ csrf_field() }}

                    <input type="hidden" value="{{$row->id}}" name="id">
					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Nomini Name</label>
						<div class="col-lg-9">
							<input required name="name" value="{{$row->name}}" placeholder="Enter Your Name" type="text" class="form-control">
							@error('name')
                            	   <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Nomini Picture</label>
						<div class="col-lg-9">
							<img style="height: 250px; width:250px;" class="card-img-top" src="{{asset('public/Image/Nomini/Photo')}}/{{$row->photo}}" alt="Member Picture">
							<input  name="photo" value="{{old('photo')}}"  type="file" class="form-control">
							@error('photo')
                        	    <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Father / Husband</label>
						<div class="col-lg-9">
							<input required name="fatherorhusband" value="{{$row->fatherorhusband}}" placeholder="Enter Your Father or Husband Name" type="text" class="form-control">
							@error('fatherorhusband')
                            	   <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Mother / Wife</label>
						<div class="col-lg-9">
							<input required name="motherorwife" value="{{$row->motherorwife}}" placeholder="Enter Your Mother or Wife Name" type="text" class="form-control">
							@error('motherorwife')
                            	   <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Mobile Number</label>
						<div class="col-lg-9">
							<input required name="mobile_num" value="{{$row->mobile_num}}"" placeholder="Enter Your Mobile Number" type="text" class="form-control">
							@error('mobile_num')
                        	    <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">NID Number</label>
						<div class="col-lg-9">
							<input required name="nid_num" value="{{$row->nid_num}}" placeholder="Enter Your NID Number" type="text" class="form-control">
							@error('nid_num')
                            	   <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Account Number</label>
						<div class="col-lg-9">
							<input required name="account_number" value="{{$row->account_number}}" placeholder="Enter Your Account Number" type="text" class="form-control">
							@error('account_number')
                        	    <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Address</label>
						<div class="col-lg-9">
							<input  name="address" value="{{$row->address}}" placeholder="Enter Your Address" type="text" class="form-control">
							@error('address')
                        	    <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<div class="col-lg-12">
							<div class="card" style="width: 18rem;">
								<label class=" form-control-label pull-center">NID Front Image</label>
                                <img style="height: 250px; width:250px;" class="card-img-top" src="{{asset('public/Image/Nomini/Nid/Front')}}/{{$row->nid_photo_front}}" alt="NID Front Picture">
								<input  name="nid_photo_front" value="{{old('nid_photo_front')}}"  type="file" class="form-control">
                            </div>
							@error('nid_front_image')
                        	    <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						
						<div class="col-lg-12">
							<div class="card" style="width: 18rem;">
								<label class=" form-control-label">NID Back Image</label>
                                <img style="height: 250px; width:250px;" class="card-img-top" src="{{asset('public/Image/Nomini/Nid/Back')}}/{{$row->nid_photo_back}}" alt="NID Back Picture">
								<input  name="nid_photo_back" value="{{old('nid_photo_front')}}"  type="file" class="form-control">
                            </div>
							@error('nid_front_image')
                        	    <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>


					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label"></label>
						<div class="col-lg-9">
							<button id="add_save_btn" type="submit" class="btn btn-primary btn-square mr-1 mb-2">Update</button>
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



