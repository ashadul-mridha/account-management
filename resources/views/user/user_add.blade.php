@extends('includes.header')
@section('pageTitle', 'User Add')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/datatables/datatables.min.css') }}">
@endpush

@section('content')



<div id="add_data" class="row flex-row">
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
				<form id="add_form" method="POST" action="{{ route('store.user')}}" enctype="multipart/form-data" class="form-horizontal">
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
						<label class="col-lg-3 form-control-label">Select Role*</label>
						<div class="col-lg-9">
							<select name="role" id="role" class="form-control">
								<option value="user">User</option>
								<option value="admin">Admin</option>
							</select>
						</div>
					</div>

{{-- 
					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Designation*</label>
						<div class="col-lg-9">
							<input required name="designation" placeholder="Designation" type="designation" class="form-control">
						</div>
					</div>


					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Category*</label>
						<div class="col-lg-9">
							<select name="id_cat" id="id_cat" class="form-control">
								
							</select>
						</div>
					</div>



					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Subcategory*</label>
						<div class="col-lg-9">
							<select name="id_subcat" id="id_subcat" class="form-control">
								
							</select>
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
					</div> --}}


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
	// $("#add_form").on('submit', function(event) {
	// 	event.preventDefault();
	// 	$("#add_save_btn").prop("disabled", true);

	// 	var form_data = document.getElementById("add_form");
	// 	var fd = new FormData(form_data);
	// 	$.ajax({
	// 		url: "{{ url('/adduser') }}",
	// 		data: fd,
	// 		cache: false,
	// 		processData: false,
	// 		contentType: false,
	// 		type: 'POST',
	// 		success: function(data) {
	// 			if (data.result == "success") {
	// 				$('#add_form')[0].reset();
	// 				new Noty({
	// 					type: 'success',
	// 					layout: 'bottomRight',
	// 					text: 'Data saved successfully',
	// 					progressBar: true,
	// 					timeout: 2500,
	// 					animation: {
	// 						open: 'animated bounceInRight', 
	// 						close: 'animated bounceOutRight' 
	// 					}}).show()
	// 			} else if (data.result == "fail") {
	// 				new Noty({
	// 					type: 'error',
	// 					layout: 'bottomRight',
	// 					text: 'Something went worng',
	// 					progressBar: true,
	// 					timeout: 2500,
	// 					animation: {
	// 						open: 'animated bounceInRight', 
	// 						close: 'animated bounceOutRight' 
	// 					}}).show()

	// 			} else if (data.result == "error") {
	// 				$.each(data.message, function(index, val) {

	// 					new Noty({
	// 						type: 'error',
	// 						layout: 'bottomRight',
	// 						text: data.message[index],
	// 						progressBar: true,
	// 						timeout: 2500,
	// 						animation: {
	// 							open: 'animated bounceInRight', 
	// 							close: 'animated bounceOutRight' 
	// 						}}).show()

	// 				});

	// 			}
	// 			$("#add_save_btn").prop("disabled", false);
	// 		}
	// 	});

	// });





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



	catList();			
	function catList() {
		$.get('{{ url("/catList")}} ', function(data) {
			var data = $.parseJSON(data);
			var html = "";
			$.each(data, function(index, val) {
				html+="<option value="+val.id+" >"+val.category+"</option>";
				if(index == 0){
					subCatList(val.id);
				}
			});
			$("#id_cat").append(html);
		});
	}

	$("#id_cat").change(function () {
		var id_cat = this.value;
		subCatList(id_cat);
	});

	function subCatList(id_cat) {
		$.get('{{ url("/subCatList")}}/'+id_cat, function(data) {
			var data = $.parseJSON(data);
			var html = "";
			$.each(data, function(index, val) {
				html+="<option value="+val.id+" >"+val.subcategory+"</option>";
			});
			$("#id_subcat").html(html);
		});
	}


</script>
@endpush



