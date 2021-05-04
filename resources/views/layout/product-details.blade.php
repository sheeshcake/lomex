@extends('productlayout')

@section('content')

<div class="container">
	<div class="row my-3">
		<div class="col-4">
			<div class="photo-gallery">
				<div class="photos">
				@foreach($data["images"] as $key => $image)
					@if($key == 0)
					<a href="{{ url('/') }}/img/products/{{ $image['image_source'] }}" data-lightbox="photos">
						<img class="img-fluid" src="{{ url('/') }}/img/products/{{ $image['image_source'] }}">
					</a>
					<hr>
					<div class="row my-0">
					@else
						<div class="col-4">
							<a href="{{ url('/') }}/img/products/{{ $image['image_source'] }}" data-lightbox="photos">
								<img class="img-fluid" src="{{ url('/') }}/img/products/{{ $image['image_source'] }}" alt="">
							</a>
						</div>
					@endif
				@endforeach
					</div>
				</div>
			</div>
		</div>
		<div class="col-8">
			<div class="card">
				<div class="card-header">
					<h1>{{ $data["product"][0]["product_name"] }}</h1>
					<h3>{{ $data["product"][0]["product_type"] }}</h3>
					<h6>₱ {{ $data["product"][0]["product_price"] }}</h6>
				</div>
				<div class="card-body">
					{!! $data["product"][0]["product_description"] !!}
				</div>
			</div>
		</div>
	</div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/js/lightbox.min.js"></script>
@endsection