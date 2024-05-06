<?php
  $valorsemIVA = 78;
  $iva = 23;
  $valorcomIVA = $valorsemIVA * ($iva / 100);
  
  $total = $valorsemIVA + $valorcomIVA;
   
  echo "João foi a oficina e precisou gastar {$valorsemIVA} <br>
       com 23% de IVA aplicado o valor final foi de: {$total}";


?>