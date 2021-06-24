@extends('includes.header')
@section('pageTitle', 'Add complain')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/datatables/datatables.min.css') }}">
@endpush

@section('content')
<div class="row flex-row">
	<div class="col-12">
		<!-- Form -->
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4 class="page-header-title">Solved Complains</h4>
				<div class="widget-options">
					<a style="display: none;" href="#add_client" type="button" class="btn btn-primary btn-square mr-1 mb-2">ADD COMPLAIN</a>
				</div>
			</div>
			<div class="widget-body">
				<div class="table-responsive">
					<table style="color:#04243c;" id="thedatatable" class="p-l-0 p-r-0 table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>Actions</th>
								<th>Status</th>
								<th>Name</th>
								<th>Year</th>
								<th>Amount</th>
								<th>Section no</th>
								<th>District</th>
								<th>Added by</th>
								<th>Added at</th>
								<th>Details</th>
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

	var table = $('#thedatatable').DataTable({
		dom: 'Bfrtlip',
		buttons: [
		'copyHtml5',
		'excelHtml5',
		'csvHtml5',
		'pdfHtml5'
		],
		processing: true,
		serverSide: true,
		ajax: {
			url: "{{ url('/complainlist') }}/Solved",
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
			data: 'status'
		},
		{
			data: 'complain_name'
		},
		{
			data: 'year'
		},
		{
			data: 'amount'
		},
		{
			data: 'section_no'
		},
		{
			data: 'district'
		},
		{
			data: 'added_by'
		},
		{
			data: 'added_at'
		},
		{
			data: 'details'
		}

		]
	});


	var the_id = "";
	$(document).on('click', '.deleteData', function() { 
		the_id = $(this).attr("data-id");
		$("#deleteModal").modal('show');
	});  


	$(document).on('click', '.editData', function() { 
		the_id = $(this).attr("data-id");
		window.open('{{ url("/editclient") }}/'+the_id, '_blank')
	});  

	$(document).on('click', '.detailsData', function() { 
		the_id = $(this).attr("data-id");
		window.open('{{ url("/complain-details") }}/'+the_id, '_blank')
	});  


	$(document).on('click', '#deleteYes', function() { 
		$.post('{{ url("/deleteclient") }}', 
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




</script>
@endpush



