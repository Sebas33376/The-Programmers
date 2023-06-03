<?php
require_once "classes/productos.php";

$categorias = isset($_GET['categoria']) ? $_GET['categoria'] : false;

$class_productos = new Productos();

$productos = $class_productos->obtener_productos();

if ($categorias != false) {
    $categoria_filtro = array_filter($productos, function ($busca_categoria) {
        global $categorias;
        return  $busca_categoria->categoria === $categorias;
    });
} else {
    $categoria_filtro = array_filter($productos, function ($busca_categoria) {
        return  $busca_categoria->sub_categoria === "componente";
    });
}


?>

<h1 class="text-center col-12 mt-5 mb-5">Componentes</h1>
<div id="productos" class="d-flex flex-wrap justify-content-center">
    <p id="filtro" class="container-fluid col-10 fs-4"><?= $filtro = $categorias ? ucfirst(str_replace("_", " ", $categorias)) : "Todos los componentes"?></p>
    <?php foreach ($categoria_filtro as $producto) { ?>
        <div class="d-flex flex-column align-items-center justify-conten-evenly col-xxl-2 col-lg-3 col-md-5  col-sm-8">
            <img src="<?= $producto->imagen_small; ?>" alt="<?= $producto->nombre ?>">
            <div class="d-flex flex-column align-items-center justify-conten-end w-100">
                <h2><?= $class_productos->recortar_texto(4, $producto->nombre); ?></h2>
                <p><?= $class_productos->recortar_texto(10, $producto->descripcion); ?></p>
                <p class="text-start fs-5">$<?= $class_productos->formatear_precio($producto->precio) ?></p>
                <a class="text-center mt-2" href="index.php?seccion=producto&id=<?= $producto->id ?>">Ver más</a>
            </div>
        </div>
    <?php }; ?>
</div>