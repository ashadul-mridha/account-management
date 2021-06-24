@extends('includes.header')
@section('pageTitle', 'PhoneBook')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/datatables/datatables.min.css') }}">
@endpush

@section('content')
<div class="row flex-row">
	<div class="col-12">
		<!-- Form -->
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4 class="page-header-title">All Message List</h4>
				<div class="widget-options">
					<a  href="{{route('create.allmessage')}}" type="button" class="btn btn-primary btn-square mr-1 mb-2">Send Message</a>
				</div>
			</div>
			<div class="widget-body">
				<div class="table-responsive">
					<table style="color:#04243c;" id="thedatatable" class="p-l-0 p-r-0 table table-bordered table-hover">
						<thead>
							<tr>
								<th>Sl No:</th>
								<th>Phone Number</th>
								<th>Sending Message</th>
							</tr>
						</thead>
						<tbody>
							@php
								$sl = 1;
							@endphp
							@foreach ($data as $row)
							<tr>
								<td>{{$sl++}}</td>
								<td>{{$row->mobile_num}}</td>
								<td>{{$row->sms}}</td>
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

	var table = $('#thedatatable').DataTable({
		
	});
</script>
@endpush

