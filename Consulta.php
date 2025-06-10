<html>
    <head>
        <title>Listado completo</title>
    </head>
    <body>
        <?php
        include("Conexion.php");
        $vSql = "SELECT * FROM ciudades";
        $vResultado = mysqli_query($link, $vSql);
        $total_registros = mysqli_num_rows($vResultado);
        ?>
        <table border="1">
            <tr>
                <td><b>ID</b></td>
                <td><b>Ciudad</b></td>
                <td><b>País</b></td>
                <td><b>Habitantes</b></td>
                <td><b>Superficie</b></td>
                <td><b>Metro</b></td>
            </tr>
            <?php
            while ($fila = mysqli_fetch_array($vResultado)) {
            ?>
            <tr>
                <td><?php echo $fila['id']; ?></td>
                <td><?php echo $fila['ciudad']; ?></td>
                <td><?php echo $fila['país']; ?></td>
                <td><?php echo $fila['habitantes']; ?></td>
                <td><?php echo $fila['superficie']; ?></td>
                <td><?php echo $fila['tieneMetro'] == 1 ? 'Sí' : 'No'; ?></td>
            </tr>
            <?php
            }
            mysqli_free_result($vResultado);
            mysqli_close($link);
            ?>
        </table>
        <p>&nbsp;</p>
        <p align="center"><a href="Menu.html">Volver al menú del ABM</a></p>
    </body>
</html>