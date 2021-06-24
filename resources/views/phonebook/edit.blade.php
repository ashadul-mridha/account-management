@extends('includes.header')
@section('pageTitle', 'Edit PhoneBook')

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
				<h4 class="page-header-title">Edit PhoneBook</h4>
				<div class="widget-options">
					<a  href="{{route('index.phonebook')}}" type="button" class="btn btn-primary btn-square mr-1 mb-2">All PhoneBook</a>
				</div>
				<div style="display: none;" class="widget-options">
					<button type="button" data-toggle="collapse" data-target="#add_div" aria-haspopup="true" aria-expanded="true" class="dropdown-toggle">
						<i class="la la-ellipsis-h"></i>
					</button>
				</div>

			</div>
			<div id="add_div" class="widget-body">
				<form id="add_form" action="{{route('update.phonebook')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
					{{ csrf_field() }}

                    <input type="hidden" name="id" value="{{$phonebook->id}}">
                    
					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Name</label>
						<div class="col-lg-9">
							<input required name="name" value="{{$phonebook->name}}" placeholder="Enter Your Name" type="text" class="form-control">
							@error('name')
                            	   <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Mobile Number</label>
						<div class="col-lg-9">
							<input required id="mobile_number" name="mobile_number" value="{{$phonebook->mobile_number}}" placeholder="Enter Your Mobile Number" type="text" class="form-control">
							@error('mobile_number')
                        	    <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div> 

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Address</label>
						<div class="col-lg-9">
							<input  name="address" value="{{$phonebook->address}}" placeholder="Enter Your Address" type="text" class="form-control">
							@error('address')
                        	    <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>
        
                    <div class="form-group row d-flex align-items-center mb-5">
                        <label class="col-lg-3 form-control-label">Notes</label>
                        <div class="col-lg-9">
                            <textarea required name="notes" value="{{$phonebook->notes}}" placeholder="Your Notes" type="text" class="form-control" rows="6"></textarea>
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



