<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>One Music - Modern Music HTML5 Template</title>
   <!-- Favicon -->
   <link rel="icon" href="{{ asset('assets/img/core-img/favicon.ico') }}">

   <!-- Stylesheet -->
   <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

</head>

<body>
    <!-- Preloader -->
@include("components.preloder")

    <!-- ##### Header Area Start ##### -->
    @include('components.header')

    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url({{ asset('assets/img/bg-img/breadcumb3.jpg') }});">
        <div class="bradcumbContent">
            <p>See what’s new</p>
            <h2>Login</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Login Area Start ##### -->
    <section class="login-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div class="login-content">
                        <h3>Welcome Back</h3>
                        <!-- Login Form -->
                        <div class="login-form">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter E-mail">
                                    <small id="emailHelp" class="form-text text-muted"><i class="fa fa-lock mr-2"></i>We'll never share your email with anyone else.</small>
                                    @error('email')
                                   
                                      <div class="alert alert-warning d-flex align-items-center" role="alert">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        <div>
                                            <strong>{{ $message }}</strong>
                                        </div>
                                      </div>
                                      
                                   
                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" name="password"  id="exampleInputPassword1" placeholder="Password">
                                  
                                @error('password')
                                   
                                    <div class="alert alert-warning d-flex align-items-center" role="alert">
                                      <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                      <div>
                                          <strong>{{ $message }}</strong>
                                      </div>
                                    </div>
                                    
                                 
                              @enderror
                              <h4><a href="">frogot password?</a></h4>
                                </div>
                                <button type="submit" class="btn oneMusic-btn mt-30">Login</button>
                                <h3><a href="/register">Don't have an account?</a></h3>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Login Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    @include('components.footer')

    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    @include('components.scripts')
</body>

</html>