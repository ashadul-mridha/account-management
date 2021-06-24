@extends('includes.header')
@section('pageTitle', 'Edit User')

@push('styles')
@endpush

@section('content')


<div id="add_data" class="row flex-row">
	<div class="col-12">
		<!-- Form -->
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4 class="page-header-title">Edit User</h4>

			</div>
			<div id="add_div" class="widget-body">
				<form id="add_form" class="form-horizontal">
					{{ csrf_field() }}
					<input type="hidden" id="u_id_update" name="u_id_update">
					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Name</label>
						<div class="col-lg-9">
							<input value="{{ $data[0]->name }}" required name="name" placeholder="Name" type="text" class="form-control">
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Mobile No.</label>
						<div class="col-lg-9">
							<input value="{{ $data[0]->mobile }}" required name="mobile" placeholder="Mobile no." type="number" class="form-control">
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Email</label>
						<div class="col-lg-9">
							<input value="{{ $data[0]->email }}" required name="email" placeholder="Email" type="email" class="form-control">
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
							<textarea class="form-control" name="remark">{{ $data[0]->remark }}</textarea>
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


<script type="text/javascript">

	jQuery(document).ready(function($) {
		var user_id = window.location.pathname.split("/").pop();
		$('#u_id_update').val(user_id);	
	});
	


	$("#add_form").on('submit', function(event) {
		event.preventDefault();
		$("#add_save_btn").prop("disabled", true);

		var form_data = document.getElementById("add_form");
		var fd = new FormData(form_data);
		$.ajax({
			url: "{{ url('/updateuser') }}",
			data: fd,
			cache: false,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function(data) {
				if (data.result == "success") {
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




</script>
@endpush



