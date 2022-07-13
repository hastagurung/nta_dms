@extends('master')
@section('content')
<div class="card card-custom">
	<div class="card-header">
		<h3 class="card-title">Create New User</h3>
	</div>
	<!--begin::Form-->
	<form class="form" id="kt_form" action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="card-body">
			<div class="form-group row">
				<label class="col-form-label text-right col-lg-3 col-sm-12">Name:*</label>
				<div class="col-lg-9 col-md-9 col-sm-12">
					<input name="name" type="text" class="form-control form-control-solid name" placeholder="Enter Name" required autocomplete="off" />
				</div>
			</div>
			<div class="form-group row">
				<label class="col-form-label text-right col-lg-3 col-sm-12">Assign Role:*</label>
				<div class="col-lg-9 col-md-9 col-sm-12">
					{{Form::select('role_id', $roles,null, ['class' => 'form-control form-control-solid role', 'autocomplete' => 'off','required'=>true])}}
				</div>
			</div>
			<div class="form-group row contractorDiv" style="display: none;">
				<label class="col-form-label text-right col-lg-3 col-sm-12">Registration ID:</label>
				<div class="col-lg-9 col-md-9 col-sm-12">
					<input name="registration_id" type="text" class="form-control form-control-solid" placeholder="Enter RegistrationID" autocomplete="off" />
				</div>
			</div>
			<div class="form-group row contractorDiv" style="display: none;">
				<label class="col-form-label text-right col-lg-3 col-sm-12">Address:</label>
				<div class="col-lg-9 col-md-9 col-sm-12">
					<input name="address" type="text" class="form-control form-control-solid" placeholder="Enter Address" autocomplete="off"/>
				</div>
			</div>
			<div class="form-group row contractorDiv" style="display: none;">
				<label class="col-form-label text-right col-lg-3 col-sm-12">Contact Number:</label>
				<div class="col-lg-9 col-md-9 col-sm-12">
					<input name="contact_no" type="text" class="form-control form-control-solid" placeholder="Enter Contact Number" autocomplete="off"/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-form-label text-right col-lg-3 col-sm-12">Username:*</label>
				<div class="col-lg-9 col-md-9 col-sm-12">
					<input name="username" type="text" class="form-control form-control-solid username" placeholder="Enter Username" required autocomplete="off"/>
					<span class="form-text text-muted unameMsg" style="display:none;color : red !important;">This username already exists. Choose another one.</span>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-form-label text-right col-lg-3 col-sm-12">Password:*</label>
				<div class="col-lg-9 col-md-9 col-sm-12">
					<input name="password" type="password" class="form-control form-control-solid password" placeholder="Enter Password" value="Password1234" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"/>
					<span class="form-text text-muted">Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters. Default Password is <span class="text-primary"><b>Password1234</b></span></span>
				</div>
			</div>
		</div>
		<div class="card-footer">
			<div class="row">
				<div class="col-lg-6">
					<button type="submit" class="btn btn-primary mr-2 submitBtn">Save</button>
					<a href="{{route('users.index')}}" class="btn btn-secondary">Cancel</a>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection
{{-- Scripts Section --}}
@section('scripts')
    <script type="text/javascript">
    	$(document).ready(function(){
    		$('.name').change(function(){
    			var name = $(this).val();
    			var username = name.substr(0,name.indexOf(' ')).toLowerCase();
    			$('.username').val(username);
    			$('.username').trigger('change');
    		});


		    $('.username').change(function(e){
	        	var username = $('.username').val();
	            $.ajax({
	                type : "POST",
	                data : {
	                    'username' : username,
	                    '_token' : "{{csrf_token()}}"
	                },
	                url : '{{route("check_username")}}',
	                success : function(response) {
	                    if (response) {
	                        $('.submitBtn').prop("disabled",false);
	                        $('.unameMsg').css("display","none");
	                    } else {
	                        $('.submitBtn').prop("disabled",true);
	                        $('.unameMsg').css("display","block");
	                    }
	                }
	            });
	        });

	        $('.role').change(function(e){
	        	if(['3','4'].includes($(this).val())) {
	        		$('.contractorDiv').css('display','flex');
	        	} else {
	        		$('.contractorDiv').css('display','none');
	        	}
	        })
    	});
    </script>
@endsection