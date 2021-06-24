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
				<h4 class="page-header-title">Member List</h4>
				<div class="widget-options">
					<a  href="{{route('create.member')}}" type="button" class="btn btn-primary btn-square mr-1 mb-2">Add Member</a>
				</div>
			</div>
			<div class="widget-body">
				<div class="table-responsive">
					<table style="color:#04243c;" id="thedatatable" class="p-l-0 p-r-0 table table-bordered table-hover">
						<thead>
							<tr>
								<th>Name</th>
								<th>Father Name</th>
								<th>Mobile Number</th>
								<th>NID No</th>
								<th>Account Number</th>
								<th>Address</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
                            @foreach ($all_member as $row)
                            <tr>
                                <td>{{$row->name}}</td>
                                <td>{{$row->fatherorhusband}}</td>
                                <td>{{$row->mobile_num}}</td>
                                <td>{{$row->nid_num}}</td>
                                <td>{{$row->account_number}}</td>
                                <td>{{$row->address}}</td>
                                <td>
									@php
										$id = session()->get('id');
										$user = App\User::findorfail($id);

										$role = $user->role;
									@endphp
									@if ($role == 'admin')
									<a class="btn btn-info btn-sm" href="{{route('show.member', $row->id)}}">View</a><br>
									
									<a class="btn btn-warning btn-sm" href="{{ route('edit.member', $row->id)}}">Edit</a><br>
									<a class="btn btn-danger btn-sm" href="{{ route('delete.member', $row->id)}}">Delete</a> 
										
									@endif 
									{{-- @endrole  --}}
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


