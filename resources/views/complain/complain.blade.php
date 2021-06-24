@extends('includes.header')
@section('pageTitle', 'Add complain')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/datatables/datatables.min.css') }}">
@endpush

@section('content')



<div id="add_client" class="row flex-row">
	<div class="col-12">
		<!-- Form -->
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4 class="page-header-title">Add Audit Complain</h4>

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
						<label class="col-lg-3 form-control-label">District / Unit</label>
						<div class="col-lg-9">
							<input required name="district" placeholder="District / Unit" type="text" class="form-control">
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Complain name</label>
						<div class="col-lg-9">
							<input required name="complain_name" placeholder="Complain name" type="text" class="form-control">
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Year</label>
						<div class="col-lg-9">
							<select class="form-control" name="year" id="year">
								
							</select>
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Section no.</label>
						<div class="col-lg-9">
							<input required name="section_no" placeholder="Section no." type="text" class="form-control">
						</div>
					</div>

					
					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Claimed amount</label>
						<div class="col-lg-9">
							<input min="1" required name="amount" placeholder="Claimed amount" type="number" class="form-control">
						</div>
					</div>

					
					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Complain details</label>
						<div class="col-lg-9">
							<textarea required class="form-control" name="details" placeholder="Complain details"></textarea>
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Attachment</label>
						<div class="col-lg-9">
							<input name="uploadimage" placeholder="Choose a file" type="file" class="form-control">
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Select user category</label>
						<div class="col-lg-9">
							<select class="form-control" name="id_cat" id="id_cat">
								
							</select>
						</div>
					</div>


					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Select user subcategory</label>
						<div class="col-lg-9">
							<select class="form-control" name="id_subcat" id="id_subcat">
								
							</select>
						</div>
					</div>



					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-lg-3 form-control-label">Select user to assign</label>
						<div class="col-lg-9">
							<select class="form-control" name="id_user" id="id_user">
								
							</select>
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
</div>
@include('commonhtml.deletemodal')
@endsection

@push('scripts')
<script src="{{ asset('assets/vendors/js/base/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.form.min.js') }}"></script>

<script src="{{ asset('assets/vendors/js/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/buttons.print.min.js') }}"></script>

<script type="text/javascript">

	var the_id = "";

	var currentYear = new Date().getFullYear();
	var cYearHtml = "";
	for(var year = currentYear-3; year <= currentYear; year++){
		cYearHtml+="<option value="+year+">"+year+"</option>";
	}
	$("#year").html(cYearHtml);



	$("#add_form").on('submit', function(event) {
		event.preventDefault();
		$("#add_save_btn").prop("disabled", true);

		var form_data = document.getElementById("add_form");
		var fd = new FormData(form_data);
		$.ajax({
			url: "{{ url('/addComplain') }}",
			data: fd,
			cache: false,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function(data) {
				if (data.result == "success") {
					$('#add_form')[0].reset();
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


	catList();			
	function catList() {
		$.get('{{ url("/catList")}} ', function(data) {
			var data = $.parseJSON(data);
			var html = "";
			$.each(data, function(index, val) {
				html+="<option value="+val.id+" >"+val.category+"</option>";
				if(index == 0){
					subCatList(val.id);
					usersByCatSubcat(id_cat, null);
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
				if(index == 0){
					usersByCatSubcat(id_cat, val.id);
				}
			});
			$("#id_subcat").html(html);
		});
	}

	$("#id_subcat").change(function () {
		var id_subcat = this.value;
		usersByCatSubcat($('#id_cat').val(), id_subcat);
	});

	function usersByCatSubcat(id_cat = null, id_subcat = null) {
		$.get('{{ url("/usersByCatSubcat")}}/'+id_cat+'/'+id_subcat, function(data) {
			var data = $.parseJSON(data);
			var html = "";
			$.each(data, function(index, val) {
				html+="<option value="+val.id+" >"+val.name+' - '+val.designation+' - '+val.mobile+"</option>";
			});
			$("#id_user").html(html);
		});
	}

</script>
@endpush



