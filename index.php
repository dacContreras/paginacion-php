<!-- COMENTARIO SOBRE LA BASE DE DATOS QUE SE NECESITA -->
<!-- 
    SOLO SE NECESITA QUE TENGA ESTOS DATOS (HEIDISQL)
    - una tabla llamada "articulos"
    - columna1: id INT AUTO INCREMENT PRIMARY
    - columna2: articulo TEXT sin valor predeterminado
    - asi como esta escrito aca deberia de estar al momento de
      volver a crearla
 -->
<?php
// usamos trycatch por lo errores
try {
    // conectamos la base de datos
    $conexion = new PDO('mysql:host=localhost;dbname=paginacion_practica', 'root', '');
} catch (PDOEXception $e) {
    echo "ERROR: " . $e->getMessage();
    // matamos la pagina si hay algun error
    die();
}


// la variable pagina esat seteada y tomamos su valor entero
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$postPorPagina = 5;

// saber desde donde vamos a traer los articulos
$inicio = ($pagina > 1) ? ($pagina * $postPorPagina - $postPorPagina) : 0;

// consulta sql
$articulos = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos LIMIT $inicio, $postPorPagina");

// ejecutar consulta
$articulos->execute();
$articulos = $articulos->fetchAll();

// si no hay articulos, redigirir a index.php
if (!$articulos) {
    header('Location: index.php');
}

// consulta para saber cantidad de articulos
$totalArticulos = $conexion->query('SELECT FOUND_ROWS() as total');
$totalArticulos = $totalArticulos->fetch()['total'];

// numero de paginas (CEIL PARA REDONDEAR HACIA ARRIBA)
$numeroPaginas = ceil($totalArticulos / $postPorPagina);

require 'index.view.php';
