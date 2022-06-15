@extends('master')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<!--begin::Card-->
		<div class="card card-custom gutter-b example example-compact">
			<div class="card-header">
				<h3 class="card-title">Update Document Folders Details</h3>
			</div>
			<!--begin::Form-->
			<form class="form" action="{{route('document_folders.update',$data->id)}}" method="POST">
				{{csrf_field()}}
				<input type="hidden" name="_method" value="PUT">
				<div class="card-body">
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Name:</label>
							<input name="name" type="text" class="form-control" placeholder="Enter Document Folder name" required value="{{$data->name}}"/>
							<span class="form-text text-muted">Please enter Document Folder Name</span>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Description:</label>
							<textarea name="descriptions" type="text" class="form-control" placeholder="Enter Description">
								{{$data->descriptions}}
							</textarea>							
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