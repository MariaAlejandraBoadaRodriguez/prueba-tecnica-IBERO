<?php

    include "model/conexion.php";

    $id=$_GET["id"];
    
    $sql=$conexion->query(" select * from productos where ID=$id ");
?>
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
    <form class="col-5 p-3 m-auto" method="POST">
        <h6 class="text-center alert alert-secondary">Modificar Producto</h6>
        <input type="hidden" name="id" value="<?= $id=$_GET["id"]?>">
        <?php
        include "controller/update.php";
        while($datos = $sql->fetch_object()){ ?>
            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">Nombre del Producto</label>
                <input type="text" class="form-control" name="nombre" value="<?= $datos->nombre?>">
            </div>
            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">Referencia</label>
                <input type="text" class="form-control" name="referencia" value="<?= $datos->referencia?>">
            </div>
            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">Precio</label>
                <input type="number" class="form-control" name="precio" value="<?= $datos->precio?>">
            </div>
            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">Peso</label>
                <input type="number" class="form-control" name="peso" value="<?= $datos->peso?>">
            </div>
            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">Categoria</label>
                <input type="text" class="form-control" name="categoria" value="<?= $datos->categoria?>">
            </div>
            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">Stock</label>
                <input type="number" class="form-control" name="stock" value="<?= $datos->stock?>">
            </div>
            <div class="mb-1">
                <label for="exampleInputEmail1" class="form-label">Fecha de Creación</label>
                <input type="date" class="form-control" name="date" value="<?= $datos->fechaCreacion?>">
            </div>  
        <?php } ?>
        <button type="submit" class="btn btn-success" name="btnregistrar" value="Modificar Ok">Modificar</button>
    </form>
</body>
</html>