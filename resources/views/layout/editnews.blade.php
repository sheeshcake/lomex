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
            <li class="breadcrumb-item"><a href="/news">News</a></li>
            <li class="breadcrumb-item active news_name"  aria-current="page">{{ $data['news'][0]["news_title"] }}</li>
        </ol>
        <div class="alert" id="news-alert" style="display: none">
        </div>
    </div>
	<div class="container">
		<div class="card">
			<div class="card-header">
				<h3 class="news_name">{{ $data['news'][0]['news_title'] }}</h3>
			</div>
			<div class="card-body">
				<form action="" id="news-form">
					<input type="hidden" name="id" value="{{ $data['news'][0]['id'] }}">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-4">
							<img class="img-fluid" id="news_image" src="{{ url('/') }}/img/news/{{ $data['news'][0]['news_image'] }}" alt="">
						</div>
						<div class="col-8">
							<div class="form-group row">
								<label for="news_titleinput">News Title</label>
								<input type="text" id="news_titleinput" name="news_title" class="form-control" value="{{ $data['news'][0]['news_title'] }}" required>
							</div>
							<div class="row">
								<div class="form-group col">
									<label for="news_urlinput">News URL</label>
									<input type="text" id="news_urlinput" name="news_url" class="form-control" value="{{ $data['news'][0]['news_url'] }}" required>
								</div>
								<div class="form-group col">
									<label for="">News Image</label>
									<div class="custom-file">
										<input type="file" class="custom-file-input" name="news_image" id="news_imageinput">
										<label class="custom-file-label" for="news_imageinput">News Image</label>
									</div>
								</div>

							</div>
						</div>
					</div>
					<hr>
					<button type="submit" class="btn btn-primary">Update</button>
				</form>
			</div>
		</div>
	</div>

    <script>
		$("#news-form").submit(function(e){
			e.preventDefault();
			var formData = new FormData(this);
			$.ajax({
				url: "/news/updatenews",
				method: "post",
				cache: false,
				contentType: false,
				processData: false,
				data: formData,
				success: function(d){
					d = JSON.parse(d);
                    $("#news-alert").addClass("alert-" + d["status"]);
                    $("#news-alert").text(d["alert"]);
                    $("#news-alert").slideDown(500);
                    setTimeout(function () {
                        $("#news-alert").slideUp(500);
                    }, 5000);
				}
			});
		});
		$("#news_imageinput").change(function(){
			if (this.files && this.files[0]) {
				var reader = new FileReader();
				reader.onload = function(e) {
					$('#news_image').attr('src', e.target.result);
				}
				reader.readAsDataURL(this.files[0]);
			}else{
				console.log("error reading");
			}
		});

		$("#news_titleinput").on("input", function(){
            $(".news_name").text($(this).val());
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
