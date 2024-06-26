<?php
function ligarBD($host, $user, $pass, $bd) {
    $con = new mysqli($host, $user, $pass, $bd);

    // Verifica a conexão
    if ($con->connect_error) {
        echo "Ocorreu um erro de ligação à base de dados: " . $con->connect_error;
        return FALSE;
    }

    return $con;
}
?>
