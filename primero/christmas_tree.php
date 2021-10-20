<html lang="es">
<head>
    <title>Paint your christmas tree</title>
</head>
<body>
<form method="post" action="christmas_tree.php">
    <label>
        Number of flats:
        <input type="text" name="num"/>
    </label>
    <input type="submit"/>
</form>
<div style="background-color: mediumspringgreen; display: inline-block">
<?php
    function pintarEspacios($num){
        for($i=0;$i<$num;$i++){
            echo "&nbsp ";
        }
    }
    function pintarAsteriscos($asteriscos){
        for ($i=0;$i<$asteriscos;$i++){
            echo '*';
        }
    }
if(isset($_POST["num"])){
    $num = intval($_POST["num"]);
    $flats=0;
    $asteriscos=1;
    $espacios= $num;

    for($i=0;$flats<$num;$i++){
        pintarEspacios($espacios);
        pintarAsteriscos($asteriscos);
        pintarEspacios($espacios);
        echo '<br>';
        $flats++;
        $asteriscos+=2;
        $espacios -=1;

    }

}

?>
</div>
</body>
</html>

