@extends('master')

@section('content')
<div class="card card-custom gutter-b">
    <div class="card-header flex-wrap border-0 pt-6 pb-0">
        <div class="card-title">
            <h3 class="card-label">{{$docFolder->name}}
            <span class="d-block text-muted pt-2 font-size-sm">List of Documents</span></h3>
        </div>
        <div class="card-toolbar">
            <a href="{{route('documents.create',['docId'=>$docId])}}" class="btn btn-primary font-weight-bolder">
            <span class="svg-icon svg-icon-md">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24" />
                        <circle fill="#000000" cx="9" cy="15" r="6" />
                        <path d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z" fill="#000000" opacity="0.3" />
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>New Record</a>
            <!--end::Button-->
        </div>
    </div>
    <div class="card-body">
        <div class="mb-7">
			<div class="row align-items-center">
				<div class="col-lg-9 col-xl-8">
					<div class="row align-items-center">
						<div class="col-md-4 my-2 my-md-0">
							<div class="input-icon">
								<input type="text" class="form-control" placeholder="Search Document..." id="kt_datatable_search_query" />
								<span>
									<i class="flaticon2-search-1 text-muted"></i>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <table class="datatable datatable-bordered datatable-head-custom" id="kt_datatable">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>Fiscal Year</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($documents as $key=>$document)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$document->name}}</td>
                    <td>{{$document->fiscalYear->name}}</td>
                    <td>
                        <a href="{{asset('storage/documents/'.$document->docFolder->folder.'/'.$document->file_path)}}" class="btn btn-info btn-sm mr-2" target="_blank"><i class="fa fa-file-alt icon-sm"></i>View Document</a>
                        <a href="{{route('documents.edit',$document->id)}}" class="btn btn-success btn-sm mr-2"><i class="fa fa-pen-alt icon-sm"></i>Edit</a>
                        <a href="{{route('documents.delete',$document->id)}}" class="btn btn-danger btn-sm mr-2" onclick="return confirm('Are you sure want to delete this document?')"><i class="fa fa-trash-alt icon-sm"></i>Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!--end: Datatable-->
    </div>
</div>
@endsection
@section('scripts')
<script>
    var datatable = $('#kt_datatable').KTDatatable({
	      data: {
	        saveState: {
	          cookie: false
	        }
	      },
          layout: {
        class: 'datatable-bordered datatable-head-custom',
      },
       		columns: [
       		{
	    		field : "SN",
                width : 40
	  		},
	  		{
	    		field : "Name",
	  		},
	  		{
	    		field : "Actions"
	  		},
	  		],
	      search: {
	        input: $('#kt_datatable_search_query'),
	        key: 'generalSearch'
	      }
	    });
</script>
@endsection