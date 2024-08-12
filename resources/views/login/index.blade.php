<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel='icon' type='image/png' href='image/favicon.png'>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #e3f2fd; /* Light blue background */
        }
        .container {
            display: flex;
            width: 90%;
            max-width: 1200px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            overflow: hidden;
        }
        .logo-section {
            width: 40%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #bbdefb; /* Soft blue background for logo section */
            border-right: 1px solid #e1e1e1;
            padding: 40px;
            box-sizing: border-box;
        }
        .logo-section img {
            width: 100px;
            margin: 0 15px; /* Space between logos */
            transition: transform 0.3s;
        }
        .logo-section img:hover {
            transform: scale(1.1);
        }
        .login-section {
            width: 60%;
            padding: 40px;
            background: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .login-section h2 {
            margin: 0;
            font-size: 28px;
            color: #333;
        }
        .login-section p {
            margin: 10px 0 30px;
            color: #666;
            font-size: 16px;
        }
        .form-group {
            margin-bottom: 25px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
        }
        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            font-size: 16px;
        }
        .form-group input:focus {
            border-color: #007bff;
            box-shadow: 0 2px 6px rgba(0,123,255,0.2);
            outline: none;
        }
        .btn {
            display: inline-block;
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            background-color: #007bff;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }
        .btn:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }
        .register-link {
            text-align: center;
            margin-top: 20px;
        }
        .register-link a {
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
            font-size: 16px;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
        .alert {
            margin: 20px 0;
            padding: 15px;
            border-radius: 6px;
            color: #fff;
            font-size: 16px;
        }
        .alert-success {
            background-color: #28a745; /* Green */
        }
        .alert-danger {
            background-color: #dc3545; /* Red */
        }
        .btn-close {
            background: transparent;
            border: none;
            color: #fff;
            cursor: pointer;
        }
        .btn-close:hover {
            color: #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="logo-section">
            <img src="{{ asset('image/uwp.png') }}" alt="Logo 1">
            <img src="{{ asset('image/kemendikbud.png') }}" alt="Logo 2">
        </div>

        <div class="login-section">
            <h2>Login Ke Akun Anda</h2>
            <p>Masukan Detail Login Anda.</p>
            <form action="/login" method="post">
                @csrf
                <div class="form-group">
                    <label for="nik">Masukan NIK/Code</label>
                    <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"
                    id="nik" placeholder="nik" autofocus required value="{{ old('nik') }}">
                    @error('nik')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter your password">
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
            <div class="register-link">
                <p>Buat Akun? <a href="/register">Daftar Disini</a></p>
            </div>
        </div>
    </div>
</body>
</html>
