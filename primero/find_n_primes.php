<html lang="es">
<head>
    <title>Find N prime numbers</title>
</head>
<body>
<form method="post" action="find_n_primes.php">
    <label>
        Number:
        <input type="text" name="num"/>
    </label>
    <input type="submit"/>
</form>
<div>
<?php
function getDivisors($num)
{
//TODO: YOUR CODE HERE
    $divisores = Array();
    for ($i=1;$i<$num;$i++){
        if($num%$i==0){
            $divisores[]=$i;
        }
    }
    return $divisores;
}
function isPrimeNum($num)
{
//TODO: YOUR CODE HERE
    $divisores =getDivisors($num);
    if(count($divisores) ==2){
        return true;
    }else {
        return false;
    }

}

if(isset($_POST["num"])){
    $num = intval($_POST["num"]);

    $primos = Array();
    for ($i=0;count($primos)<$num ;$i++){

        if(isPrimeNum($i)){
            $primos[]=$i;
        }
    }
    echo "Los ".$num." primeros números primos son:<br>";
    foreach ($primos as $primo){
        echo "- ".$primo."<br>";
    }
}

?>



</div>
</body>
</html>


