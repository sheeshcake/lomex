<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} | Login</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                    <img src="/img/lomex-logo.png" class="mx-auto d-block" alt="..." width="200">
                    <h5 class="card-title text-center mt-3">Register</h5>
                    @if(session()->has('msg'))
                        <div class="alert alert-{{ session()->get('status') }}">{{ session()->get('msg') }}</div>
                    @endif
                    <form class="form-signin" action="" method="POST">
                        @csrf
                        <div class="form-label-group">
                            <input type="text" id="inputFName" name="f_name" class="form-control" placeholder="First Name" required autofocus>
                            <label for="inputFName">First Name</label>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="inputLName" name="l_name" class="form-control" placeholder="Last Name" required autofocus>
                            <label for="inputLName">Last Name</label>
                        </div>
                        <div class="form-label-group">
                            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" required autofocus>
                            <label for="inputEmail">Email</label>
                        </div>
                        <div class="form-label-group">
                            <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Username" required autofocus>
                            <label for="inputUsername">Username</label>
                        </div>
                        <div class="form-label-group">
                            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                            <label for="inputPassword">Password</label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>