@extends('master')

@section('content')
<div class="row">
	<div class="col-lg-12">
		<!--begin::Card-->
		<div class="card card-custom gutter-b example example-compact">
			<div class="card-header">
				<h3 class="card-title">Edit Documents Details</h3>
			</div>
			<!--begin::Form-->
			<form class="form" action="{{route('documents.update',$data->id)}}" method="POST" enctype="multipart/form-data">
				{{csrf_field()}}
			 	<input type="hidden" name="_method" value="PUT" enctype="multipart/form-data">
				<div class="card-body">
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Name:</label>
							<input name="name" type="text" class="form-control" placeholder="Enter name" value="{{$data->name}}" required/>
						</div>
						<div class="col-lg-6">
							<label>File Browser</label>
							<div></div>
							<div class="custom-file">
								<input name="file_path" type="name" value="{{$data->file_path}}"/>
								<input name="document_file" type="file" class="custom-file-input" id="customFile"/>
								<label class="custom-file-label" for="customFile">{{$data->file_path}}</label>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-6">
							<label>Document Folder:</label>
							{{Form::select('document_folder_id', $docFolder, $data->document_folder_id, ['class' =>  'form-control', 'autocomplete' => 'off','required'=>true])}}
						</div>
						<div class="col-lg-6">
							<label>Fiscal Year</label>
							{{Form::select('fiscal_year_id', $fiscalYear, $data->fiscal_year_id, ['class' =>  'form-control', 'autocomplete' => 'off','required'=>true])}}
						</div>
					</div>
					<div class="form-group row">
						<div class="col-lg-12">
							<label>Document Folder:</label>
							<label>Description:</label>
							<textarea name="description" type="text" class="form-control" placeholder="Enter Description" rows="4">{{$data->description}}</textarea>		
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