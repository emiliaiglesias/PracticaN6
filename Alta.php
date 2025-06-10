<html>
    <head>
        <title>Alta de ciudades</title>
    </head>
    <body>
        <?php
            include("Conexion.php");
            if (isset($_POST["btnalta"])) {
                if (!empty($_POST["ciudad"]) && !empty($_POST["pais"]) && !empty($_POST["habitantes"]) && !empty($_POST["superficie"]) && isset($_POST["opcion"])) {

                    $ciudad = $_POST["ciudad"];
                    $pais = $_POST["pais"];
                    $habitantes = (int)$_POST["habitantes"];
                    $superficie = (float)$_POST["superficie"];
                    $tieneMetro = (int)$_POST["opcion"];

                    $vSql = "SELECT COUNT(ciudad) as canti FROM ciudades WHERE ciudad='$ciudad'";
                    $vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link));
                    $vCantCiudades = mysqli_fetch_assoc($vResultado);

                    if ($vCantCiudades['canti'] != 0) {
                        echo ("La ciudad ya fue cargada.<br>");
                        echo ("<A href='Menu.html'>VOLVER AL ABM</A>");
                    } else {
                        $vSql = "INSERT INTO ciudades (ciudad, país, habitantes, superficie, tieneMetro) VALUES ('$ciudad', '$pais', $habitantes, $superficie, $tieneMetro)";
                        mysqli_query($link, $vSql) or die (mysqli_error($link));
                        echo("La ciudad fue registrada.<br>");
                        echo ("<A href='Menu.html'>VOLVER AL MENÚ</A>");
                    }

                    mysqli_free_result($vResultado);
                } else {
                    echo("Faltan completar campos obligatorios.<br>");
                    echo ("<A href='Menu.html'>VOLVER AL ABM</A>");
                }
            }

            mysqli_close($link);
        ?>
    </body>
</html>