<?php
//Construa um algoritmo que permite ler um número e calcule a respetiva tabuada.
//(Obs. O número está armazenado numa variável)

$num = 2;
echo "TABUADA DO 2 <br>" ;
for ($i=1; $i <11 ; $i++) { 
$result = $num * $i;
echo "{$num} x {$i} = {$result} <br>";
}

?>