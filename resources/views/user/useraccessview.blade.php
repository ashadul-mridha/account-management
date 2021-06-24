@extends('includes.header')
@section('pageTitle', 'Role Access Control')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/datatables/datatables.min.css') }}">
@endpush

@section('content')
<div class="row flex-row">




	<div class="col-6">
		<!-- Form -->
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4 class="page-header-title">Assign Feature To Role</h4>
			</div>
			<div id="add_div" class="widget-body">
				<form id="assign_form" class="form-horizontal">
					{{ csrf_field() }}

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Select Module</label>
						<div class="col-lg-9">
							<select name="module" id="module" class="form-control">

							</select>
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Select Feature</label>
						<div class="col-lg-9">
							<select name="feature" id="feature" class="form-control">

							</select>
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Select Role</label>
						<div class="col-lg-9">
							<select name="id_role" id="id_role" class="form-control">

							</select>
						</div>
					</div>



					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label"></label>
						<div class="col-lg-9">
							<button id="assign_save_btn" type="submit" class="btn btn-primary btn-square mr-1 mb-2">SAVE</button>
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
				<h4 class="page-header-title">Role Wise Feature Access</h4>

			</div>
			<div class="widget-body">
				<div class="table-responsive">
					<table style="color:#04243c;" id="roleusertable" class="p-l-0 p-r-0 table table-bordered table-hover">
						<thead>
							<tr>
								<th>Actions</th>
								<th>Role</th>
								<th>Feature</th>
								<th>Module</th>
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


<div style="margin-top: 50px;" id="roleChangeModal" class="modal modal-top fade">
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
</div>
@include('commonhtml.deletemodal')
@endsection


@push('scripts')

<script src="{{ asset('assets/vendors/js/base/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.form.min.js') }}"></script>

<script src="{{ asset('assets/vendors/js/datatables/datatables.min.js') }}"></script>

<script type="text/javascript">

	$("#assign_form").on('submit', function(event) {
		event.preventDefault();
		$("#assign_save_btn").prop("disabled", true);

		var form_data = document.getElementById("assign_form");
		var fd = new FormData(form_data);
		$.ajax({
			url: "{{ url('/assignFeatureToRole') }}",
			data: fd,
			cache: false,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function(data) {
				if (data.result == "success") {
					$('#assign_form')[0].reset();
					assigntable.ajax.reload(null, false);
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
						text: data.message,
						progressBar: true,
						timeout: 2500,
						animation: {
							open: 'animated bounceInRight', 
							close: 'animated bounceOutRight' 
						}}).show()

				}
				$("#assign_save_btn").prop("disabled", false);
			}
		});

	});




	var assigntable = $('#roleusertable').DataTable({
		processing: true,
		serverSide: true,
		ajax: {
			url: "{{ url('/roleWiseFeatures') }}",
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
			data: 'role_name',
			name: 'role_name'
		},

		{
			data: 'action_name',
			name: 'action_name'
		},
		
		{
			data: 'module',
			name: 'module'
		}

		]
	});


	rolelistdata();			

	function rolelistdata() {
		$.get('{{ url("/rolelistdata")}} ', function(data) {
			var data = $.parseJSON(data);
			var html = "";
			$.each(data, function(index, val) {
				html+="<option value="+val.id+" >"+val.name+"</option>";
			});
			$("#id_role").html(html);
		});
	}


	var the_id = "";
	$(document).on('click', '.deleteData', function() { 
		the_id = $(this).attr("data-id");
		$("#deleteModal").modal('show');
	});  

	var the_id = "";

	$(document).on('click', '#deleteYes', function() { 
		$.post('{{ url("/deleteRoleFEature") }}', 
			{'id': the_id, 
			"_token": "{{ csrf_token() }}"}, 

			function(data, textStatus, xhr) {
				if(data.result == "success"){
					showMessage('success', data.message);
					$("#deleteModal").modal('hide');
					assigntable.ajax.reload();
				}else{
					showMessage('error', data.message);
				}
			});
	}); 


	
	$.get('{{ url("/getModules")}} ', function(data) {
		var data = $.parseJSON(data);
		var html = "";
		$.each(data, function(index, val) {
			html+="<option value="+val.id+" >"+val.module+"</option>";
			if(index == 0){
				getFeature(val.id);
			}
		});
		$("#module").html(html);
	});


	$("#module").change(function () {
		var module_id = this.value;
		getFeature(module_id);
	});


	function getFeature(idModule) {
		$.get('{{ url("/getFeature")}}/'+idModule, function(data) {
			var data = $.parseJSON(data);
			var html = "";
			$.each(data, function(index, val) {
				html+="<option value="+val.id+" >"+val.action+"</option>";
			});
			$("#feature").html(html);
		});
	}

</script>
@endpush


