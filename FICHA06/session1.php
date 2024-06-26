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
    .login-success {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px;
        text-align: center;
    }
    .login-success h2 {
        margin-top: 0;
        margin-bottom: 15px;
        font-size: 24px;
    }
    .login-success a {
        display: block;
        margin-bottom: 10px;
        padding: 10px;
        background-color: #007BFF;
        color: #fff;
        text-decoration: none;
        border-radius: 3px;
        font-size: 16px;
    }
    .login-success a:hover {
        background-color: #0056b3;
    }
    
    </style>
</head>
<body>
    <?php
    session_start();

    $con = new mysqli("localhost", "root", "", "guest_users");

    // Verificar se houve erro na conexão
    if ($con->connect_error) {
        echo "Ocorreu um erro no acesso à base de dados: " . $con->connect_error;
        exit;
    }

    // Obter usuário e senha do formulário
    $pass = md5($_POST["password"]); // Supondo que a senha esteja sendo armazenada como MD5 no banco de dados
    $utl = $_POST["utilizador"];

    // Preparar e executar a consulta SQL para verificar o login
    if ($stm = $con->prepare("SELECT * FROM utilizadores WHERE nome_utilizador = ? AND palavra_chave = ?")) {
        $stm->bind_param("ss", $utl, $pass);
        $stm->execute();
        
        // Armazenar o resultado da consulta
        $stm->store_result();

        // Verificar se há pelo menos uma linha correspondente
        if ($stm->num_rows > 0) {
            // Credenciais válidas, criar sessão
            $_SESSION["login"] = true;
            $_SESSION["username"] = $utl; // Armazenar o nome de usuário na sessão, se necessário
            $_SESSION["browser"] = $_SERVER["HTTP_USER_AGENT"]; // Armazenar o user-agent do navegador na sessão

            ?>
            <div class="login-success">
                <h3>Dados válidos. <br> Sessão criada com sucesso!</h3>
                <a href="http://agbatalha.pt" target="_blank">Página Seguinte</a>
                <a href="editar_perfil.php">Editar Informações</a>
                <a href="deletar_perfil.php"><b>Deletar Usuário</b></a>
            </div>
            <?php
        } else {
            // Credenciais inválidas, redirecionar de volta para o formulário de login
            echo '<div class="login-success">';
            echo "Os dados não são válidos. Aguarde...";
            echo '</div>';
            header("Refresh: 5; url=login.php"); // Redirecionar para a página de login após 5 segundos
        }

        // Fechar a consulta preparada
        $stm->close();
    } else {
        echo "Erro na preparação da consulta: " . $con->error;
    }

    // Fechar a conexão com o banco de dados
    $con->close();
    ?>
</body>
</html>
