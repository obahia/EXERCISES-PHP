<?php
session_start();

$con = new mysqli("localhost", "root", "", "guest_users");

// Verificar se houve erro na conexão
if ($con->connect_error) {
    echo "Ocorreu um erro no acesso à base de dados: " . $con->connect_error;
    exit;
}

// Obter usuário e senha do formulário
$utilizador = $_POST["utilizador"];
$senha = md5($_POST["password"]); // Supondo que a senha esteja sendo armazenada como MD5 no banco de dados
$email = $_POST["email"];

// Preparar e executar a inserção no banco de dados
if ($stm = $con->prepare("INSERT INTO utilizadores (email, nome_utilizador, palavra_chave) VALUES (?,?, ?)")) {
    $stm->bind_param("sss", $email, $utilizador, $senha);
    if ($stm->execute()) {
        echo "Conta criada com sucesso! Você será redirecionado para a página de login.";
        header("Refresh: 5; url=login.php"); // Redirecionar para a página de login após 5 segundos
    } else {
        echo "Erro ao criar a conta: " . $stm->error;
    }
    $stm->close();
} else {
    echo "Erro na preparação da consulta: " . $con->error;
}

$con->close();
?>
