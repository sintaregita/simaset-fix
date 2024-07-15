<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('auth/css/my-login.css')}}">
</head>

<body class="my-login-page">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="brand">
                        <div style="display: flex; justify-content: center; height: 150;">
                            <h4 class="text-center">Bagian Logistik Telkom University Surabaya
                            </h4>
                        </div>
                    </div>
                    <div class="card fat">
                        <div class="card-body">
                            <div style="display: flex; justify-content: center; align-items: center;">
                                <img src="{{asset('auth/img/logo.png')}}" alt="image" height="35" width="180">
                            </div>
                            @if(session('error'))
                            <div class="alert alert-warning alert-dismissible fade show my-4" role="alert">
                                {{session('error')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            <form method="POST" action="{{ route('Login') }}">
                                @csrf
                                <div class="form-group" style="margin-top: 20px;">
                                    <label for="email">Silakan Masuk ke Akun Anda</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukkan Email" style="margin-top: 20px;">
                                    <div class="invalid-feedback">
                                        Email is invalid
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password">
                                        <a href="forgot.html" class="float-right text-danger">
                                            Forgot Password?
                                        </a>
                                    </label>
                                    <input id="password" type="password" class="form-control" name="password" required autocomplete="current-password" placeholder="Masukkan Password" required data-eye>
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="custom-checkbox custom-control">
                                        <input type="checkbox" name="remember" id="remember" class="custom-control-input">
                                        <label for="remember" class="custom-control-label">Ingat Saya</label>
                                    </div>
                                </div>

                                <div class="form-group m-0">
                                    <button type="submit" class="btn btn-block" style="background-color: #9D2A17; color: #ffffff;">
                                        Masuk
                                    </button>
                                </div>
                                <div class="mt-4 text-center">
                                    Pengguna baru? <a class="text-danger" href="{{route('register')}}">Daftar Sekarang</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="footer">
                        Copyright &copy; 2024 &mdash; Bagian Logistik Telkom University Surabaya
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{asset('auth/js/my-login.js')}}"></script>
</body>

</html>