@extends("backend.layout.main")

@section("content")
	<div class="row" style="margin-top:-15px;">
		<div class="col-lg-9 main-chart">
			@foreach($owners as $owner)

				<div class="col-lg-4 col-md-4 mb">
					<!-- Remember to put the wordwrap in white-panel class -->
					<div class="white-panel pn">

						<div class="white-header">
							<h5>Pokhara Futsal Arena</h5>
						</div>

						<p>
							@if(!empty($owner->image))
								<img src="{{ asset('assets/img/profile/'.head(explode('.', $owner->image)).'_thumb.'.last(explode('.', $owner->image))) }}" class="img-circle" width="80" height="80">
							@else
								<img src="{{ asset('assets/img/friends/fr-05.jpg') }}" class="img-circle" width="80" height="80">
							@endif
						</p>

						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<b>{{ $owner->username }}</b>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<b>{{ $owner->name }}</b>
							</div>
						</div>

						<p>
							<b>{{ $owner->email }}</b>
						</p>

						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<p>MEMBER SINCE</p>
								<p>
									{{ date("d M Y", strtotime($owner->created_at)) }}
								</p>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
								<p>UPDATED AT</p>
								<p>{{ date("d M Y", strtotime($owner->updated_at)) }}</p>
							</div>
						</div>

					</div>
				</div>

			@endforeach
		</div>

		<div class="col-lg-3 ds">
			<h3><a href="{{ URL::route('admin-tasks') }}">TASKS</a></h3>
			@include("backend.admin.todo")
		</div>
	</div>
	

@stop