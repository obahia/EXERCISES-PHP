<?php
//Elabore um programa em PHP que compare três números inteiros, colocando-os num array
//por ordem crescente. Imprima os três números, utilizando a estrutura “foreach”.
//(Obs. Os números estão armazenados em variáveis)

$array = array(5,7,2);
sort ($array); //ordena uma array em ordem crescente



echo "ARRAY ORGANIZADA EM ORDEM CRESCENTE: ";
foreach ($array as $arrays) {
    echo $arrays . " ";
}

?>