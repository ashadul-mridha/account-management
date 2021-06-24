@extends('includes.header')
@section('pageTitle', 'Permission')

@section('content')
<div class="row flex-row">
	<div class="col-6">
		<!-- Form -->
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4 class="page-header-title">Create Permission</h4>
			</div>
			<div id="add_div" class="widget-body">
				<form  class="form-horizontal" action="{{ route('store.permission') }}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Permission name</label>
						<div class="col-lg-9">
							<input required name="name" placeholder="Permission Name" type="text" class="form-control">
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label"></label>
						<div class="col-lg-9">
							<button id="add_save_btn" type="submit" class="btn btn-primary btn-square mr-1 mb-2">SAVE PERMISSION</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- End Form -->
	</div>



	<div class="col-6">
		<!-- Form -->
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4 class="page-header-title">Assign Permission</h4>
			</div>
			<div id="add_div" class="widget-body">
				<form action="{{route('store.assign_permission')}}" method="POST" class="form-horizontal">
					{{ csrf_field() }}

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Select Permission</label>
						<div class="col-lg-9">
							<select name="permission_id" id="permission_id" class="form-control">
                                @foreach ($all_permission as $row)
                                    <option value="{{ $row->id}}">{{$row->name}}</option>    
                                @endforeach
							</select>
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Select Role</label>
						<div class="col-lg-9">
							<select name="role_id" id="role_id" class="form-control">
                                @foreach ($all_role as $row)
                                    <option value="{{ $row->id}}">{{$row->name}}</option>    
                                @endforeach
							</select>
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label"></label>
						<div class="col-lg-9">
							<button  type="submit" class="btn btn-primary btn-square mr-1 mb-2">SAVE</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- End Form -->
	</div>
</div>



<div class="row flex-row">
	<div class="col-6">
		<!-- Form -->
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4 class="page-header-title">Permission List</h4>
			</div>
			<div class="widget-body">
				<div class="table-responsive">
					<table style="color:#04243c;" id="thedatatable" class="p-l-0 p-r-0 table table-bordered table-hover">
						<thead>
							<tr>
								<th>Sl No:</th>
								<th>Name:</th>
							</tr>
						</thead>
						<tbody>
							@php
								$sl = 1;
							@endphp
							@foreach ($all_permission as $row)
							<tr>
								<td>{{$sl++}}</td>
								<td>{{$row->name}}</td>
							</tr>  
							@endforeach
							
						</tbody>
					</table>
				</div>

			</div>
		</div>
		<!-- End Form -->
	</div>



	<div class="col-6">
		<!-- Form -->
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4 class="page-header-title">Roles With Permission</h4>

			</div>
			<div class="widget-body">
				<div class="table-responsive">
					<table style="color:#04243c;" id="roleusertable" class="p-l-0 p-r-0 table table-bordered table-hover">
						<thead>
							<tr>
								<th>Actions</th>
								<th>Permission</th>
								<th>Roles</th>
							</tr>
						</thead>
						<tbody>

						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- End Form -->
	</div>


</div>

{{-- <div style="margin-top: 50px;" id="roleChangeModal" class="modal modal-top fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Change role</h4>
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">×</span>
					<span class="sr-only">close</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="changeRoleForm">
					{!! csrf_field() !!}
					<input type="hidden" name="changeRoleUserId" id="changeRoleUserId">
					<input id="nameOnChange" type="text" readonly class="form-control">
					<br>
					<select class="form-control" name="modal_role" id="modal_role">

					</select>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-shadow" data-dismiss="modal">Close</button>
					<button type="submit" id="changeYes" class="btn btn-primary">Save</button>
				</div>
			</form>
		</div>
	</div>
</div> --}}
@include('commonhtml.deletemodal')
@endsection


@push('scripts')

<script src="{{ asset('assets/vendors/js/base/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.form.min.js') }}"></script>

<script src="{{ asset('assets/vendors/js/datatables/datatables.min.js') }}"></script>

<script type="text/javascript">

	var table = $('#thedatatable').DataTable({
		
	});
</script>

	
@endpush


