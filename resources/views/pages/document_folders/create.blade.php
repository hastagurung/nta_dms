@extends('master')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<!--begin::Card-->
		<div class="card card-custom gutter-b example example-compact">
			<div class="card-header">
				<h3 class="card-title">Enter Document Folders Details</h3>
			</div>
			<!--begin::Form-->
			<form class="form" action="{{route('document_folders.store')}}" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
				<div class="card-body">
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Name:</label>
							<input name="name" type="text" class="form-control" placeholder="Enter Document Folder name" required autocomplete="off"/>
							<span class="form-text text-muted">Please enter Document Folder Name</span>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Description:</label>
							<textarea name="descriptions" type="text" class="form-control" placeholder="Enter Description" rows="4"></textarea>							
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