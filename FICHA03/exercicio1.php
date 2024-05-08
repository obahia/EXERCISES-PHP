<?php
   $n1 = 10;
   $n2 = 15;
   $n3 = 1;

   $media = ($n1 +$n2 + $n3) / 3;
   $mediaF = number_format ($media, 2);

   if ($mediaF >= 9.5 ) {
      
    echo "Sua média é {$mediaF}, você está aprovado!";

   }elseif ($mediaF > 8 &&  $mediaF < 9.5) {
    
     echo "Sua média é {$mediaF}, você está de recuperação!";

   }elseif ($mediaF <= 8) {
    echo "Sua média é {$mediaF}, você está reprovado!";
   }



?>