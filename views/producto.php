<?php
require_once "classes/productos.php";

$id = isset($_GET['id']) ? $_GET['id'] : false;

$componentes = new Productos();

$producto = $componentes->producto_x_id($id);

?>

<div id="producto" class="d-flex justify-content-between align-items-stretch flex-wrap">
    <?PHP if (isset($producto)) { ?>
        <figure class="col-xl-7 col-lg-6 col-sm-12 d-flex justify-content-center align-items-center">
            <img  class="col-8" src="<?= $producto->imagen_big; ?>" alt="<?= $producto->nombre ?>">
        </figure>
        <div class="d-flex flex-column align-items-center justify-conten-evenly col-xl-5 col-lg-6 col-sm-12 ">
            <h1 class="text-center col-12 mt-5 mb-5"><?= $producto->nombre; ?></h1>
            <p class="fs-5"><?= $producto->descripcion; ?></p>
            <p class="fs-1">$<?= $componentes->formatear_precio($producto->precio) ?></p>
            <a class="text-center mt-2" href="index.php?seccion=producto&id=<?= $producto->id ?>">Comprar</a>
        </div>
</div>

<?PHP } else { ?>
    <div class="col">
        <h2 class="text-center m-5 text-danger">No se encontró el producto deseado.</h2>
    </div>
<?PHP } ?>
</div>