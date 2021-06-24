@extends('includes.header')
@section('pageTitle', 'Received Transaction')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/datatables/datatables.min.css') }}">
@endpush

@section('content')



<div id="add_client" class="row flex-row">
    {{-- <div class="col-12"> --}}
		<!-- Form -->
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				{{-- @include('includes.message') --}}
				<h4 class="page-header-title">Received</h4>
				<div class="widget-options">
					<a  href="{{ route('allreceived.transaction')}}" type="button" class="btn btn-primary btn-square mr-1 mb-2">All Received</a>
				</div>
				<div style="display: none;" class="widget-options">
					<button type="button" data-toggle="collapse" data-target="#add_div" aria-haspopup="true" aria-expanded="true" class="dropdown-toggle">
						<i class="la la-ellipsis-h"></i>
					</button>
				</div>
			</div>

            {{-- <div class="row"> --}}
                    <div id="add_div" class="widget-body">
                        <form id="add_form" action="{{route('receivedstore.transaction')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="col-6 float-left">

                                <h4 class="h3 text-left text-danger mt-2 ml-2">Your Account</h4>
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
                                    <label for="account_name" class="col-lg-3 form-control-label"> Your Account Name</label>
                                    <div class="col-lg-9">
                                        <input required readonly name="account_name" id="account_name" value="{{old('account_name')}}" placeholder="Your Account Name" type="text" class="form-control">
                                        @error('account_name')
                                               <strong class="text-danger">{{ $message }} </strong>
                                        @enderror
                                    </div>
                                </div>
    
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label for="bank_name" class="col-lg-3 form-control-label"> Your Bank Name</label>
                                    <div class="col-lg-9">
                                        <input required readonly name="bank_name" id="bank_name" value="{{old('bank_name')}}" placeholder="Your Bank Name" type="text" class="form-control">
                                        
                                        @error('bank_name')
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
        
                            <div class="form-group row d-flex align-items-center mb-5">
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
                        </div>
                        <div class="col-6 float-right">

                            <h4 class="h3 text-left text-success mt-2 ml-2">Customer Account</h4>
                            
                            <div class="form-group row d-flex align-items-center mb-5">
                                <label for="supplier_id" class="col-lg-3 form-control-label">Select Your Customer Name</label>
                                <div class="col-lg-9">
                                    <select name="supplier_id" id="supplier_name" class="form-control">
                                        <option value="" selected disabled>Select Your Name</option>
                                        @foreach ($supplier as $row)
                                            <option value="{{ $row->id }}">{{$row->supplier_name}} </option>
                                        @endforeach
                                    </select>
                                    @error('supplier_id')
                                           <strong class="text-danger">{{ $message }} </strong>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label for="account_number" class="col-lg-3 form-control-label"> Your Account Number</label>
                                <div class="col-lg-9">
                                    <input required readonly name="account_number" id="account_number"  value="{{old('account_number')}}" placeholder="Your Account Name" type="text" class="form-control">
                                    @error('account_number')
                                           <strong class="text-danger">{{ $message }} </strong>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row d-flex align-items-center mb-5">
                                <label for="type" class="col-lg-3 form-control-label"> Your Bank Name</label>
                                <div class="col-lg-9">
                                    <input required readonly name="type" id="type" value="{{old('type')}}" placeholder="Your Bank Name" type="text" class="form-control">
                                    @error('type')
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
                                </div>
                    </form>
    
                </div>
                {{-- </div> --}}
            </div>
		{{-- </div> --}}
		<!-- End Form -->

    </div>
</div>
@include('commonhtml.deletemodal')
@endsection



        
        
                            



@push('scripts')

<script src="{{ asset('assets/vendors/js/base/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.form.min.js') }}"></script>
<script>

    // $('#select_pay_type').on('change',function(){

    //     var val = $(this).val();
    //     if(val == 'check'){
    //         $('#check_number').css("display","block")
    //     }else{
    //         $('#check_number').css("display","none")
    //     }
    
    
    // });

    $('#select_pay_type').on('change',function(){

        var val = $(this).val();
        if(val == 'check'){
            $('#check_number').css("display","block")
        }else{
            $('#check_number').css("display","none")
        }
    
    
    });


    $('#supplier_name').on('change',function(){

        var val = $(this).val();

        $.ajax({
        url: "/get-sup-info",
        type:"GET",
        data:{
          id:val,
         
        },
        success:function(data){
            $('#account_number').val(data.account_number)
            $('#type').val(data.type)
          
        },
       });
    });

    $('#bank_id').on('change',function(){

        var val = $(this).val();

        $.ajax({
        url: "/get-bank-info",
        type:"GET",
        data:{
          id:val,
         
        },
        success:function(data){
            $('#account_name').val(data.account_name)
            $('#bank_name').val(data.name)
          
        },
        });
    });


    


    


</script>
<script src="{{ asset('assets/vendors/js/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/buttons.print.min.js') }}"></script>


@endpush



