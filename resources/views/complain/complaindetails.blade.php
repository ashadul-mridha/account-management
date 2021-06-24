@extends('includes.header')
@section('pageTitle', 'Complain Details')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/datatables/datatables.min.css') }}">
@endpush

@section('content')
<div class="row flex-row">

	<div class="col-12">
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4 class="page-header-title">Complain Details</h4>
				<div class="widget-options">
					<!-- <a type="button" class="btn btn-info btn-square mr-1 mb-2">RESEARCH FORM</a> -->
					<!-- <a href="#add_data" type="button" class="btn btn-primary btn-square mr-1 mb-2">ASSIGNED TASKS</a> -->
				</div>
			</div>
			<div id="add_div" class="widget-body">
				<input  type="hidden" id="id_complain" name="id_complain" value="{{$data[0]->id}}" class="form-control">

				<form>
					<div class="form-group row">
						<div class="form-group col-md-6">
							<label for="invoicedate">District / Unit name</label>
							<input  readonly value="{{$data[0]->district}}" class="form-control">
						</div>
						<div class="form-group col-md-6">
							<label for="invoicedate">Year:</label>
							<input  readonly value="{{$data[0]->year}}" class="form-control">
						</div>
					</div>

					<div class="form-group row">
						<div class="form-group col-md-6">
							<label>Section no.</label>
							<input  readonly value="{{$data[0]->section_no}}" class="form-control">
						</div>
						<div class="form-group col-md-6">
							<label>Claimed amount</label>
							<input  readonly value="<?php echo number_format($data[0]->amount, 2); ?>" class="form-control">
						</div>
					</div>

					<div class="form-group row">
						<div class="form-group col-md-6">
							<label>Complain name</label>
							<input  readonly value="{{$data[0]->complain_name}}" class="form-control">
						</div>

						<div class="form-group col-md-6">
							<label>Complain details</label>
							<textarea style="overflow-y: scroll; height: 70px;" readonly class="form-control">{{$data[0]->details}}</textarea>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<div class="row flex-row">
	<div class="col-12">
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4 class="page-header-title">Opinions</h4>
			</div>
			<div class="widget-body">
				<ul class="nav nav-tabs nav-fill" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="just-tab-1" data-toggle="tab" href="#j-tab-1" role="tab" aria-controls="j-tab-1" aria-selected="true">Reply From District/Unit</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="just-tab-2" data-toggle="tab" href="#j-tab-2" role="tab" aria-controls="j-tab-2" aria-selected="false">Meeting Opinions</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="just-tab-3" data-toggle="tab" href="#j-tab-3" role="tab" aria-controls="j-tab-3" aria-selected="false">Meeting Date-Time</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="just-tab-4" data-toggle="tab" href="#j-tab-4" aria-controls="j-tab-4" aria-selected="false">Name & Sign of Involved Person</a>
					</li>
				</ul>


				<div class="tab-content pt-3">
					<div class="tab-pane fade show active" id="j-tab-1" role="tabpanel" aria-labelledby="just-tab-1">

						<div class="widget-options">
							<a href="#districtReplyModal" id="add_comment" type="button" class="btn btn-primary btn-square mr-1 mb-2">ADD</a>
						</div>

						<table style="color:#04243c;" id="pricingtable" class="p-l-0 p-r-0 table table-bordered table-hover">
							<thead>
								<tr>
									<th>File</th>
									<th>Chalan no.</th>
									<th>Date</th>
									<th>Amount</th>
									<th>Comment</th>
									<th>Added by</th>
								</tr>
							</thead>
							<tbody>
								@foreach($commentData as $data)
								<tr>
									<?php if($data->file == "" || is_null($data->file)){ ?>
										<td>N/A</td>
									<?php }else{ ?>
										<td><a href="{{ url('/uploads/opinion_files') }}/{{ $data->file }}" target="_blank"><i title="Download" data-id="6" class="editData ion-arrow-down-a p-10"></i></a></td>	
									<?php } ?>
									<td>{{ $data->chalan_no }}</td>
									<td><?php echo date("d-M-Y", strtotime($data->the_date)); ?></td>
									<td>{{ number_format($data->amount,2) }}</td>
									<td>{{ $data->comment }}</td>
									<td>{{ $data->created_by }}</td>

								</tr>
								@endforeach
							</tbody>
						</table>

					</div>


					<div class="tab-pane fade" id="j-tab-2" role="tabpanel" aria-labelledby="just-tab-2">
						<div class="widget-options">
							<a href="#districtReplyModal" id="add_comment" type="button" class="btn btn-primary btn-square mr-1 mb-2">ADD</a>
						</div>
					</div>
					<div class="tab-pane fade" id="j-tab-3" role="tabpanel" aria-labelledby="just-tab-3">
						<div class="widget-options">
							<a href="#districtReplyModal" id="add_comment" type="button" class="btn btn-primary btn-square mr-1 mb-2">ADD</a>
						</div>
					</div>
					<div class="tab-pane fade" id="j-tab-4" role="tabpanel" aria-labelledby="just-tab-4">
						<div class="widget-options">
							<a href="#districtReplyModal" id="add_comment" type="button" class="btn btn-primary btn-square mr-1 mb-2">ADD</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<div  id="districtReplyModal" style="margin-right: 200px;" class="modal fade" role="dialog">
	<div  class="modal-dialog">

		<!-- Modal content-->
		<div style="width:700px;" class="modal-content">
			<div class="modal-header">
				<h4 class="page-header-title">Add Reply</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">

				<form id="task_add_form" class="form-horizontal">
					{!! csrf_field() !!}
					<input type="hidden" name="id_complain_modal" id="id_complain_modal">
					<div class="form-group row d-flex align-items-center mb-3">
						<label class="col-lg-3 form-control-label">Chalan no.:</label>
						<div class="col-lg-9">
							<input required name="chalan_no" id="chalan_no" placeholder="Chalan no." type="text" class="form-control">
						</div>
					</div>


					<div class="form-group row d-flex align-items-center mb-3">
						<label class="col-lg-3 form-control-label">Date:</label>
						<div class="col-lg-9">
							<input required name="the_date" id="the_date" placeholder="Date" type="date" class="form-control">
						</div>
					</div>


					<div class="form-group row d-flex align-items-center mb-3">
						<label class="col-lg-3 form-control-label">Amount:</label>
						<div class="col-lg-9">
							<input required name="amount" id="amount" placeholder="Amount" type="number" min="1" class="form-control">
						</div>
					</div>


					<div class="form-group row d-flex align-items-center mb-3">
						<label class="col-lg-3 form-control-label">File:</label>
						<div class="col-lg-9">
							<input  name="file" id="file" placeholder="File" type="file" min="1" class="form-control">
						</div>
					</div>

					<div class="form-group row d-flex align-items-center mb-3">
						<label class="col-lg-3 form-control-label">Comment:</label>
						<div class="col-lg-9">
							<textarea class="form-control" id="comment" name="comment"></textarea>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button id="add_save_btn" type="submit" class="btn btn-primary">Save</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
<script src="{{ asset('assets/commonscript.js') }}"></script>
<script src="{{ asset('assets/js/jquery-ui.js') }}"></script>

<script type="text/javascript">

	$('#add_comment').click(function(event) {
		$('#districtReplyModal').modal('show');
		$('#id_complain_modal').val($('#id_complain').val());
	});


	$("#task_add_form").on('submit', function(event) {
		event.preventDefault();
		$("#add_save_btn").prop("disabled", true);

		var form_data = document.getElementById("task_add_form");
		var fd = new FormData(form_data);
		$.ajax({
			url: "{{ url('/addDistrictComment') }}",
			data: fd,
			cache: false,
			processData: false,
			contentType: false,
			type: 'POST',
			success: function(data) {
				$("#add_save_btn").prop("disabled", false);

				if(data.result == "success"){
					showNotification('success', data.message);
					setTimeout(function() {
						location.reload();
					}, 1500);
				}else if(data.result == "fail"){
					showNotification('error', data.message);
				}else if(data.result == "error"){
					$.each(data.message, function(index, val) {
						showNotification('error', data.message[index]);
					});
				}
			}
		});

	});




	function showNotification(type, message) {
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

</script>
@endpush


