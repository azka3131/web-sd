<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator - SDN Dukuhbenda 02</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        
        body {
            background: linear-gradient(135deg, #4FB6C7 0%, #0057b3 100%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .login-box {
            background: #ffffff;
            width: 100%;
            max-width: 400px;
            padding: 40px 30px;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            text-align: center;
            position: relative;
            animation: fadeInUp 0.8s ease-out;
        }
        .login-logo {
            width: 90px;
            height: 90px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #fff;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin-top: -85px; 
            margin-bottom: 20px;
            background: white;
        }
        h2 { color: #333; margin-bottom: 5px; font-weight: 800; font-size: 24px; }
        p.subtitle { color: #666; font-size: 14px; margin-bottom: 30px; }
        .input-group {
            position: relative;
            margin-bottom: 20px;
            text-align: left;
        }
        
        .input-group label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #4FB6C7;
            margin-bottom: 5px;
            text-transform: uppercase;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
            transition: 0.3s;
        }

        .input-wrapper input {
            width: 100%;
            padding: 12px 15px 12px 45px; 
            border: 2px solid #eee;
            border-radius: 30px;
            outline: none;
            font-size: 14px;
            transition: 0.3s;
            background: #f9fbfd;
        }
        .input-wrapper input:focus {
            border-color: #4FB6C7;
            background: #fff;
            box-shadow: 0 0 10px rgba(79, 182, 199, 0.1);
        }
        .input-wrapper input:focus + i { color: #4FB6C7; }
        .btn-login {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 30px;
            background: linear-gradient(to right, #4FB6C7, #0057b3);
            color: white;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 5px 15px rgba(79, 182, 199, 0.3);
            margin-top: 10px;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(79, 182, 199, 0.4);
        }
        .back-home {
            display: block;
            margin-top: 20px;
            font-size: 13px;
            color: #888;
            text-decoration: none;
            transition: 0.3s;
        }
        .back-home:hover { color: #4FB6C7; }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <div class="login-box">
        <img src="/kp-sd2-dukuhbenda/public/assets/img/logo_tel.png" alt="Logo SD" class="login-logo">
        
        <h2>Admin Panel</h2>
        <p class="subtitle">Silakan login untuk mengelola website</p>

        <form action="/kp-sd2-dukuhbenda/public/admin/login-process" method="POST">
            
            <div class="input-group">
                <label>Username</label>
                <div class="input-wrapper">
                    <input type="text" name="username" placeholder="Masukkan username..." required autofocus>
                    <i class="fas fa-user"></i>
                </div>
            </div>

            <div class="input-group">
                <label>Password</label>
                <div class="input-wrapper">
                    <input type="password" name="password" placeholder="Masukkan password..." required>
                    <i class="fas fa-lock"></i>
                </div>
            </div>

            <button type="submit" class="btn-login">MASUK <i class="fas fa-sign-in-alt"></i></button>
        </form>

        <a href="/kp-sd2-dukuhbenda/public/" class="back-home">
            &larr; Kembali ke Website Utama
        </a>
    </div>

</body>
</html>