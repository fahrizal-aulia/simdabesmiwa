<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #e3f2fd;
            min-height: 100vh;
        }
        .container {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 20px;
            max-width: 600px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .header {
            text-align: center;
            padding: 20px;
            background-color: #bbdefb;
            border-bottom: 1px solid #e1e1e1;
        }
        .header img {
            width: 80px;
            margin: 0 10px;
        }
        .content {
            padding: 30px;
            text-align: left;
            color: #333333; /* Dark color for better readability */
        }
        .content h1 {
            font-size: 24px;
            color: #333333; /* Ensuring dark color */
            margin-bottom: 20px;
        }
        .content p {
            font-size: 16px;
            margin-bottom: 30px;
            color: #666666; /* Gray color for secondary text */
        }
        .btn {
            display: inline-block;
            padding: 12px 20px;
            background-color: #007bff;
            color: #ffffff !important; /* Ensure white text color for readability */
            border-radius: 6px;
            text-align: center;
            text-decoration: none;
            font-size: 18px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .footer {
            text-align: center;
            padding: 20px;
            color: #777777; /* Light gray for footer text */
            font-size: 14px;
        }
        .footer a {
            color: #007bff;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://simdabesmiwa.id/image/uwp.png" alt="Logo 1">
            <img src="https://simdabesmiwa.id/image/kemendikbud.png" alt="Logo 2">
        </div>
        <div class="content">
            <h1>Reset Password</h1>
            <p>Hello, {{ $user->nama }}</p>
            <p>Kami menerima permintaan untuk mereset password akun Anda. Jika Anda tidak meminta penggantian password, abaikan email ini.</p>
            <p>Untuk mereset password Anda, silakan klik tombol di bawah ini:</p>
            <a href="{{ $url }}" class="btn" style="color: #ffffff !important;">Reset Password</a> <!-- Ensuring white text on button -->
        </div>
        <div class="footer">
            <p>Jika Anda mengalami masalah, salin dan tempelkan URL berikut di browser Anda: <a href="{{ $url }}">{{ $url }}</a></p>
            <p>&copy; {{ date('Y') }}. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
