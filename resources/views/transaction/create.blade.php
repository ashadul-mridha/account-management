@extends('includes.header')
@section('pageTitle', 'Insert Transaction')

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
				<h4 class="page-header-title">Add Transaction</h4>
				<div class="widget-options">
					<a  href="#" type="button" class="btn btn-primary btn-square mr-1 mb-2">All Transaction</a>
				</div>
				<div style="display: none;" class="widget-options">
					<button type="button" data-toggle="collapse" data-target="#add_div" aria-haspopup="true" aria-expanded="true" class="dropdown-toggle">
						<i class="la la-ellipsis-h"></i>
					</button>
				</div>

			</div>
			<div id="add_div" class="widget-body">
				<form id="add_form" action="{{ route('store.transaction')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
					{{ csrf_field() }}

					<div class="form-group row d-flex align-items-center mb-5">
						<label for="member_id" class="col-lg-3 form-control-label">Member Name</label>
						<div class="col-lg-9">
                            <select name="member_id" id="member_id" class="form-control">
                                @foreach ($member as $row)
                                    <option value="{{ $row->id }}">{{$row->name}} </option>
                                @endforeach
                            </select>
							@error('member_id')
                            	   <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

                    <div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Busniess Name</label>
						<div class="col-lg-9">
							<input required name="bussniess_name" value="{{old('bussniess_name')}}" placeholder="Enter Your Busniess Name" type="text" class="form-control">
							@error('bussniess_name')
                            	   <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

                    <div class="form-group row d-flex align-items-center mb-5">
						<label for="transaction_type" class="col-lg-3 form-control-label">Transaction Type</label>
						<div class="col-lg-9">
                            <select name="transaction_type" id="transaction_type" class="form-control">
                                <option value="loan"> Loan </option>
                                <option value="saving"> Saving </option>
                                <option value="fixed_dipposit"> Fixed Dipposit </option>
                            </select>
							@error('transaction_type')
                            	   <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

                    <div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Reasone</label>
						<div class="col-lg-9">
							<input required name="reasone" value="{{old('reasone')}}" placeholder="Why You Need Money?" type="text" class="form-control">
							@error('reasone')
                            	   <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

                    <div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Trade Liceness</label>
						<div class="col-lg-9">
							<input required name="trade" value="{{old('trade')}}" placeholder="Enter Your Trade Liceness If you Have" type="text" class="form-control">
							@error('trade')
                            	   <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

                    <div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Family Member</label>
						<div class="col-lg-9">
							<input required name="family_number" value="{{old('family_number')}}" placeholder="Enter Your Family Number" type="text" class="form-control">
							@error('family_number')
                            	   <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

                    <div class="form-group row d-flex align-items-center mb-5">
						<label for="bank_id" class="col-lg-3 form-control-label">Select Your Bank Account</label>
						<div class="col-lg-9">
                            <select name="bank_id" id="bank_id" class="form-control">
                                @foreach ($bank as $row)
                                    <option value="{{ $row->id }}">{{$row->account_number}} </option>
                                @endforeach
                            </select>
							@error('bank_id')
                            	   <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

                    <div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Notes</label>
						<div class="col-lg-9">
							<input required name="note" value="{{old('note')}}" placeholder="Your Notes" type="text" class="form-control">
							@error('note')
                            	   <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

                    <div class="form-group row d-flex align-items-center mb-5">
						<label for="pay_type" class="col-lg-3 form-control-label">Payment Type</label>
						<div class="col-lg-9">
                            <select id="select_pay_type" name="pay_type" id="pay_type" class="form-control">
                                <option value="" selected disabled>Select Payment Type</option>
                                <option value="check"> Check </option>
                                <option value="cash"> Cash </option>
                            </select>
							@error('pay_type')
                            	   <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>
                    <div style="display: none" id="check_number">
                    <div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Check Number</label>
						<div class="col-lg-9">
							<input  name="check" value="{{old('check')}}" placeholder="Enter Check Number" type="text" class="form-control">
							@error('check')
                            	   <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>
                  </div>

                    <div class="form-group row d-flex align-items-center mb-5" id="amount">
						<label class="col-lg-3 form-control-label">Amount</label>
						<div class="col-lg-9">
							<input required name="amount" value="{{old('amount')}}" placeholder="Enter Amount" type="text" class="form-control">
							@error('amount')
                            	   <strong class="text-danger">{{ $message }} </strong>
                            @enderror
						</div>
					</div>

                    
					

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label"></label>
						<div class="col-lg-9">
							<button id="add_save_btn" type="submit" class="btn btn-primary btn-square mr-1 mb-2">Pay Transaction</button>
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
    $('#select_pay_type').on('change',function(){

        var val = $(this).val();
        if(val == 'check'){
            $('#check_number').css("display","block")
        }else{
            $('#check_number').css("display","none")
        }
    
    
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



