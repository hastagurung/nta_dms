@extends('master')

@section('content')
<div class="row mt-0 mt-lg-3">
	<div class="col-xl-6">
		<div class="card card-custom card-stretch gutter-b">

			<!--begin::Header-->
			<div class="card-header border-0">
				<h3 class="card-title font-weight-bolder text-dark">Recent Certificate</h3>
				
			</div>

			<!--end::Header-->

			<!--begin::Body-->
			<div class="card-body pt-2">

				<!--begin::Item-->
				@foreach ($recentCertificates as $recentCertificate)
				<div class="d-flex align-items-center mb-10">

					<!--begin::Bullet-->
					<span class="bullet bullet-bar bg-success align-self-stretch"></span>

					<!--end::Bullet-->

					<!--begin::Checkbox-->
					<label class="checkbox checkbox-lg checkbox-light-success checkbox-single flex-shrink-0 m-0 mx-4">
						<!-- <input type="checkbox" name="select" value="1" />
						<span></span> -->
					</label>

					<!--end::Checkbox-->

					<!--begin::Text-->
					<div class="d-flex flex-column flex-grow-1">
						<a href="{{asset('storage/issued_certificate/'.$recentCertificate->certificate)}}" class="text-dark-75 text-hover-primary font-weight-bold font-size-lg mb-1" target="_blank">
							{{$recentCertificate->client_name}}
						</a>
						<span class="text-muted font-weight-bold">
							Validity {{$recentCertificate->certificate_validity}} year
						</span>
					</div>

					<!--end::Text-->
				</div>
				@endforeach
				<!--end:Item-->
			</div>

			<!--end::Body-->
		</div>
	</div>
	<div class="col-xl-6">
		<div class="card card-custom gutter-b card-stretch">
			<div class="card-header align-items-center border-0 mt-4">
				<h3 class="card-title align-items-start flex-column">
					<span class="font-weight-bolder text-dark">Expiring Certificate</span>
					<!-- <span class="text-muted mt-3 font-weight-bold font-size-sm">890,344 Sales</span> -->
				</h3>
			
			</div>

			<!--end::Header-->

			<!--begin::Body-->
			

			<!--end: Card Body-->
		</div>

		<!--end: Card-->

		<!--end: List Widget 9-->

		<!--[html-partial:end:{"id":"demo1/dist/inc/view/partials/content/widgets/lists/widget-9","page":"index"}]/-->
	</div>
</div>


@endsection