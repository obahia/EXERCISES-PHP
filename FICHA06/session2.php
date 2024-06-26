<?php

session_start();

if ($_SESSION["login"]==1 && $_SESSION["browser"]==$_SERVER["HTTP_USER_AGENT"]) {
    echo "A sessão está ativa!";
}
else {
    echo "A sessão não está ativa.<br />";
    echo '<a href="agbatalha.pt,">Página de login</a>';
}

session_unset();

session_destroy();