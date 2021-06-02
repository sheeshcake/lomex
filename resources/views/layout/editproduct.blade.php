@extends("home")

@section("topbar")
    @include("layout.topbar")
@endsection

@section("sidebar")
    @include("layout.sidebar")
@endsection


@section("content")

    <div id="stickycrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/products">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $data['product'][0]["product_name"] }}</li>
        </ol>
        <div class="alert" id="product-alert" style="display: none">
        </div>
    </div>
    <div class="page-header" style="background-image: url({{url('/')}}/img/products/{{ $data['product'][0]['images'][0]['image_source'] }});">
    </div>
    <div class="product-name">
        <h2><b id="p-name">{{ $data['product'][0]["product_name"] }}</b></h2>
    </div>
        <div class="card" style="border-radius: 0 !important;">
            <div class="card-section overflow-auto">
                <div class="container">
                    <div class="row">
                        <div class="col mx-1">
                            <div class="card shadow">
                                <h5 class="card-header m-0">Images</h5>
                                <div class="card-body">
                                    <div class="row mb-5 px-3">
                                        <div class="col">
                                            <div class="grid-container" id="images">
                                                <!-- Change to JQUERY AJAX -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputFile">
                                    <label class="custom-file-label" for="inputFile">Add Image</label>
                                </div>
                                <form id="product_form">
                                @csrf
                                <input type="number" name="id" id="id" value="{{ $data['product'][0]['id'] }}" hidden>
                                <div class="card-body border-top">
                                    <div class="row my-3">
                                        <div class="col">
                                            <div class="form-group mx-1">
                                                <label for="p-nameinput">Product Name</label>
                                                <input class="form-control" id="p-nameinput" name="p_name" type="text" value="{{ $data['product'][0]['product_name'] }}">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group mx-1">
                                                <label for="p-typeinput">Product Type</label>
                                                <input class="form-control" id="p-typeinput" name="p_type" type="text" value="{{ $data['product'][0]['product_type'] }}">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group mx-1">
                                                <label for="p-ribboninput">Ribbon</label>
                                                <input class="form-control"id="p-ribboninput" name="p_ribbon" type="text" placeholder="eg., New Item." value="{{ $data['product'][0]['product_ribbon'] }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-25">
                                        <label class="mx-1" for="p-priceinput1">Price</label>
                                        <div class="input-group mb-3 mx-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="price-icon1">₱</span>
                                            </div>
                                            <input type="number" class="form-control" id="p-priceinput1" name="p_price" placeholder="Price" aria-label="Price" aria-describedby="price-icon" value="{{ $data['product'][0]['product_price'] }}">
                                        </div>
                                    </div>
                                    <div class="custom-control custom-switch mx-1 mb-3">
                                        <input type="checkbox" class="custom-control-input" id="discountswitch">
                                        <label class="custom-control-label" for="discountswitch">On Sale</label>
                                    </div>
                                    <div class="row w-50 mb-3" id="discount-form" style="display: none">
                                        <div class="col">
                                            <label class="mx-1" for="p-discountinput">Discount</label>
                                            <div class="input-group mb-3 mx-1">
                                                <input type="number" class="form-control" id="p-discountinput" name="p_discount" placeholder="Discount" aria-label="Discount" aria-describedby="discount-icon" value="{{ $data['product'][0]['product_discount'] }}">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="discount-icon">%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label class="mx-1" for="p-priceinput2">Sale Price</label>
                                            <div class="input-group mb-3 mx-1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="price-icon2">₱</span>
                                                </div>
                                                <input type="number" class="form-control" id="p-priceinput2" name="p_sale_price" placeholder="Price" aria-label="Price" aria-describedby="price-icon" value="{{ $data['product'][0]['product_sale_price'] }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="custom-control custom-switch mx-1 mb-3">
                                        <input type="checkbox" class="custom-control-input" id="priceperunitswitch">
                                        <label class="custom-control-label" for="priceperunitswitch">Show Price per Unit</label>
                                    </div>
                                    <div class="row mb-3" id="priceperunit-form" style="display: none">
                                        <div class="col">
                                            <label class="mx-1" for="p-quantityunit">Total Product Quantity in Units</label>
                                            <div class="input-group mb-3 mx-1">
                                                <input type="number" class="form-control" id="p-quantityunit" placeholder="Discount" aria-label="Discount" aria-describedby="discount-icon" name="p_quantity_in_units" value="{{ $data['product'][0]['product_quantity_in_units'] }}">
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="discount-icon">%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <label class="mx-1" for="p-baseunitinput">Base Units</label>
                                            <div class="input-group mb-3 mx-1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="price-icon">₱</span>
                                                </div>
                                                <input type="number" class="form-control" id="p-baseunitinput" placeholder="Price" aria-label="Price" aria-describedby="price-icon" name="p_base_unit" value="{{ $data['product'][0]['product_base_unit'] }}">
                                            </div>
                                        </div>
                                        <div class="w-25">
                                            <label class="mx-1" for="p-priceperunit">Base Price per Units</label>
                                            <div class="input-group mb-3 mx-1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="priceperunit-icon">₱</span>
                                                </div>
                                                <input type="number" class="form-control" id="p-priceperunit" placeholder="Price Per Unit" aria-label="Price Per Unit" aria-describedby="priceperunit-icon" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mx-1">
                                        <label for="p-descriptioninput">Description</label>
                                        <textarea name="editor">{!! $data['product'][0]['product_description'] !!}</textarea>
                                        <textarea hidden class="form-control" id="p-descriptioninput" name="p_description" value="{{ $data['product'][0]['product_description'] }}"></textarea>
                                    </div>
                                </div>
                                <div class="card-footer text-muted">
                                    <button class="btn btn-primary" type="submit">Save</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 mx-1">
                            <div class="card shadow">
                                <h5 class="card-header">Brand</h5>
                                <div class="card-body">
                                    @foreach($data["brands"] as $brand)
                                    <div class="form-check">
                                        <input class="form-check-input" value="{{ $brand['id'] }}" type="radio" name="brand_id" id="flexRadioDefault1" @if($brand["id"] == $data['product'][0]['brand_id']) checked @endif>
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            {{ $brand["brand_name"] }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <script>
        var $editor = CKEDITOR.replace( 'editor' );
        $("#product_form").submit(function(e){
            $updated = true;
            e.preventDefault();
            $("#p-descriptioninput").val(CKEDITOR.instances.editor.getData());
            $.ajax({
                url: '/products/updateproduct', 
                type: 'post',
                data: $(this).serialize(),
                success: function(d){
                    d = JSON.parse(d);
                    $("#product-alert").addClass("alert-" + d["status"]);
                    $("#product-alert").text(d["alert"]);
                    $("#product-alert").slideDown(500);
                    setTimeout(function () {
                        $("#product-alert").slideUp(500);
                    }, 5000);
                }
            });
        });
        $("input[type='file']").on('change', function () {
            var file_data = $(this).prop('files')[0];   
            var form_data = new FormData();                  
            form_data.append('file', file_data);
            form_data.append('id', "{{ $data['product'][0]['id'] }}");
            form_data.append('_token', "{{ csrf_token() }}");
            $.ajax({
                url: "/products/addimage",
                type: "POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData:false,
                success: function(data){
                    refresh_image();
                }
            });
        });
        function refresh_image(){
            $.ajax({
                url: "/products/getimages",
                type: "post",
                data:{
                    "id": "{{ $data['product'][0]['id'] }}",
                    "_token" : "{{ csrf_token() }}"
                },
                success: function(d){
                    d = JSON.parse(d);
                    $("#images").html("");
                    d.forEach(function(item, index){
                        if(index == 0){
                            if(item.image_source == "noimage.png"){
                                $("#images").append(
                                '<div class="image-area border border-success">' +
                                        '<img src="{{ url("/") }}/img/products/' + item.image_source +  '">' +
                                    '</div>'
                                );
                            }else{
                                $("#images").append(
                                    '<div class="image-area border border-success">' +
                                        '<button class="close AClass" value="' + item.id + '">' +
                                        '<span>&times;</span>' +
                                        '</button>' +
                                        '<img src="{{ url("/") }}/img/products/' + item.image_source +  '">' +
                                    '</div>'
                                );
                            }

                        }else{
                            $("#images").append(
                                '<div class="image-area border border-primary">' +
                                    '<button class="close AClass" value="' + item.id + '">' +
                                    '<span>&times;</span>' +
                                    '</button>' +
                                    '<img src="{{ url("/") }}/img/products/' + item.image_source +  '">' +
                                '</div>'
                            );
                        }

                    });
                }
            });
        }
        $(document).on("click", ".AClass", function(){
            $id = $(this).val();
            $.ajax({
                url: "/products/removeimage",
                type: "post",
                data:{
                    "id": $id,
                    "product_id": "{{ $data['product'][0]['id'] }}",
                    "_token" : "{{ csrf_token() }}"
                },
                success: function(){
                    refresh_image();
                }
            });
        });
        $(document).ready(function(){
            refresh_image();
        });
        $("#p-nameinput").on("input", function(){
            $("#p-name").text($(this).val());
        });
        $("#discountswitch").on('change', function(e){
            if($(this).is(":checked")){
                $("#discount-form").slideDown(500);
            }else{
                $("#discount-form").slideUp(500);
            }
        });
        $("#priceperunitswitch").on('change', function(e){
            if($(this).is(":checked")){
                $("#priceperunit-form").slideDown(500);
            }else{
                $("#priceperunit-form").slideUp(500);
            }
        });
        // When the user scrolls the page, execute myFunction
        window.onscroll = function() {myFunction()};

        // Get the navbar
        var navbar = document.getElementById("stickycrumb");

        // Get the offset position of the navbar
        var sticky = navbar.offsetTop;

        // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
        function myFunction() {
        if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
        } else {
            navbar.classList.remove("sticky");
        }
        }
    </script>

@endsection
