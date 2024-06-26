<?php
session_start();

$con = new mysqli("localhost", "root", "", "guest_users");

// Verificar se houve erro na conexão
if ($con->connect_error) {
    echo "Ocorreu um erro no acesso à base de dados: " . $con->connect_error;
    exit;
}

// Obter dados do formulário de edição
$id = $_POST['id'];
$email = $_POST['email'];
$utilizador = $_POST['utilizador'];
$senha = $_POST['password'];

// Verificar se a senha foi fornecida e gerar hash MD5
if (!empty($senha)) {
    $senha = md5($senha);
} else {
    // Se a senha estiver vazia, manter a senha existente no banco de dados
    $sql_select_senha = "SELECT palavra_chave FROM utilizadores WHERE id = ?";
    if ($stm_select_senha = $con->prepare($sql_select_senha)) {
        $stm_select_senha->bind_param("i", $id);
        $stm_select_senha->execute();
        $stm_select_senha->bind_result($senha_bd);
        $stm_select_senha->fetch();
        $senha = $senha_bd;
        $stm_select_senha->close();
    } else {
        echo "Erro ao selecionar senha do banco de dados: " . $con->error;
    }
}

// Preparar e executar a atualização no banco de dados
if ($stm = $con->prepare("UPDATE utilizadores SET email = ?, nome_utilizador = ?, palavra_chave = ? WHERE id = ?")) {
    $stm->bind_param("sssi", $email, $utilizador, $senha, $id);
    if ($stm->execute()) {
        echo "Perfil atualizado com sucesso!";
        echo '<br><a href="login.php">Voltar para o Perfil</a>';
    } else {
        echo "Erro ao atualizar perfil: " . $stm->error;
    }
    $stm->close();
} else {
    echo "Erro na preparação da consulta: " . $con->error;
}

$con->close();
?>
