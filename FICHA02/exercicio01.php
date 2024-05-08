<?php
 
 $pais = "Portugal";
 $quantidadeC = substr($pais, 3, 2);
 $maiscula = strtoupper($pais);

 echo "SUA PALAVRA: {$pais} <br> <br>";
 echo "4º e 5º CARACTER: {$quantidadeC} <br> <br>";
 echo 'NÚMERO DE CARACTERES: '. strlen($pais) . '<br> <br>';
 echo "SUA PALAVRA EM MAIÚSCULA: {$maiscula}";








?>