<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SB Admin</title>
    <style>
        span {
            color: red;
        }
    </style>
    {{-- <link href="../../../m2/du_an/admin/css/styles.css" rel="stylesheet" /> --}}
    <link href="{{ asset('../assets/css/styles1.css') }}" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    {{-- <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script> --}}
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
</head>

<body class="bg-primary">
    @include('sweetalert::alert')
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('shop.checklogin') }}" method="post">
                                        @method('POST')
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="" type="email" placeholder=""
                                                name="email" />
                                            <label for="inputEmail">Email address</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="" type="password" placeholder=""
                                                name="password" />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="#">Forgot Password?</a>
                                            <button type="submit" class="btn btn-primary">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="{{ route('shop.register') }}">Create An Account</a>
                                    </div>
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
    {{-- <script src="../../../m2/du_an/admin/js/scripts.js"></script> --}}
    <script src="{{ asset('../assets/js/scripts.js') }}"></script>
</body>

</html>
