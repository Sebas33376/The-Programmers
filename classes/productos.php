<?PHP

class Productos {

    public $id;
    public $imagen_small;
    public $imagen_big;
    public $nombre;
    public $descripcion;
    public $precio;
    public $categoria;
    public $sub_categoria;


    public function obtener_productos(): array {
        $productos = [];
        $JSON = file_get_contents("json/productos.json");
        $JSONData = json_decode($JSON);
        foreach($JSONData as $value){
         $producto = new self();
         $producto->id = $value->id; 
         $producto->nombre = $value->nombre;
         $producto->descripcion = $value->descripcion;
         $producto->precio = $value->precio;
         $producto->imagen_small = $value->imagen_small;
         $producto->imagen_big = $value->imagen_big;
         $producto->categoria = $value->categoria;
         $producto->sub_categoria = $value->sub_categoria;

         $productos[] = $producto;
        }
        return $productos;
    }

    public function formatear_precio($precio) : string{
        return number_format($precio, 2, ",","."); 
    }

    public function recortar_texto(int $cantidad = 10, $variable) : string {
        $texto = $variable;
        $array = explode(" ", $texto);
        $resultado = "";
        if (count($array)<= $cantidad) {
            $resultado = $texto;
        } else {
            array_splice($array, $cantidad);
            $resultado = implode(" ", $array)."...";
        }
        return $resultado;
    }

    public function producto_x_id(int $id_producto)
    {
        $producto = $this->obtener_productos();
        foreach ($producto as $datos) {
            if ($datos->id == $id_producto) {
                return $datos;
            }
        }
        return null;
    }
}