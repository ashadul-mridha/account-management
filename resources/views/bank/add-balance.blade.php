@extends('includes.header')
@section('pageTitle', 'Add Bank Account')

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
				<h4 class="page-header-title">Add Balance</h4>
				<div class="widget-options">
					{{-- <a  href="{{route('index.bank')}}" type="button" class="btn btn-primary btn-square mr-1 mb-2">All Bank Account</a> --}}
				</div>
				<div style="display: none;" class="widget-options">
					<button type="button" data-toggle="collapse" data-target="#add_div" aria-haspopup="true" aria-expanded="true" class="dropdown-toggle">
						<i class="la la-ellipsis-h"></i>
					</button>
				</div>

			</div>
			<div id="add_div" class="widget-body">
				<form id="add_form" action="{{ route('storebalance.bank') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
					{{ csrf_field() }}

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Amount</label>
						<div class="col-lg-9">
							<input required name="amount" value="{{old('amount')}}" placeholder="Enter Your Amount" type="text" class="form-control">
							@error('amount')
                            	   <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
                        <label for="bank_id" class="col-lg-3 form-control-label">Select Your Bank Account</label>
                        <div class="col-lg-9">
                            <select name="bank_id" id="bank_id" class="form-control">
                                <option value="" selected disabled>Select Account Number</option>
                                @foreach ($bank as $row)
                                    <option value="{{ $row->id }}">{{$row->account_number}} / {{$row->name}} </option>
                                @endforeach
                            </select>
                            @error('bank_id')
                                   <strong class="text-danger">{{ $message }} </strong>
                            @enderror
                        </div>
                    </div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Create Date</label>
						<div class="col-lg-9">
							<input  name="cr_date" value="{{old('cr_date')}}" placeholder="Enter Your Date" type="date" class="form-control">
							@error('cr_date')
                        	    <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
                        <label class="col-lg-3 form-control-label">Notes</label>
                        <div class="col-lg-9">
                            <textarea required name="notes" value="{{old('notes')}}" placeholder="Your Notes" type="text" class="form-control" rows="6"></textarea>
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



