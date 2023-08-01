<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Register</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('public/admin/assets/css/app.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/assets/bundles/bootstrap-social/bootstrap-social.css')}}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('public/admin/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/assets/css/components.css')}}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{asset('public/admin/assets/css/custom.css')}}">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
<div class="loader"></div>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Login</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="javascript:" id="register_form" class="needs-validation" novalidate="">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input id="name" type="text" class="form-control" name="name" tabindex="1" required autofocus>
                                    <div class="invalid-feedback">
                                        Please fill your name
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                                    <div class="invalid-feedback">
                                        Please fill  your email
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                    <div class="invalid-feedback">
                                        please fill in your password
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Login
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- General JS Scripts -->
<script src="{{asset('public/admin/assets/js/app.min.js')}}"></script>
<!-- JS Libraies -->
<!-- Page Specific JS File -->
<!-- Template JS File -->
<script src="{{asset('public/admin/assets/js/scripts.js')}}"></script>
<!-- Custom JS File -->
<script src="{{asset('public/admin/assets/js/sweetalert.min.js')}}"></script>
<script src="{{asset('public/admin/assets/js/ajax.js')}}"></script>

</body>

<script>
    $('#register_form').submit(function (e) {
        e.preventDefault();
        let data = new FormData(this);
        let a = function(){
            setTimeout( function (){
                window.location.href = '{{ route('login') }}';
            },1000);
        };
        let arr = [a];
        call_ajax_with_functions('','{{ route('register_submit') }}',data,arr);
    });
</script>
<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>
