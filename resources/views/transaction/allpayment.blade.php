@extends('includes.header')
@section('pageTitle', 'User')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/datatables/datatables.min.css') }}">
@endpush

@section('content')
<div class="row flex-row">
	<div class="col-12">
		<!-- Form -->
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4 class="page-header-title">Payment List</h4>
				<div class="widget-options">
					<a  href="{{route('payment.transaction')}}" type="button" class="btn btn-primary btn-square mr-1 mb-2">Add Payment</a>
				</div>
			</div>
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4 class="page-header-title">Filter By Date</h4>
				<div class="widget-options">
					<form action="{{route('filterbydatepayment.transaction')}}" method="post">
                        @csrf
                        <div style="display: inline">
                            <label class=" text-primary h4" for="start">Start Date</label>
                            <input class="text-warning h4" id="start" value="{{old('start')}}" type="date" name="start">
                        </div>
                        <div style="display: inline">
                            <label class=" text-primary h4" for="end">End Date</label>
                            <input class=" text-warning h4" id="end" value="{{old('end')}}" type="date" name="end">
                        </div>
                        <div style="display: inline">
                            <button type="submit" id="submit" class="btn btn-danger">Show</button>
                        </div>
                    </form>
				</div>
			</div>
			<div class="widget-body">
				<div class="table-responsive">
					<table style="color:#04243c;" id="thedatatable" class="p-l-0 p-r-0 table table-bordered table-hover">
						<thead>
							<tr>
								<th>ID</th>
                                <th>Date</th>
								<th>Bank Information</th>
								<th>Customer Information</th>
                                <th>Debit</th>
                                <th>Credit</th>
                                <th>Notes</th>
							</tr>
						</thead>
						<tbody>
                            @php
                                $sl= 1;
                            @endphp
                            @foreach ($payment_all as $row)
                            <tr>
                                <td>{{$sl++}}</td>
                                <td>{{date('d-m-Y', strtotime($row->created_at))}}</td>

                                <td>
                                {{ optional($row->bank)->name }}
                                <br>
                                {{ optional($row->bank)->account_number }}
                                </td>

                                <td>
                                {{ optional($row->supplier)['supplier_name'] }}
                                <br>
                                {{ optional($row->supplier)['mobile_number'] }}
                                </td>

                                <td>{{$row->dr == null ? '' : $row->dr }}</td>

                                <td>{{$row->cr == null ? '' : $row->cr}}</td>
                                
                                </td>
                                <td>{{$row->notes}}</td>
                                {{-- <td>
                                      <a class="btn btn-info btn-sm" href="{{route('show.nomini', $row->id)}}">View</a><br>
                                      <a class="btn btn-warning btn-sm" href="{{ route('edit.nomini', $row->id)}}">Edit</a><br>
                                      <a class="btn btn-danger btn-sm" href="{{ route('delete.nomini', $row->id)}}">Delete</a> 
                                        <a class="btn btn-info btn-sm" href="{{ route('showpayment.transaction', $row->id)}}">Transaction</a><br>  
                                </td> --}}
                            </tr>  
                            @endforeach
						</tbody>
					</table>
				</div>

			</div>
		</div>
		<!-- End Form -->
	</div>
</div>



@include('commonhtml.deletemodal')

@endsection

@push('scripts')

<script src="{{ asset('assets/vendors/js/base/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

<script src="{{ asset('assets/vendors/js/datatables/datatables.min.js') }}"></script>

<script type="text/javascript">

$("#submit").click(function(){

      let start = $("input[name=start]").val();
      let end = $("input[name=end]").val();
      let _token   =  "_token": "{{ csrf_token() }}";
     

      $.ajax({
        url: "/ajax-payment-filter",
        type:"POST",
        data:{
          start:start,
          end:end,
          _token: _token
        },
        success:function(response){
          console.log(response);
          if(response) {
            $('.success').text(response.success);
            $("#ajaxform")[0].reset();
          }
        },
       });
  });

	var table = $('#thedatatable').DataTable({
		
	});



</script>
@endpush





