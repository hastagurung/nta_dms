{{-- Extends layout --}}
@extends('layout.default')

{{-- Content --}}
@section('content')
<div class="card card-custom">
	<div class="card-header">
		<h3 class="card-title">Change Password</h3>
	</div>
	<!--begin::Form-->
	<form class="form" id="kt_form" action="{{route('update-profile')}}" method="post" enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="card-body">
			<!-- <div class="form-group row">
				<label class="col-form-label text-right col-lg-3 col-sm-12">Name</label>
				<div class="col-lg-9 col-md-9 col-sm-12">
					<input name="name" type="text" class="form-control form-control-solid name" placeholder="Enter Name" required value="{{$data->name}}"/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-form-label text-right col-lg-3 col-sm-12">E-mail</label>
				<div class="col-lg-9 col-md-9 col-sm-12">
					<input name="email" type="email" class="form-control form-control-solid" placeholder="Enter Email Address" required value="{{$data->email}}"/>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-form-label text-right col-lg-3 col-sm-12">Username</label>
				<div class="col-lg-9 col-md-9 col-sm-12">
					<input name="username" type="text" class="form-control form-control-solid username" placeholder="Enter Username" required value="{{$data->username}}"/>
				</div>
			</div> -->
			 <div class="form-group row">
                <label class="col-form-label text-right col-lg-3 col-sm-12">Old Password:*</label>
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <input class="form-control opass form-control-solid" type="password" name="old_password" placeholder="Old Password" required>
                    <span class="form-text text-muted opassMsg" style="display:none;color : red !important;">
                        Your old password is incorrect.
                    </span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label text-right col-lg-3 col-sm-12">New Password:*</label>
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <input class="form-control pass form-control-solid" type="password" name="new_password" placeholder="New Password" required> 
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label text-right col-lg-3 col-sm-12">Confirm New Password:*</label>
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <input type="password" class="form-control cpass form-control-solid" name="new_c_password" placeholder="Confirm New Password" required>
                    <span class="form-text text-muted passMsg" style="display:none;color : red !important;">
                        Your password and confirm password does not match.
                    </span>
                </div>
            </div>
		</div>
		<div class="card-footer">
			<div class="row">
				<div class="col-lg-6">
					<button type="submit" class="btn btn-primary mr-2 updatePass">Save</button>
					<button type="reset" class="btn btn-secondary">Reset</button>
				</div>
			</div>
		</div>
	</form>
</div>
@endsection
{{-- Scripts Section --}}
@section('scripts')
    <script>
	    $(document).ready(function(){
	        $('.opass').change(function(){
	            var opass = $(this).val();
	            $.ajax({
	                type : "POST",
	                url : "{{route('check-old-pass')}}",
	                data : {
	                    "old_password" : opass,
	                    "_token" : "{{csrf_token()}}"
	                },
	                success : function(response) {
	                    if (response) {
	                        $('.updatePass').prop("disabled",false);
	                        $('.opassMsg').css("display","none");
	                    } else {
	                        $('.updatePass').prop("disabled",true);
	                        $('.opassMsg').css("display","block");
	                    }
	                    
	                }
	            })
	        });
	        $('.pass,.cpass').change(function(e){
	            var pass = $('.pass').val();
	            var cpass = $('.cpass').val();
	            if (pass && cpass) {
	                if (pass != cpass) {
	                    $('.updatePass').prop("disabled",true);
	                    $('.passMsg').css("display","block");
	                } else {
	                    $('.updatePass').prop("disabled",false);
	                    $('.passMsg').css("display","none");
	                }
	            }
	           
	        });
	    });
	</script>
@endsection