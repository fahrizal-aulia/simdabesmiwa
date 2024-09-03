<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel='icon' type='image/png' href='{{ asset('image/favicon.png') }}'>
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
            position: relative;
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
        .reset-section {
            width: 60%;
            padding: 40px;
            background: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .reset-section h2 {
            margin: 0;
            font-size: 28px;
            color: #333;
        }
        .reset-section p {
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
        .login-link {
            text-align: center;
            margin-top: 20px;
        }
        .login-link a {
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
            font-size: 16px;
        }
        .login-link a:hover {
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
        <!-- Alert Messages -->
        @if (session()->has('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Logo Section -->
        <div class="logo-section">
            <img src="{{ asset('image/uwp.png') }}" alt="Logo 1">
            <img src="{{ asset('image/kemendikbud.png') }}" alt="Logo 2">
        </div>

        <!-- Reset Password Section -->
        <div class="reset-section">
            <h2>Reset Password Anda</h2>
            <p>Masukkan informasi berikut untuk mereset password Anda.</p>
            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                <!-- Hidden Token Field -->
                <input type="hidden" name="token" value="{{ $token }}">

                <!-- NIK Field -->
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input type="text" name="nik" id="nik" class="form-control @error('nik') is-invalid @enderror" placeholder="Masukkan NIK Anda" value="{{ old('nik') }}" required autofocus>
                    @error('nik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- New Password Field -->
                <div class="form-group">
                    <label for="password">Password Baru</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Password Baru" required>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- Confirm Password Field -->
                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Konfirmasi Password Baru" required>
                </div>

                <button type="submit" class="btn">Reset Password</button>
            </form>
            <div class="login-link">
                <p>Kembali ke <a href="/login">Login</a></p>
            </div>
        </div>
    </div>
</body>
</html>
