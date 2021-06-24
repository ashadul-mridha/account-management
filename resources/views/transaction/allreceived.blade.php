@extends('includes.header')
@section('pageTitle', 'User')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/datatables/datatables.min.css') }}">
@endpush

@section('content')
<div class="row flex-row">
	<div class="col-12">
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4 class="page-header-title">Received</h4>
				<div class="widget-options">
					<a  href="{{route('received.transaction')}}" type="button" class="btn btn-primary btn-square mr-1 mb-2">Add Received</a>
				</div>
			</div>
			<div>
				<div class="widget-header bordered no-actions d-flex align-items-center">
					<h4 class="page-header-title">Filter By Date</h4>
					<div class="widget-options">
						<form action="{{route('filterbydatereceived.transaction')}}" method="post">
							@csrf
							<div style="display: inline">
								<label class=" text-primary h4" for="start">Start Date</label>
								<input class="text-warning h4" type="date" name="start">
							</div>
							<div style="display: inline">
								<label class=" text-primary h4" for="end">End Date</label>
								<input class=" text-warning h4" type="date" name="end">
							</div>
							<div style="display: inline">
								<button type="submit" class="btn btn-danger">Show</button>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="widget-body">
				<div class="table-responsive">
					<table style="color:#04243c;" id="thedatatable" class="p-l-0 p-r-0 table table-bordered table-hover table-striped">
						<thead>
                            <tr>
								<th>Sl No:</th>
								<th>Date</th>
								<th>Transaction Id</th>
								<th>Note</th>
								<th>Ammount</th>
								<th>Debit</th>
								<th>Credit</th>
							</tr>
						</thead>
						<tbody>
                            @php
                                $sl = 1;
                                $tran_id = mt_rand( 1000000000, 9999999999 );
                            @endphp
                            @foreach ($recived_all as $row)
                            <tr>
                                <td>{{$sl++}}</td>
                                <td>{{date('d-m-Y', strtotime($row->created_at))}}</td>
                                <td>{{$tran_id++}}</td>
                                <td>{{$row->notes}}</td>
                                <td>{{$row->amount}}</td>
                                <td>{{$row->dr == null ? ' ' : $row->dr}}</td>
                                <td>{{$row->cr == null ? ' ' : $row->cr}}</td>
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