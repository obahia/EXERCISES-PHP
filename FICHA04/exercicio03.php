<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>EXEMPLO</title>
</head>
<body>
        
<H2>CALCULAR VALOR</H2>

<form action="" method = "post">
    <label for="preco">Digite o preço:</label>
    <input type="number" id="preco" name="preco" step ="0.1" required>
    <button type="Submit">Calcular IVA</button>
</form>
   


</body>
</html>

<?php
//Realize um algoritmo que crie uma função que calcule o valor do IVA1, a partir de um preço
//introduzido, devolvendo o valor total. Nota: os dados serão inseridos pelo utilizador.
function calcularvalor ($preco)
{
    $iva = 0.23;
    $iva1 = $preco * $iva;

    //calculando o preco + o iva aplicado
    $totaliva = $preco + $iva1;

    // retonar o valor total com o iva
    return $totaliva;
}

//verifiar se o formulario foi submetido
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //verificar se o campo preco esta definido e nao vazio
    if(isset($_POST["preco"]) && ! empty($_POST["preco"]))
    {
        //obter preço inserido pelo usuario
        $precoInserido = floatval($_POST["preco"]);

        echo "<br> O valor total: ", calcularvalor($precoInserido);
    }else
    {
        echo "Insira um valor válido.";

    }
}
?>