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
				<h4 class="page-header-title">User List</h4>
				<div style="margin-right: 20px;" class="widget-options">
					
					<select class="form-control" id="id_cat">
						<option>Select category</option>
					</select>
				</div>
				<div  class="widget-options">
					
					<select class="form-control" id="id_subcat">
						<option>Select subcategory</option>
						
					</select>
				</div>
			</div>
			<div class="widget-body">
				<div class="table-responsive">
					<table style="color:#04243c;" id="thedatatable" class="p-l-0 p-r-0 table table-bordered table-hover">
						<thead>
							<tr>
								<th>Actions</th>
								<th>Image</th>
								<th>Name</th>
								<th>Email</th>
								<th>Mobile</th>
								<th>Designation</th>
								<th>Category</th>
								<th>Subcategory</th>
								<th>Unit</th>
								<th>District</th>
								<th>Branch</th>
							</tr>
						</thead>
						<tbody>
							<!-- dynamic table will be load here -->

						</tbody>
					</table>
				</div>

			</div>
		</div>
		<!-- End Form -->
	</div>
</div>


<div style="display: none;" id="add_data" class="row flex-row">
	<div class="col-12">
		<!-- Form -->
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4 class="page-header-title">Add User</h4>

				<div style="display: none;" class="widget-options">
					<button type="button" data-toggle="collapse" data-target="#add_div" aria-haspopup="true" aria-expanded="true" class="dropdown-toggle">
						<i class="la la-ellipsis-h"></i>
					</button>
				</div>

			</div>
			<div id="add_div" class="widget-body">
				<form id="add_form" class="form-horizontal">
					{{ csrf_field() }}

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Name*</label>
						<div class="col-lg-9">
							<input required name="name" placeholder="Name" type="text" class="form-control">
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Mobile no.*</label>
						<div class="col-lg-9">
							<input required name="mobile" placeholder="Mobile no." type="number" class="form-control">
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Email*</label>
						<div class="col-lg-9">
							<input required name="email" placeholder="Email" type="email" class="form-control">
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Unit name</label>
						<div class="col-lg-9">
							<input name="unit" placeholder="Unit name" type="unit" class="form-control">
						</div>
					</div>


					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">District*</label>
						<div class="col-lg-9">
							<select name="district" id="district" class="form-control">
								
							</select>
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Branch name</label>
						<div class="col-lg-9">
							<input name="branch" placeholder="Branch name" type="branch" class="form-control">
						</div>
					</div>


					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Password*</label>
						<div class="col-lg-9">
							<input required name="password" placeholder="Set password for this client" type="password" class="form-control">
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Image</label>
						<div class="col-lg-9">
							<input name="uploadimage" placeholder="Choose use image" type="file" class="form-control">
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Remark</label>
						<div class="col-lg-9">
							<textarea class="form-control" name="remark">

							</textarea>
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
	</div>
</div>
@include('commonhtml.deletemodal')

@endsection

@push('scripts')

<script src="{{ asset('assets/vendors/js/base/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

<script src="{{ asset('assets/vendors/js/datatables/datatables.min.js') }}"></script>

<script type="text/javascript">
	$("#add_form").on('submit', function(event) {
		event.preventDefault();
		$("#add_save_btn").prop("disabled", true);

		var form_data = document.getElementById("add_form");
		var fd = new FormData(form_data);
		$.ajax({
			url: "{{ url('/adduser') }}",
			data: fd,
			cache: false,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function(data) {
				if (data.result == "success") {
					$('#add_form')[0].reset();
					table.ajax.reload(null, false);
					new Noty({
						type: 'success',
						layout: 'bottomRight',
						text: 'Data saved successfully',
						progressBar: true,
						timeout: 2500,
						animation: {
							open: 'animated bounceInRight', 
							close: 'animated bounceOutRight' 
						}}).show()
				} else if (data.result == "fail") {
					new Noty({
						type: 'error',
						layout: 'bottomRight',
						text: 'Something went worng',
						progressBar: true,
						timeout: 2500,
						animation: {
							open: 'animated bounceInRight', 
							close: 'animated bounceOutRight' 
						}}).show()

				} else if (data.result == "error") {
					$.each(data.message, function(index, val) {

						new Noty({
							type: 'error',
							layout: 'bottomRight',
							text: data.message[index],
							progressBar: true,
							timeout: 2500,
							animation: {
								open: 'animated bounceInRight', 
								close: 'animated bounceOutRight' 
							}}).show()

					});

				}
				$("#add_save_btn").prop("disabled", false);
			}
		});

	});



	var table = $('#thedatatable').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: "{{ url('/userlist') }}",
			type: 'GET',
		},
		"order": [
		[1, 'asc']
		],
		columns: [{
			data: 'action',
			name: 'action',
			orderable: false,
			searchable: false
		},
		{
			data: 'image',
			name: 'image'
		},
		{
			data: 'name',
			name: 'name'
		},
		{
			data: 'email',
			name: 'email'
		},
		{
			data: 'mobile',
			name: 'mobile'
		},
		{
			data: 'designation',
			name: 'designation'
		},
		{
			data: 'category',
			name: 'category'
		},
		{
			data: 'subcategory',
			name: 'subcategory'
		},
		{
			data: 'unit',
			name: 'unit'
		},
		{
			data: 'district',
			name: 'district'
		},
		{
			data: 'branch',
			name: 'branch'
		}

		]
	});

	var the_id = "";
	$(document).on('click', '.deleteData', function() { 
		the_id = $(this).attr("data-id");
		$("#deleteModal").modal('show');
	});  


	$(document).on('click', '.editData', function() { 
		var the_id = $(this).attr("data-id");
		window.open('{{ url("/editUser") }}/'+the_id, '_blank')
		
	});  


	$(document).on('click', '#deleteYes', function() { 
		$.post('{{ url("/deleteuser") }}', 
			{'id': the_id, 
			"_token": "{{ csrf_token() }}"}, 

			function(data, textStatus, xhr) {
				if(data.result == "success"){
					showMessage('success', data.message);
					$("#deleteModal").modal('hide');
					table.ajax.reload();
				}else{
					showMessage('error', data.message);
				}
			});
	});

	function showMessage(type, message) {
		new Noty({
			type: type,
			layout: 'bottomRight',
			text: message,
			progressBar: true,
			timeout: 2500,
			animation: {
				open: 'animated bounceInRight', 
				close: 'animated bounceOutRight' 
			}}).show()
	}


	$.get('{{ url("/districts") }}', function(data) {
		var data = $.parseJSON(data);
		var dd_html = '';
		$.each(data, function(index, val) {
			dd_html+="<option value="+val.id+">"+val.name+"</option>";
		});
		$("#district").html(dd_html);
	});






</script>
@endpush



