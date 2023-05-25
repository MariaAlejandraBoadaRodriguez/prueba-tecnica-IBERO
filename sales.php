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
    <form id="formulario" action="sales.php" method="POST">
        <?php
        // Incluir archivo de conexión a la base de datos
        include "model/conexion.php";
        include "controller/sales.php";

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

        /* Procesar el formulario al hacer clic en el botón "Comprar"
        if (isset($_POST['btnComprar'])) {
            echo "El if se está ejecutando.";
            $productosSeleccionados = isset($_POST['productos']) ? $_POST['productos'] : [];
            echo "Productos seleccionados: ";
            var_dump($productosSeleccionados); 
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
        }*/

       
        ?>

        
        <h2>Adicionar Compra</h2>

        <label for="producto">Producto:</label>
        <select name="productos" id="producto">
            <?php
            $productos = obtenerProductos();

            echo "<option value='0'>Seleccionar</option>";
            foreach ($productos as $producto) {
                $id = $producto['ID'];
                $nombre = $producto['nombre'];

                echo "<option value='$id'>$nombre</option>";
            }
            ?>
        </select>

        <input type="number" placeholder="Cantidad" name="cantidad" id="cantidad" value="">
        <input type="hidden" name="listado" id="listadoEntrada">


        <button type="button" onclick="agregarProducto()">Agregar</button>

        <h3>Productos Seleccionados</h3>
        <ul id="productosSeleccionados"></ul>

        <button type="submit" name="btnComprar" id="btnComprar" value="ventas ok">Comprar</button>
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
            productoSelect.value = 0;
            cantidadInput.value = '1';
        }
        //Buscar el formulario en HTML
        var formulario = document.getElementById("formulario");
        //Crear un listener para escuchar el submit
        formulario.addEventListener("submit", function(event){
            event.preventDefault();
            var listadoEntrada = document.getElementById('listadoEntrada');
            listadoEntrada.value=JSON.stringify(productosSeleccionados);
            formulario.submit();
        });
    </script>

    
    <a href="index.php">Ir a Inicio</a>
</body>
</html>