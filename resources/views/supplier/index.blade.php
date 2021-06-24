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
				<h4 class="page-header-title">Supplier And Customer List</h4>
				<div class="widget-options">
					<a  href="{{route('create.supplier')}}" type="button" class="btn btn-primary btn-square mr-1 mb-2">Add Supplier</a>
				</div>
			</div>
			<div class="widget-body">
				<div class="table-responsive">
					<table style="color:#04243c;" id="thedatatable" class="p-l-0 p-r-0 table table-bordered table-hover">
						<thead>
							<tr>
								<th>Sl No:</th>
								<th>User ID:</th>
								<th>Supplier or Customer Name</th>
								<th>Account Number</th>
								<th>Type</th>
								<th>Address</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@php
								$sl = 1;
							@endphp
							@foreach ($supplier as $row)
							<tr>
								<td>{{$sl++}}</td>
								<td>{{$row->id}}</td>
								<td>{{$row->supplier_name}}</td>
								<td>{{$row->account_number}}</td>
								<td>{{$row->type}}</td>
								<td>{{$row->address}}</td>
								<td>
									@php
										$id = session()->get('id');
										$user = App\User::findorfail($id);

										$role = $user->role;
									@endphp
									@if($role == 'admin')
									  <a class="btn btn-info btn-xs" href="{{route('show.supplier', $row->id)}}">View</a><br>
									  <a class="btn btn-warning btn-xs" href="{{ route('edit.supplier', $row->id)}}">Edit</a><br>
									  <a class="btn btn-danger btn-xs" href="{{ route('delete.supplier', $row->id)}}">Delete</a> <br>
									  <a class="btn btn-primary btn-xs" href="{{ route('transaction.supplier', $row->id)}}">Transaction</a> <br>  
									@endif
								</td>
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

