<html>
<head>
<title>Modificacion</title>
</head>
<body>
<?php
include ("Conexion.php");

$id = $_POST['id'];

$vSql = "SELECT * FROM ciudades WHERE id = '$id'";
$vResultado = mysqli_query($link, $vSql) or die(mysqli_error($link));
$fila = mysqli_fetch_array($vResultado);

if(mysqli_num_rows($vResultado) == 0) {
    echo ("Ciudad no registrada...!!! <br>");
    echo ("<A href='FormModiIni.html'>Continuar</A>");
} else {
?>
<FORM action="Modi.php" method="POST" name="FormModi">
    <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
    <table width="356">
        <tr>
            <td width="103"> Ciudad: </td>
            <td width="243">
                <input type="text" name="ciudad" value="<?php echo($fila['ciudad']); ?>">
            </td>
        </tr>
        <tr>
            <td width="103"> País: </td>
            <td width="243">
                <input type="text" name="pais" size="20" maxlength="20" value="<?php echo($fila['país']); ?>">
            </td>
        </tr>
        <tr>
            <td width="103"> Habitantes: </td>
            <td width="243">
                <input type="text" name="habitantes" size="20" maxlength="20" value="<?php echo($fila['habitantes']); ?>">
            </td>
        </tr>
        <tr>
            <td width="103"> Superficie: </td>
            <td width="243">
                <input type="text" name="superficie" size="20" maxlength="40" value="<?php echo($fila['superficie']); ?>">
            </td>
        </tr>
        <tr>
            <td width="103"> Metro: </td>
            <td width="243">
                <select name="opcion">
                    <option value="1" <?php if ($fila['tieneMetro'] == 1) echo 'selected'; ?>>Sí</option>
                    <option value="0" <?php if ($fila['tieneMetro'] == 0) echo 'selected'; ?>>No</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="Submit" value="Modificar">
            </td>
        </tr>
    </table>
</FORM>
<?php
}
mysqli_free_result($vResultado);
mysqli_close($link);
?>
</body>
</html>