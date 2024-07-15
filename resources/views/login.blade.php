<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="icon" href="{{ asset('favicon.ico') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <title>Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter%3A100%2C300%2C400%2C600%2C700" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro%3A100%2C300%2C400%2C600%2C700" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat%3A300" />
    <link rel="stylesheet" href="{{ asset('styles/login.css') }}" />
</head>

<body>
    <div class="login-6To">
        <p class="bagian-logistik-telkom-university-surabaya-TSm">
            Bagian Logistik
            <br />
            Telkom University Surabaya
        </p>
        <div class="auto-group-3gcc-en9">
            <p class="silakan-masuk-ke-akun-anda-96d">Silakan masuk ke akun anda.</p>
            <p class="lupa-password-zsw">Lupa Password?</p>
            <a href="{{ route('Admin') }}" class="auto-group-gdyg-Hs3">Masuk</a>
            <a href="{{ route('Admin') }}" class="auto-group-gdyg-Hs3">Masuk</a>
            <div class="auto-group-fv6t-ViD">
                <div class="rectangle-ingat-saya-R65">
                </div>
                <p class="ingat-saya-hpH">Ingat saya</p>
            </div>
            <p class="pengguna-baru-daftar-sekarang-cRT">
                <span class="pengguna-baru-daftar-sekarang-cRT-sub-0">Pengguna baru? </span>
                <span class="pengguna-baru-daftar-sekarang-cRT-sub-1">Daftar sekarang</span>
            </p>
            <div class="auto-group-zfzv-Tyo">
                <img class="icon-user-9bj" src="{{ asset('assets/icon-user.png') }}" />
                <p class="username-g5s">Username</p>
            </div>
            <div class="auto-group-tbrt-m7K">
                <img class="icon-lock-TF3" src="{{ asset('assets/icon-lock.png') }}" />
                <p class="password-no7">Password</p>
            </div>
            <img class="logo-simaset-1-spZ" src="{{ asset('assets/logo-simaset-1-hBj.png') }}" />
        </div>
    </div>
</body>
