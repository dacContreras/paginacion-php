<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <title>Articulos Amazon</title>
</head>

<body>
    <div class="contenedor">
        <h1>Articulos</h1>
        <section class="articulos">
            <!-- seccion de los articulos -->
            <ul>
                <!-- aca iteramos los archivos para mostrarlos uno a uno -->
                <?php foreach ($articulos as $articulo) : ?>
                    <li>
                        <?php echo $articulo['id'] . '.- ' . $articulo['articulo'] ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>
        <!-- parte de la paginacion -->
        <section class="paginacion">
            <ul>
                <!-- aca dependiendo la pagina habilita o desabilita el boton -->
                <?php if ($pagina == 1) : ?>
                    <li class="disabled">&laquo;</li>
                <?php else : ?>
                    <li><a href="?pagina=<?php echo $pagina - 1 ?> ">&laquo;</a></li>
                <?php endif; ?>
                <?php
                // esto muestra la cantidad de paginas que hay
                for ($i = 1; $i <= $numeroPaginas; $i++) {
                    if ($pagina == $i) {
                        echo "<li class='active'><a href='?pagina=$i'>$i</a></li>";
                    } else {
                        echo "<li><a href='?pagina=$i'>$i</a></li>";
                    }
                }
                ?>

                <!-- aca dependiendo la pagina habilita o desabilita el boton -->
                <?php if ($pagina == $numeroPaginas) : ?>
                    <li class="disabled">&raquo;</li>
                <?php else : ?>
                    <li><a href="?pagina=<?php echo $pagina + 1 ?> ">&raquo;</a></li>
                <?php endif; ?>
            </ul>
        </section>
    </div>
</body>

</html>