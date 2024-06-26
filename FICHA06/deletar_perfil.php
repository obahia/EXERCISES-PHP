<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar Perfil</title>
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
        .delete-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        .delete-container h2 {
            margin-top: 0;
            margin-bottom: 15px;
            font-size: 24px;
        }
        .delete-container p {
            font-size: 16px;
            margin-bottom: 20px;
        }
        .delete-container .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .delete-container .buttons .btn {
            width: 45%;
            padding: 10px;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            color: #fff;
            border: none; /* Remove a borda padrão */
            outline: none; /* Remove o contorno ao focar */
        }
        .delete-container .buttons .btn.cancel {
            background-color: #007BFF;
        }
        .delete-container .buttons .btn.cancel:hover {
            background-color: #0056b3;
        }
        .delete-container .buttons .btn.delete {
            background-color: #FF0000;
        }
        .delete-container .buttons .btn.delete:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>
    <div class="delete-container">
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
        $sql = "SELECT id_utilizador, email, nome_utilizador FROM utilizadores WHERE nome_utilizador = ?";
        if ($stm = $con->prepare($sql)) {
            $stm->bind_param("s", $utilizador);
            $stm->execute();
            $result = $stm->get_result();
            if ($result->num_rows > 0) {
                // Recuperar os dados do usuário
                $row = $result->fetch_assoc();
                $id = $row['id_utilizador'];
                $email = $row['email'];
                $nome_utilizador = $row['nome_utilizador'];
                ?>
                <h2>Deletar Perfil</h2>
                <p><strong>Email:</strong> <?php echo $email; ?></p>
                <p><strong>Nome de Usuário:</strong> <?php echo $nome_utilizador; ?></p>
                <form action="processar_delecao_perfil.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="buttons">
                        <input type="submit" class="btn delete" value="DELETAR">
                        <a href="login.php" class="btn cancel">CANCELAR</a>
                    </div>
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
