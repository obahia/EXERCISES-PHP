<?php
//Crie um algoritmo utilizando uma função com dois argumentos (nome e idade) e exiba no
//browser o nome e idade de três pessoas, p. ex: “O João tem 25 anos”.

function exibirnome ($nome, $idade){

    echo "O {$nome} tem {$idade} anos <br> <br>";
}

exibirnome("João", 25);
exibirnome("Rodrigo", 40);
exibirnome("Leonardo", 15);


?>