@extends('includes.header')
@section('pageTitle', 'My profile')


@section('content')

<div class="row flex-row">
	<div class="col-6">
		<!-- Form -->
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4 class="page-header-title">Personal Info</h4>

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
						<label class="col-lg-3 form-control-label">Name</label>
						<div class="col-lg-9">
							<input value="{{$data->name}}" required name="name" placeholder="Name" type="text" class="form-control">
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Mobile no.</label>
						<div class="col-lg-9">
							<input value="{{$data->mobile}}" required name="mobile" placeholder="Mobile no." type="number" class="form-control">
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
		<!-- End Form -->
	</div>



	<div class="col-6">
		<!-- Form -->
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4 class="page-header-title">Change Password</h4>

				<div style="display: none;" class="widget-options">
					<button type="button" data-toggle="collapse" data-target="#add_div" aria-haspopup="true" aria-expanded="true" class="dropdown-toggle">
						<i class="la la-ellipsis-h"></i>
					</button>
				</div>

			</div>
			<div id="add_div" class="widget-body">
				<form id="pass_form" class="form-horizontal">
					{{ csrf_field() }}

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Old password</label>
						<div class="col-lg-9">
							<input required name="oldpass" placeholder="Old password" type="password" class="form-control">
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">New password</label>
						<div class="col-lg-9">
							<input required name="pass" placeholder="New password" type="password" class="form-control">
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Re-type new password</label>
						<div class="col-lg-9">
							<input required name="re_pass" placeholder="Re-type new password" type="password" class="form-control">
						</div>
					</div>


					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label"></label>
						<div class="col-lg-9">
							<button id="pass_save_btn" type="submit" class="btn btn-primary btn-square mr-1 mb-2">SAVE</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- End Form -->
	</div>
</div>
@endsection



@push('scripts')
<script src="{{ asset('assets/vendors/js/base/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.form.min.js') }}"></script>
<script type="text/javascript">


	$("#add_form").on('submit', function(event) {
		event.preventDefault();
		$("#add_save_btn").prop("disabled", true);

		var form_data = document.getElementById("add_form");
		var fd = new FormData(form_data);
		$.ajax({
			url: "{{ url('/updatemyprofile') }}",
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
						text: 'Data updated successfully',
						progressBar: true,
						timeout: 2500,
						animation: {
							open: 'animated bounceInRight', 
							close: 'animated bounceOutRight' 
						}}).show()

					setTimeout(function() {
						location.reload();
					}, 1000);

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







	$("#pass_form").on('submit', function(event) {
		event.preventDefault();
		$("#pass_save_btn").prop("disabled", true);

		var form_data = document.getElementById("pass_form");
		var fd = new FormData(form_data);
		$.ajax({
			url: "{{ url('/changepass') }}",
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
						text: data.message,
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
				$("#pass_save_btn").prop("disabled", false);
			}
		});

	});

</script>
@endpush



