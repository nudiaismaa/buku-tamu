<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Favicon -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background: url('{{ asset('img/depan.jpg') }}') no-repeat center center fixed;
    background-size: cover;
    font-family: 'Nunito', sans-serif;
}
.center {
    text-align: center;
    background-color: rgba(255, 255, 255, 0.8);
    padding: 20px;
    border-radius: 10px;
    margin-top: 50px;
}
.center a {
    margin-top: 20px;
    display: inline-block;
}
.top-left {
    position: absolute;
    left: 10px;
    top: 18px;
    color: white;
    font-weight: bold;
    font-size: 24px;
    text-shadow: 2px 2px 4px #000000;
}
.top-right {
    position: absolute;
    right: 10px;
    top: 18px;
}
.top-right a {
    color: white;
    text-shadow: 2px 2px 4px #000000;
}
footer {
    position: absolute;
    bottom: 10px;
    text-align: center;
    width: 100%;
    background-color: rgba(255, 255, 255, 0.8);
    padding: 10px;
    border-radius: 10px;
}
footer a {
    color: black;
    text-decoration: none;
}
</style>
</head>
<body>
    <div class="top-right">
        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
    </div>
    <div class="center">
        <img src="{{ asset('img/logo.png') }}" alt="Logo SDN 7 Ketapang" width="100" height="auto">
        <h1><marquee scrollamount="10">Selamat Datang di SDN 7 Ketapang</marquee></h1>
        <a href="{{ route('guest.create') }}" class="btn btn-primary">Buku Tamu</a>
    </div>
    <footer>
        <a href="https://wa.me/628179851011" target="_blank">Copyright &copy; 2024 Politeknik Negeri Banyuwangi | KM 7 SDN 7 Ketapang</a>
    </footer>
</body>
</html>
