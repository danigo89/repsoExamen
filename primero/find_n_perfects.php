<html lang="es">
<head>
    <title>Find N perfect numbers</title>
</head>
<body>
<form method="post" action="find_n_perfects.php">
    <label>
        Number:
        <input type="text" name="num"/>
    </label>
    <input type="submit"/>
</form>
<div>
<?php
function getDivisors($num){
    $divisores= Array();
    for ($i=1;$i<$num;$i++){
        if($num % $i == 0){
            $divisores[]= $i;
        }
    }
    return $divisores;
}

function isPerfectNum($num){
    $divisores = getDivisors($num);
    if(array_sum($divisores) == $num){
        return true;
    }else {
        return false;
    }
}

if(isset($_POST["num"])){
    $num = intval($_POST["num"]);

    $numPerfectos = Array();
    for ($i=1;count($numPerfectos)<$num;$i++){
        if(isPerfectNum($i)){
            $numPerfectos[]= $i;
        }
    }
    echo "Los ".$num." primeros números perfectos son;<br>";
    foreach ($numPerfectos as $num){
        echo "--> ".$num."<br>";
    }
}
?>
</div>
</body>
</html>
