<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
       body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center; /* Centraliza o conteúdo dentro da caixa */
            margin-bottom: 20px; /* Espaço abaixo da caixa de login */
        }
        .login-container h2 {
            margin-top: 0;
            margin-bottom: 15px;
            font-size: 24px;
        }
        .login-container form {
            display: flex;
            flex-direction: column;
        }
        .login-container input[type="text"],
        .login-container input[type="password"]
         {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
        }
        .login-container input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
            width: 100%; /* Faz o botão ocupar a largura total */
        }
        .login-container input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .register-link {
            text-align: center;
            margin-top: 10px;
        }
        .register-link p {
            margin: 0;
        }
        .register-link a {
            color: #007BFF;
            text-decoration: none;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="session1.php" method="post">
            <label for="utilizador"><b>User</b></label>
            <input type='text' id="utilizador" name="utilizador" required>
            <label for="password"><b>Password</b></label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Sign In">
        <div class="register-link">
           <p>No account? <a href="register.php">Sign Up</a></p>
        </div>
        </form>
    </div>
    
</body>
</html>
