<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-danger">
  
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-7 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block"><img class="img-profile rounded-circle"
                              src="{{asset('img/logo11.jpg')}}">
                
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    
    
                                <form method="POST" action="{{route('log')}}">
                                    @csrf   
                                    <div class="card-body">
                                      @if(session('errors'))
                                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                              Something it's wrong:
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                  <span aria-hidden="true">×</span>
                                              </button>
                                              <ul>
                                              @foreach ($errors->all() as $error)
                                              <li>{{ $error }}</li>
                                              @endforeach
                                              </ul>
                                          </div>
                                      @endif
                                    <div class="form-group">
                                          <label for="email">Email</label>
                                          <input id="email" type="text" class="form-control form-control-user " name="email" tabindex="1" required autofocus>
                                          <div class="invalid-feedback">
                                            Please fill in your username
                                          </div>
                                        </div>
                      
                                        <div class="form-group">
                                          <div class="d-block">
                                              <label for="password" class="control-label">Password</label>
                                          </div>
                                          <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                          <div class="invalid-feedback">
                                            please fill in your password
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Login
                                          </button>
                                          <a href="{{route('register')}}" class="btn btn-google btn-user btn-block"> Register
                                        </a>
                                         
                                        </div>
                                      </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>