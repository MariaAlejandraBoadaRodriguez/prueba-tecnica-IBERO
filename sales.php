<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba Tecnica CRUD PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ea4fd06530.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    // Incluir archivo de conexión a la base de datos
    include "model/conexion.php";

    // Función para obtener todos los productos de la base de datos
    function obtenerProductos() {
        global $conexion;
        $productos = [];

        $sql = "SELECT * FROM productos";
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $productos[] = $row;
            }
        }

        return $productos;
    }

    // Función para actualizar el stock de un producto en la base de datos
    function actualizarStock($id, $cantidad) {
        global $conexion;
        echo "conexion exitosa id=$id, Cantidad=$cantidad, total"; 
        $sql = "SELECT stock FROM productos WHERE id = ".intval($id);
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
            $producto = $result->fetch_assoc();
            $stockActual = $producto["stock"];

            if ($cantidad <= $stockActual) {
                $nuevoStock = $stockActual - $cantidad;
                $updateSql = "UPDATE productos SET stock = $nuevoStock, fechaUltimaVenta = NOW() WHERE id = $id";
                $updateResult = $conexion->query($updateSql);

                if ($updateResult) {
                    echo "Se ha vendido exitosamente $cantidad unidad(es) del producto con ID $id.<br>";
                } else {
                    echo "Error al actualizar el stock del producto con ID $id.";
                }
            } else {
                echo "No se puede realizar la venta debido a que no hay suficiente stock del producto con ID $id.";
            }
        } else {
            echo "No se encontró el producto con ID $id.";
        }
    }

    // Procesar el formulario al hacer clic en el botón "Comprar"
    if (isset($_POST['btnComprar'])) {
        $productosSeleccionados = isset($_POST['productos']) ? $_POST['productos'] : [];
        $cantidadProductos = count($productosSeleccionados);

        if ($cantidadProductos > 0) {
            foreach ($productosSeleccionados as $index => $productoId) {
                $id = $productoId;
                $cantidad = $_POST['cantidad'][$index];

                actualizarStock($id, $cantidad);
            }

            echo "La compra ha sido realizada exitosamente. La base de datos ha sido actualizada.";
            // Otras acciones después de una compra exitosa...
        } else {
            echo "No se ha seleccionado ningún producto para comprar.";
        }
    }
    ?>

    <h1>Venta de Productos</h1>

    <form action="sales.php" method="POST">
        <h2>Adicionar Compra</h2>

        <label for="producto">Producto:</label>
        <select name="productos[]" id="producto">
            <?php
            $productos = obtenerProductos();

            foreach ($productos as $producto) {
                $id = $producto['id'];
                $nombre = $producto['nombre'];

                echo "<option value='$id'>$nombre</option>";
            }
            ?>
        </select>

        <input type="number" placeholder="Cantidad" name="cantidad" id="cantidad" value="">

        <button type="button" onclick="agregarProducto()">Agregar</button>

        <h3>Productos Seleccionados</h3>
        <ul id="productosSeleccionados"></ul>

        <button type="submit" name="btnComprar">Comprar</button>
    </form>


    <script>
        var productosSeleccionados = [];

        function agregarProducto() {
            var productoSelect = document.getElementById('producto');
            var cantidadInput = document.getElementById('cantidad');
            var productoId = productoSelect.value;
            var productoNombre = productoSelect.options[productoSelect.selectedIndex].text;
            var cantidad = parseInt(cantidadInput.value);

            var producto = {
                id: productoId,
                cantidad: cantidad
            };

            productosSeleccionados.push(producto);

            var productosSeleccionadosUl = document.getElementById('productosSeleccionados');
            var nuevoProductoLi = document.createElement('li');
            nuevoProductoLi.textContent = `${productoNombre} - Cantidad: ${cantidad}`;
            productosSeleccionadosUl.appendChild(nuevoProductoLi);

            // Limpiar los campos de selección y cantidad
            productoSelect.value = '';
            cantidadInput.value = '1';
        }
    </script>
    <a href="index.php">Ir a Inicio</a>
</body>
</html>