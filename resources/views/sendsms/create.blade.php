@extends('includes.header')
@section('pageTitle', 'Send SMS')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/datatables/datatables.min.css') }}">
@endpush

@section('content')



<div id="add_client" class="row flex-row">
		<!-- Form -->
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4 class="page-header-title">Send SMS</h4>
				<div class="widget-options">
					<a  href="{{ route('index.allmessage')}}" type="button" class="btn btn-primary btn-square mr-1 mb-2">All SMS History</a>
				</div>
				<div style="display: none;" class="widget-options">
					<button type="button" data-toggle="collapse" data-target="#add_div" aria-haspopup="true" aria-expanded="true" class="dropdown-toggle">
						<i class="la la-ellipsis-h"></i>
					</button>
				</div>
			</div>

                    <div id="add_div" class="widget-body">
                        <form id="add_form" action="{{route('store.allmessage')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                            {{ csrf_field() }}

                            <div class="col-6 float-left">
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label for="supplier_id" class="col-lg-3 form-control-label">Select Number From Customer</label>
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
                            </div>

                            <div class="col-6 float-right">
                                <div class="form-group row d-flex align-items-center mb-5">
                                    <label for="phone" class="col-lg-3 form-control-label">Select Number From PhoneBook</label>
                                    <div class="col-lg-9">
                                        <select name="phone" id="phone" class="form-control">
                                            <option value="" selected disabled>Select Sender Name</option>
                                            @foreach ($phonebook as $row)
                                                <option value="{{ $row->id }}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('phone')
                                               <strong class="text-danger">{{ $message }} </strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-md-center">

                                <div class="col-8">
                                    <div class="form-group row d-flex align-items-center mb-5">
                                        <label for="phone_number" class="col-lg-3 form-control-label"> Your Phone Number</label>
                                        <div class="col-lg-9">
                                            <input required readonly name="phone_number" id="phone_number"  value="{{old('phone_number')}}" placeholder="Your Phone Name" type="text" class="form-control phone_number">
                                            @error('phone_number')
                                                   <strong class="text-danger">{{ $message }} </strong>
                                            @enderror
                                        </div>
                                    </div>
        
                                    <div class="form-group row d-flex align-items-center mb-5">
                                        <label for="address" class="col-lg-3 form-control-label"> Your Address</label>
                                        <div class="col-lg-9">
                                            <input required readonly name="address" id="address" value="{{old('address')}}" placeholder="Your Address" type="text" class="form-control address">
                                            @error('address')
                                                   <strong class="text-danger">{{ $message }} </strong>
                                            @enderror
                                        </div>
                                    </div>
                                            
                                    <div class="form-group row d-flex align-items-center mb-5">
                                        <label class="col-lg-3 form-control-label">Sending SMS</label>
                                        <div class="col-lg-9">
                                            <textarea required name="send_sms" value="{{old('send_sms')}}" placeholder="Your Sending SMS" type="text" class="form-control" rows="6"></textarea>
                                            @error('send_sms')
                                                   <strong class="text-danger">{{ $message }} </strong>
                                            @enderror
                                        </div>
                                    </div>
        
                                    
        
                                    <div class="form-group row d-flex align-items-center mb-5">
                                        <label class="col-lg-3 form-control-label"></label>
                                        <div class="col-lg-9">
                                            <button id="add_save_btn" type="submit" class="btn btn-primary btn-square mr-1 mb-2">Send Message</button>
                                        </div>
                                    </div> 
    
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
        
       if ($("option:selected")) {
        $('#phone').attr('disabled', true);
        
       }

         var val = $(this).val();

        $.ajax({
        url: "/get-sup-info",
        type:"GET",
        data:{
          id:val,
         
        },
        success:function(data){
            $('.phone_number').val(data.mobile_number)
            $('.address').val(data.address)
          
        },
       });
    });



    $('#phone').on('change',function(){


        if ($("option:selected")) {
        $('#supplier_name').attr('disabled', true);
        
       }

        var val = $(this).val();

        $.ajax({
        url: "/get-phonebook-info",
        type:"GET",
        data:{
          id:val,
         
        },
        success:function(data){
            $('#phone_number').val(data.mobile_number)
            $('#address').val(data.address)
          
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



