@extends('master')
@section('styles')
<link href="{{asset('plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection

{{-- Content --}}
@section('content')	
<div class="card card-custom">
	<div class="card-header flex-wrap border-0 pt-6 pb-0">
		<div class="card-title">
			<h3 class="card-label">Users Log
			<span class="d-block text-muted pt-2 font-size-sm">List Of User Log</span></h3>
		</div>
	</div>
	<div class="card-body">
		<!--begin: Search Form-->
		<!--begin::Search Form-->
		<table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
			<thead>
				<tr>
					<th style="width: 10px !important;">No</th>
				 	<th>Name</th>
					<th>Username</th>
					<th>Role</th>
					<th>Activity</th>
					<th>Description</th>
					<th>Date/Time</th>			
				</tr>
			</thead>
			<tbody>

				@foreach($logs as $key=>$activityLog)
				<tr>
					<td>{{$key+1}}</td>
					<td>{{$activityLog->user->name}}</td>
					<td>{{$activityLog->user->username}}</td>
					<td>{{$activityLog->user->role->name}}</td>
					<td>{{$activityLog->activity}}</td>
					<td>{{$activityLog->description}}</td>
					<th>{{$activityLog->created_at}}</th>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
		
@endsection
@section('scripts')
<script src="{{asset('plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <!-- <script src="{{asset('js/pages/crud/ktdatatable/base/html-table.js')}}" type="text/javascript"></script> -->
   <!--  <script src="{{ asset('js/pages/crud/datatables/extensions/buttons.js') }}" type="text/javascript"></script> -->
    <script type="text/javascript">
	   	var table = $('#kt_datatable1').DataTable({
	      responsive: true,
	      // Pagination settings
	      dom: "<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>\n\t\t\t<'row'<'col-sm-12'tr>>\n\t\t\t<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>",
	      buttons: ['print',  'excelHtml5', 'csvHtml5'],
	    });
    $('#export_print').on('click', function (e) {
      e.preventDefault();
      table.button(0).trigger();
    });
    $('#export_copy').on('click', function (e) {
      e.preventDefault();
      table.button(1).trigger();
    });
    $('#export_excel').on('click', function (e) {
      e.preventDefault();
      table.button(2).trigger();
    });
    $('#export_csv').on('click', function (e) {
      e.preventDefault();
      table.button(3).trigger();
    });
    $('#export_pdf').on('click', function (e) {
      e.preventDefault();
      table.button(4).trigger();
    });
    	
    </script>
@endsection