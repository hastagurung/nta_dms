@extends('master')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<!--begin::Card-->
		<div class="card card-custom gutter-b example example-compact">
			<div class="card-header">
				<h3 class="card-title">Update Fiscal Year Details</h3>
			</div>
			<!--begin::Form-->
			<form class="form" action="{{route('fiscal_years.update',$data->id)}}" method="post">
				{{csrf_field()}}
				<input type="hidden" name="_method" value="PUT">
				<div class="card-body">
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Name:</label>
							<input name="name" type="text" class="form-control" placeholder="Enter Fiscal Year" required value="{{$data->name}}"/>
							<span class="form-text text-muted">Please enter fiscal year</span>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Select Fiscal Year Date Range:</label>
							<div class="input-daterange input-group" id="kt_datepicker_5">
								<input type="text" class="form-control" name="start_date" placeholder="Start Date" required value="{{$data->start_date->format('m/d/Y')}}"/>
								<div class="input-group-append">
									<span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
								</div>
								<input type="text" class="form-control" name="end_date" placeholder="End Date" required value="{{$data->end_date->format('m/d/Y')}}"/>
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<div class="row">
						<div class="col-lg-6">
							<button type="submit" class="btn btn-primary mr-2">Save</button>
							<button type="reset" class="btn btn-secondary">Cancel</button>
						</div>
						<div class="col-lg-6 text-right">
							<button type="reset" class="btn btn-danger">Reset</button>
						</div>
					</div>
				</div>
			</form>
			<!--end::Form-->
		</div>
	</div>
</div>	
@endsection
<!-- @section('jsLibrary')
<script src="{{asset('assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js')}}"></script>
@endsection -->