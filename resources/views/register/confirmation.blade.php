<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pendaftaran</title>
    <link rel='icon' type='image/png' href='image/favicon.png'>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            background-color: #f5f7fa;
            display: flex;
            justify-content: center;
        }
        .container {
            width: 90%;
            max-width: 600px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            padding: 30px;
            box-sizing: border-box;
            text-align: center;
        }
        .header-section {
            margin-bottom: 30px;
        }
        .header-section h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 10px;
        }
        .header-section p {
            font-size: 16px;
            color: #666;
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            background-color: #007bff;
            color: #ffffff;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .btn:hover {
            background-color: #0056b3;
            transform: scale(1.02);
        }
        .contact-info {
            margin-top: 20px;
            font-size: 16px;
            color: #333;
        }
        .contact-info a {
            color: #007bff;
            text-decoration: none;
            font-weight: 700;
        }
        .contact-info a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-section">
            <h2>Terima Kasih atas Pendaftaran Anda!</h2>
            <p>Registrasi Anda telah berhasil. Silakan hubungi admin untuk konfirmasi lebih lanjut dan aktivasi akun Anda.</p>
        </div>
        <div class="contact-info">
            <p>Jika Anda memerlukan bantuan lebih lanjut, hubungi kami di <a href="mailto:support@example.com">support@example.com</a> atau telepon ke <strong>(021) 123-4567</strong>.</p>
        </div>
        <a href="/login" class="btn">Kembali ke Login</a>
    </div>
</body>
</html>
