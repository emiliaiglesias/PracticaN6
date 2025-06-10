<html>
<head>
<title>Modificacion</title>
</head>
<body>
<?php
include("Conexion.php");

$id = $_POST["id"];
$ciudad = $_POST["ciudad"];
$pais = $_POST["pais"];
$habitantes = $_POST["habitantes"];
$superficie = $_POST["superficie"];
$tieneMetro = $_POST["opcion"];

$vSql = "UPDATE ciudades 
        SET ciudad = '$ciudad',
        país = '$pais',
        habitantes = '$habitantes',
        superficie = '$superficie',
        tieneMetro = '$tieneMetro'
        WHERE id = '$id'";

mysqli_query($link, $vSql) or die(mysqli_error($link));
echo("La ciudad fue Modificada<br>");
echo("<A href='Menu.html'>Volver al Menu del ABM</A>");

mysqli_close($link);
?>
</body>
</html>