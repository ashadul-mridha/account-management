@extends('includes.header')
@section('pageTitle', 'All Saving')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/datatables/datatables.min.css') }}">
@endpush

@section('content')
<div class="row flex-row">
	<div class="col-12">
		<!-- Form -->
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4 class="page-header-title">Saving List</h4>
				<div class="widget-options">
					<a  href="{{route('create.transaction')}}" type="button" class="btn btn-primary btn-square mr-1 mb-2">Add Transaction</a>
				</div>
			</div>
            
			<div class="widget-body">
				<div class="table-responsive">
					<table style="color:#04243c;" id="table_id" class="p-l-0 p-r-0 table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>Sl No:</th>
								<th>Member Name</th>
								<th>Busniess Information</th>
								<th>Account Information</th>
								<th>Amount</th>
							</tr>
						</thead>
						<tbody>
                            @php
                                $sl= 1;
                            @endphp
                            @foreach ($data as $row)
                            <tr>
                                <td>{{$sl++}}</td>
                                <td>{{$row->member->name}}</td>
                                <td>{{$row->bussniess_name}}
                                <br>
                                {{$row->trade}}
                                </td>
                                <td>{{$row->bankaccount->name}}
                                <br>
                                {{$row->bankaccount->account_number}}
                                </td>
                                <td>{{$row->amount}}</td>
                                {{-- <td>
                                      <a class="btn btn-info btn-sm" href="{{route('show.nomini', $row->id)}}">View</a><br>
                                      <a class="btn btn-warning btn-sm" href="{{ route('edit.nomini', $row->id)}}">Edit</a><br>
                                      <a class="btn btn-danger btn-sm" href="{{ route('delete.nomini', $row->id)}}">Delete</a>   
                                </td> --}}
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
<script src="{{ asset('assets/js/jquery.form.min.js') }}"></script>

<script src="{{ asset('assets/vendors/js/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/vendors/js/datatables/buttons.print.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready( function () {
    $('#table_id').DataTable();
    } );
</script>

@endpush



