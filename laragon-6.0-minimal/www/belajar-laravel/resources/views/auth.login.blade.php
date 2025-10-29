<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>Login</title>

 <!-- Bootstrap 5 -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

 <style>
 body {
    font-family: 'Arial', sans-serif;
    background-color: #f5f5f5;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
 }
 .login-card {
    width: 100%;
    max-width: 400px;
    border: none;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    padding: 30px;
    background-color: #9b59b6;
    color: white;
 }
 .login-card h3 {
    font-weight: bold;
    margin-bottom: 20px;
 }
 .btn-login {
    background-color: #e91e63;
    border: none;
    border-radius: 8px;
 }
 .btn-login:hover {
    background-color: #db1b60;
 }
 .form-control {
    border-radius: 8px;
 }
 .login-card a {
    color: #ffe0f0;
 }
 </style>
</head>

<body>
<div class="login-card">
    <h3>Login</h3>

    <!-- tampilkan error -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- tampilkan pesan sukses -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
                type="email"
                class="form-control @error('email') is-invalid @enderror"
                name="email"
                value="{{ old('email') }}"
                required
            >
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input
                type="password"
                class="form-control @error('password') is-invalid @enderror"
                name="password"
                required
            >
        </div>

        <button type="submit" class="btn btn-login w-100">Login</button>
    </form>
</div>
</body>
</html>
