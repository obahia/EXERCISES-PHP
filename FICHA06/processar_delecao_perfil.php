<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("Location: login.php");
    exit;
}

$con = new mysqli("localhost", "root", "", "guest_users");

if ($con->connect_error) {
    echo "Ocorreu um erro no acesso à base de dados: " . $con->connect_error;
    exit;
}

// Verificar se o ID foi enviado através do formulário
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    
    // Preparar a consulta SQL para deletar o usuário
    if ($stm = $con->prepare("DELETE FROM utilizadores WHERE id_utilizador = ?")) {
        $stm->bind_param("i", $id);
        if ($stm->execute()) {
            // Se a exclusão for bem-sucedida, destruir a sessão e redirecionar para a página de login
            $stm->close();
            session_destroy();
            echo "Usuário deletado com sucesso. Redirecionando para a página de login...";
            header("Refresh: 5; url=login.php");
            exit;
        } else {
            echo "Erro ao deletar usuário: " . $stm->error;
        }
    } else {
        echo "Erro na preparação da consulta: " . $con->error;
    }
} else {
    echo "ID do usuário não fornecido.";
}

// Fechar a conexão com o banco de dados
$con->close();
?>
