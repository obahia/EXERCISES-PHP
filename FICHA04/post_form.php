<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if (!empty($_POST["nome"]) && !empty($_POST["email"]) && !empty($_POST["telefone"]) && !empty($_POST["opcao"]) && !empty($_POST["cursos"])) {
        
        
        echo "<b> Dados dos formulários </b> <br/> ";
        echo "Primeiro nome: " . $_POST["nome"] . "<br />";
        echo "Email: " . $_POST["email"] . "<br />";
        echo "Telefone: " . $_POST["telefone"] . "<br />";
        echo "Curso: " . $_POST["cursos"] . "<br />";
        echo "Opção "  .$_POST["opcao"] . "<br />";
        echo "Assunto: " . $_POST["observacoes"] . "<br />";
        
    }else {
        echo "Por favor, preencha todos os campos obrigatórios";
    }
}




?>