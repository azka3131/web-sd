<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .login-box {
            background: white;
            padding: 25px;
            width: 320px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        input, button {
            width: 100%;
            padding: 10px;
            margin-top: 12px;
        }
        button {
            background: #004aad;
            border: none;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="login-box">
    <h2>Login Admin</h2>

    <form action="/kp-sd2-dukuhbenda/public/admin/login-process" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button>Login</button>
    </form>
</div>

</body>
</html>
