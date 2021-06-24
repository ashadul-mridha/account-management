@extends('includes.header')
@section('pageTitle', 'Nomini Details')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/datatables/datatables.min.css') }}">
@endpush

@section('content')
<div class="row flex-row">

	<div class="col-12">
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4 class="page-header-title">Nomini Details</h4>
				<div class="widget-options">
					<a  href="{{route('index.nomini')}}" type="button" class="btn btn-primary btn-square mr-1 mb-2">All Nomini</a>
				</div>
			</div>
			<div id="add_div" class="widget-body">
				<form>
					<div class="form-group row">
						<div class="form-group col-md-4">
							<label for="name">Nomini Name</label>
							<input id="name" readonly value="{{$nomini->name}}" class="form-control">
						</div>
						<div class="form-group col-md-4">
							<label for="mname">Member Name</label>
							<input id="mname" readonly value="{{$member->name}}" class="form-control">
						</div>
						<div class="form-group col-md-4">
							<label for="phn_num">Phone Number</label>
							<input id="phn_num" readonly value="{{$nomini->mobile_num}}" class="form-control">
						</div>
					</div>

					<div class="form-group row">
						<div class="form-group col-md-6">
							<label for="fname">Father or Husband Name</label>
							<input id="fname" readonly value="{{$nomini->fatherorhusband}}" class="form-control">
						</div>
						<div class="form-group col-md-6">
							<label for="mname">Mother or Wife</label>
							<input id="mname" readonly value="{{$nomini->motherorwife}}" class="form-control">
						</div>
					</div>

					<div class="form-group row">
						<div class="form-group col-md-6">
							<label for="nid_num">NID Number</label>
							<input id="nid_num" readonly value="{{$nomini->nid_num}}" class="form-control">
						</div>
						<div class="form-group col-md-6">
							<label for="acc_num">Account Number</label>
							<input id="acc_num" readonly value="{{$nomini->account_number}}" class="form-control">
						</div>
					</div>

                    <div class="form-group row">
						<div class="form-group col-md-12">
							<label for="address">Full Address</label>
							<input id="address" readonly value="{{$nomini->address}}" class="form-control">
						</div>
						{{-- <div class="form-group col-md-6">
							<label for="acc_num">Account Number</label>
							<input id="acc_num" readonly value="{{$member->account_number}}" class="form-control">
						</div> --}}
					</div>

					<div class="form-group row">
						<div class="form-group col-md-6">
							<label>Profile Picture</label>
							<div class="card" style="width: 18rem;">
                                <img style="height: 250px; width:250px;" class="card-img-top" src="{{asset('public/Image/Nomini/Photo')}}/{{$nomini->photo}}" alt="Nomini Picture">
                            </div>
						</div>
						<div class="form-group col-md-6">
							<label>NID Front Picture</label>
							<div class="card" style="width: 18rem;">
                                <img style="height: 250px; width:250px;" class="card-img-top" src="{{asset('public/Image/Nomini/Nid/Front')}}/{{$nomini->nid_photo_front}}" alt="NID Front Picture">
                            </div>
						</div>
						<div class="form-group col-md-6">
							<label>NID Back Picture</label>
							<div class="card" style="width: 18rem;">
                                <img style="height: 250px; width:250px; " class="card-img-top" src="{{asset('public/Image/Nomini/Nid/Back')}}/{{$nomini->nid_photo_back}}" alt="NID Back Picture">
                            </div>
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

