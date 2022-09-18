<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register - SB Admin</title>
    <!-- <link href="css/styles.css" rel="stylesheet" /> -->
    <link href="{{ asset('../assets/css/styles1.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        span {
            color: red;
        }
    </style>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('user.checkregister') }}" method="post">
                                        @method('POST')
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('name') is-invalid @enderror"
                                                id="" type="text" placeholder="" name="name"
                                                value="{{ old('name') }}" />
                                            <label for="inputEmail">User Name</label>
                                        </div>
                                        @error('name')
                                            <label class="text text-danger">{{ $message }}</label>
                                        @enderror
                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('phone') is-invalid @enderror"
                                                id="" type="text" placeholder="" name="phone"
                                                value="{{ old('phone') }}" />
                                            <label for="inputEmail">Phone</label>


                                        </div>
                                        @error('phone')
                                            <label class="text text-danger">{{ $message }}</label>
                                        @enderror
                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('address') is-invalid @enderror"
                                                id="" type="text" placeholder="" name="address"
                                                value="{{ old('address') }}" />
                                            <label for="inputEmail">Address</label>

                                        </div>
                                        @error('address')
                                            <label class="text text-danger">{{ $message }}</label>
                                        @enderror
                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('email') is-invalid @enderror"
                                                id="" type="email" placeholder="" name="email"
                                                value="{{ old('email') }}" />
                                            <label for="inputEmail">Email</label>

                                        </div>
                                        @error('email')
                                            <label class="text text-danger">{{ $message }}</label>
                                        @enderror
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control @error('password') is-invalid @enderror"
                                                        id="" type="password" placeholder="" name="password" />
                                                    <label for="inputPassword">Password</label>

                                                </div>
                                                @error('password')
                                                    <label class="text text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input
                                                        class="form-control @error('confirmpassword') is-invalid @enderror"
                                                        id="inputPasswordConfirm" type="password" placeholder=""
                                                        name="confirmpassword" />
                                                    <label for="inputPasswordConfirm">Confirm Password</label>

                                                </div>
                                                @error('confirmpassword')
                                                    <label class="text text-danger">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid"><button class="btn btn-primary btn-block">Create
                                                    Account</button></div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="#">Have an account? Go to login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <!-- <script src="js/scripts.js"></script> -->
    <script src="{{ asset('../assets/js/scripts.js') }}"></script>
</body>

</html>
