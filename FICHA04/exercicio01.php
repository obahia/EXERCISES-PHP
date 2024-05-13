<?php
$A = 5;
$B = 1;
$C = 7;
$D = 2;

$soma = $A + $C;
$mult = $B * $D;

echo "A soma entre {$A} e {$C}: {$soma} <br> <br>";

echo "A multiplicação  entre {$B} e {$D}: {$mult} <br> <br>";


if ($soma > $mult) {
    echo "{$A} + {$C} é maior que {$B} * {$D} <br> <br>";
}elseif ($soma < $mult) {
    echo "{$A} + {$C} é menor que {$B} * {$D} <br> <br>";

} else {
    echo "{$A} + {$C} são iguais  {$B} * {$D} <br> <br>";
}

?>