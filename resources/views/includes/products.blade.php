
    <section class="page-section bg-light" id="products">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Products</h2>
                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
            </div>
            <div class="product-content">
                <div class="product-container">
                    @foreach($data["products"] as $product)
                    <div class="card p-card m-4 p-2 products">
                        <h6 class="card-title text-danger">{{ $product["product_name"] }}</h6>
                        <b class="card-subtitle mb-2 text-muted">{{ $product["product_type"] }}</b>
                        <hr>
                        <div class="card-product d-flex mb-3" >
                            @foreach($product['images'] as $index => $images)
                                @if($index == 0)
                                    <img src="{{url('/') }}/img/products/{{ $images['image_source'] }}" alt="" class="product-image">
                                @endif
                            @endforeach
                            <p class="product-desc">{!! strip_tags(Str::limit($product["product_description"], 200, $end='...')) !!}</p>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-center">
                            <a class="btn btn-primary" style="width: 80%;" href="product/{{ $product['id'] }}">
                                View Details
                                <i class="fa fa-chevron-right" aria-hidden="true" href="product-details.php"></i>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">    
                    <a class="btn btn-primary" style="width: 80%;" href="#">
                        View All
                        <i class="fa fa-chevron-right" aria-hidden="true"></i>
                    </a>
                </div>
                
            </div>
        </div>
    </section>
