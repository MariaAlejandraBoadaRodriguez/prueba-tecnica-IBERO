<?php

    if(!empty($_POST["listado"])){
        $listado = json_decode($_POST["listado"],true);
        foreach ($listado as $producto) {
            actualizarStock($producto["id"], $producto["cantidad"]);
        }
    }

    // Función para actualizar el stock de un producto en la base de datos
    function actualizarStock($id, $cantidad) {
        global $conexion;
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
                    echo '<div class="alert alert-success">Se ha vendido exitosamente</div>'; 
                } else {
                    echo '<div class="alert alert-danger">Error al actualizar el stock</div>'; 
                }
            } else {
                echo "No se puede realizar la venta debido a que no hay suficiente stock del producto";
            }
        } else {
            echo '<div class="alert alert-danger">No se encontró el producto con ID</div>';
        }
    }
?>