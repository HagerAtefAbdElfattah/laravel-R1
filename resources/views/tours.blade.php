@extends('layouts.article')
@section('content')
<form  method="POST" action="{{ route ('tours', $places->id) }}" class="m-auto" style="max-width:600px" enctype="multipart/form-data" >
@csrf
 <section class="pf-details section">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="inner-content">
							<div class="image-slider">
								<div class="pf-details-slider">
									<img src="{{ asset('assets/images/'.$places->image) }}" alt="{{ $places->title }}">
								</div>
							</div>
							<div class="body-text">
								<h3>{{ $places->title }}</h3>
								<p>{{ $places->content }}</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	</form>
	
@endsection