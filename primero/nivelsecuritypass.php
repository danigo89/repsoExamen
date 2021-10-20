<html lang ="es">
<head>
    <title>Nivel de seguridad de password</title>
    <style>
        #submit{
            padding: 1rem;
            width: 90px;
        }
        #pass{
            font-size: 30px;
            width: 350px;
            height: 90px;
            border: 2px solid black;
        }
        body{
            text-align: center;
            margin-top: 4rem;
            background-color: <?php
                     function cambiarColorFondo ($pass){
                $length= strlen($pass);
                if($length <3){
                      echo "indianred";
                }else if($length>=3 && $length<6){
                    echo "mediumpurple";
                }else if( $length>=6 && $length<9) {
                    echo "dodgerblue";
                 }else if ($length>=9 && $length<12){
                        echo "lightgreen";
                }else {
                     echo "green";
                }
            }
             if(isset($_POST["pass"])) {
                  $pass = ($_POST["pass"]);

                  if ($pass != null) {
                 cambiarColorFondo($pass);
                }
             }
            ?>;

    </style>
</head>
<body>
<form method="post" action="nivelsecuritypass.php">
    <h1> Nivel de seguridad de tu contraseña</h1>
    <label>
        <input id="pass" type="password" name="pass" >
        <br><br>

        <input id="submit" type="submit">
    </label>
</form>
<div>
<?php
function calcularPosibilidades($pass) {
        $length = strlen($pass);
        $caracteres = 256;
        $posibilidades=1;
        for ($i=0;$i<$length;$i++){
            $posibilidades =$posibilidades * $caracteres;
        }
        calcularTiempo($posibilidades,$pass);
}
function calcularTiempo ($posibilidades, $pass) {
    $tiempo = $posibilidades/1000;

    $segundos = $tiempo % 60;
    $minTotales= intval($tiempo/60);

    $horasTotales =intval($minTotales/60);
    $minutos = $minTotales %60;

    $diasTotales = intval($horasTotales/24);
    $horas = $horasTotales % 24;

    $mesesTotales = intval($diasTotales/30);
    $dias= $diasTotales % 30;

    $anyos= intval($mesesTotales/12);
    $meses= $mesesTotales %12;

    echo"<div style='display: flex; align-items: center; justify-content: center'><p>";

    if(comprobarComunPass($pass)){
        echo "Tú contraseña es una de las 5 más comunes<br>";
    }else {
        echo "Años: $anyos Meses:$meses Días:$dias Horas:$horas Minutos:$minutos Segundos: $segundos";
    }
    echo "</p></div>";
}
function comprobarComunPass($pass){
    $comunPass =array("123456","123456789","picture1","password","12345678","111111","123123","12345","1234567890","senha") ;

    foreach ($comunPass as $comun){
        if($comun == $pass){
            return true;
        }
    }
    return  false;
}

if(isset($_POST["pass"])){
    $pass = $_POST["pass"];
    if($pass != null){
        calcularPosibilidades($pass);
    }


}
?>
</div>

</body>
</html>
