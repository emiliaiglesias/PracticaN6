<html>
<head>
    <title>Baja</title>
</head>
<body>
<?php
include("Conexion.php");

if (!isset($_POST['id']) || empty($_POST['id'])) {
    echo "No se recibió el ID de la ciudad.<br>";
    echo "<a href='FormBajaIni.html'>Volver</a>";
    exit;
}

$vID = $_POST['id'];

$vSql = "SELECT * FROM ciudades WHERE id='$vID'";
$vResultado = mysqli_query($link, $vSql);

if (mysqli_num_rows($vResultado) == 0) {
    echo "Ciudad no registrada...!!! <br>";
    echo "<a href='FormBajaIni.html'>Continuar</a>";
} else {
    $vSql = "DELETE FROM ciudades WHERE id = '$vID'";
    mysqli_query($link, $vSql);
    echo "La ciudad fue borrada <br>";
    echo "<a href='Menu.html'>Volver al Menú del ABM</a>";
}

mysqli_free_result($vResultado);
mysqli_close($link);
?>
</body>
</html>