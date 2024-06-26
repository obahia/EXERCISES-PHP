<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Information</title>
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
        .update-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: left;
        }
        .update-form h2 {
            margin-top: 0;
            margin-bottom: 15px;
            font-size: 24px;
            text-align: center;
        }
        .update-form label {
            font-weight: bold;
        }
        .update-form input[type="text"],
        .update-form input[type="password"] {
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
            box-sizing: border-box; /* Garante que padding e border sejam contados no width */
        }
        .update-form input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
            width: 100%; /* Faz o botão ocupar a largura total */
        }
        .update-form input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="update-form">
        <h2>Update Profile</h2>
        <?php
        session_start();
        
        // Verificar se o usuário está logado
        if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
            header("Location: login.php");
            exit;
        }
        
        // Conectar ao banco de dados
        $con = new mysqli("localhost", "root", "", "guest_users");
        if ($con->connect_error) {
            die("Erro ao conectar ao banco de dados: " . $con->connect_error);
        }
        
        // Obter dados do usuário atualmente logado
        $utilizador = $_SESSION['username'];
        
        // Preparar consulta SQL para obter os dados atuais do usuário
        $sql = "SELECT id, email, nome_utilizador FROM utilizadores WHERE nome_utilizador = ?";
        if ($stm = $con->prepare($sql)) {
            $stm->bind_param("s", $utilizador);
            $stm->execute();
            $result = $stm->get_result();
            if ($result->num_rows > 0) {
                // Recuperar os dados do usuário
                $row = $result->fetch_assoc();
                $id = $row['id'];
                $email = $row['email'];
                $nome_utilizador = $row['nome_utilizador'];
                ?>
                <form action="processar_atualizacao_perfil.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" value="<?php echo $email; ?>" required><br><br>
                    <label for="utilizador">Reset name</label>
                    <input type="text" id="utilizador" name="utilizador" value="<?php echo $nome_utilizador; ?>" required><br><br>
                    <label for="password">Reset password</label>
                    <input type="password" id="password" name="password" placeholder="Deixe em branco para manter a senha atual"><br><br>
                    <input type="submit" value="Update">
                </form>
                <?php
            } else {
                echo "Usuário não encontrado.";
            }
            $stm->close();
        } else {
            echo "Erro na preparação da consulta: " . $con->error;
        }
        
        // Fechar conexão com o banco de dados
        $con->close();
        ?>
    </div>
</body>
</html>
