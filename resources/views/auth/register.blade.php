<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login Page &mdash; Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/my-login.css') }}">


</head>

<body class="my-login-page">
    @include('sweetalert::alert')
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="brand">
                                <h4 class="text-center">Bagian Logistik Telkom University Surabaya</h4>
                            </div>
                            <div class="card fat">
                                <div class="card-body">
                                    <div class="mb-3" style="display: flex; justify-content: center; align-items: center;">
                                        <img src="{{ asset('auth/img/logo.png') }}" alt="image" height="40" width="200">
                                    </div>
                                    <form method="POST" action="{{ route('user.register') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="name" class="col-form-label">Nama Lengkap</label>
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="name" autofocus>
                                                    @error('name')
                                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="prodi" class="col-form-label">Program Studi</label>
                                                    <select class="custom-select @error('prodi') is-invalid @enderror" id="prodi" name="prodi" autofocus>
                                                        <option value="" selected>Pilih Program Studi</option>
                                                        @foreach ( arrFakultas() as $i=>$value)
                                                        <optgroup label="{{$value['FAKULTAS']}}">
                                                            @foreach ( $value['PRODI'] as $val )
                                                            <option value="{{$val}}">{{$val}}</option>
                                                            @endforeach
                                                        </optgroup>
                                                        @endforeach
                                                     </select>
                                                    @error('prodi')
                                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="nim_nip" class="col-form-label">NIM/NIP</label>
                                                    <input id="nim_nip" min="8" type="number" class="form-control @error('nim_nip') is-invalid @enderror" name="nim_nip" autofocus>
                                                    @error('nim_nip')
                                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="telepon" class="col-form-label">Telepon</label>
                                                    <input id="telepon " class="form-control  @error('name') is-invalid @enderror" name="telepon" autofocus>
                                                    @error('telepon')
                                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="form-label">Email</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" autofocus>
                                            @error('email')
                                            <div class="text-danger"><small>{{ $message }}</small></div>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="password" class="col-form-label">Kata Sandi</label>
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autofocus>
                                                    @error('password')
                                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="confirm_password" class="col-form-label">Konfirmasi Kata
                                                        Sandi</label>
                                                    <input id="confirm_password" type="password" class="form-control  @error('password') is-invalid @enderror" name="password_confirmation" autofocus>
                                                    @error('password')
                                                    <div class="text-danger"><small>{{ $message }}</small></div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group m-0">
                                            <button type="submit" class="btn btn-block" style="background-color: #9D2A17; color: #ffffff;">
                                                Daftar
                                            </button>
                                        </div>
                                    </form>

                                    <div class="mt-4 text-center">
                                        Already have an account? <a class="text-danger" href="{{ route('login') }}">Login</a>
                                    </div>

                                </div>
                            </div>
                            <div class="footer">
                                Copyright &copy; 2024 &mdash; Bagian Logistik Telkom University Surabaya
                            </div>
                        </div>
                    </div>
                </div>
    </section>
</body>

</html>