<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f0f2f5;
        }
        .container {
            display: flex;
            width: 80%;
            max-width: 1200px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .logo-section {
            width: 30%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background-color: #f7f7f7;
            border-right: 1px solid #ddd;
            padding: 20px;
        }
        .logo-section img {
            width: 80px;
            margin: 20px;
            transition: transform 0.3s;
        }
        .logo-section img:hover {
            transform: scale(1.1);
        }
        .login-section {
            width: 70%;
            padding: 40px;
        }
        .login-section h2 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }
        .login-section p {
            margin: 10px 0 20px;
            color: #666;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-group input:focus {
            border-color: #007bff;
            outline: none;
        }
        .btn {
            display: inline-block;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .register-link {
            text-align: center;
            margin-top: 20px;
        }
        .register-link a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif


        @if (session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('loginError')}}
            {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
        </div>
        @endif
        <div class="logo-section">
            <img src="logo1.png" alt="Logo 1">
            <img src="logo2.png" alt="Logo 2">
            <img src="logo3.png" alt="Logo 3">
        </div>
        <div class="login-section">
            <h2>Login to Your Account</h2>
            <p>Welcome back! Please enter your details to log in.</p>
            <form action="/login" method="post">
                @csrf
                <div class="form-group">
                    <label for="nik">Masukan NIK/Code</label>
                    <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror"
                    id="nik" placeholder="nik" autofocus required value="{{ old('nik') }}">
                    @error('nik')
                    <div class="invalid-feedback">
                        {{ $massage }}
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
                <p>Don't have an account? <a href="#">Register here</a></p>
            </div>
        </div>
    </div>
</body>
</html>
