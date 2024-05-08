<?php

$a = array("a" => "maçã", "b" => "banana");

$b = array("a" =>"kiwi", "b" => "ananás", "c" =>"morango");


//a. Exiba no browser a união de $a e $b
$result = array_merge($a , $b);
echo "JUNÇÃO DA ARRAY A e B <br> <br>";
print_r ($result);
echo "<br> <br>";

echo "JUNÇÃO DA ARRAY B e A <br> <br>";

//b. Exiba no browser a união de $b e $a
$result = array_merge($b , $a);
print_r ($result);



?>