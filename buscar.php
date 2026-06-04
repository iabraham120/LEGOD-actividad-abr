<?php
// Archivo: buscar.php
include 'config.php';

$texto_buscado = "";
$lista_resultados = array();

if (isset($_GET['busqueda'])) {
    $texto_buscado = $_GET['busqueda'];
    
    $sql = "SELECT set_num, name, year, num_parts, theme_id
            FROM sets 
            WHERE name LIKE '%" . $texto_buscado . "%'";

    $resultado_query = mysqli_query($conexion, $sql);
    
    if ($resultado_query) {
        while ($fila = mysqli_fetch_assoc($resultado_query)) {
            $theme_id = $fila["theme_id"];
            
            $sql2 = "SELECT name FROM themes WHERE theme_id = $theme_id";
            $query2 = mysqli_query($conexion, $sql2);
            
            if ($query2) {
                $res = mysqli_fetch_assoc($query2);
                
                if ($res) {
                    $fila["theme_name"] = $res["name"];
                } else {
                    $fila["theme_name"] = "Sin tema";
                }
            }
            
            $lista_resultados[] = $fila;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados de Búsqueda - LEGOD</title>
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>

    <div class="encabezado">
        <h2>LEGOD - Resultados</h2>
        <a href="index.html">Volver al inicio</a>
    </div>

    <div class="contenedor-resultados">
        <!-- PHP --> 
        <h3>Resultados para la palabra: <?php ?></h3>

        <!-- PHP --> 
        <?php
        
        ?>
    </div>

</body>
</html>