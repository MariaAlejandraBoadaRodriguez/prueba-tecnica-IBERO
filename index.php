<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Prueba Tecnica CRUD PHP</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/ea4fd06530.js" crossorigin="anonymous"></script>
        <link rel="icon" href="logo.png">
    </head>
    <body>
        <script>
            function eliminar(){
                var respuesta=confirm("Estas seguro que deseas eliminar un producto");
                return respuesta
            }
        </script>
        <div class="container-fluid row p-1">
            <div class="col-10">
                <h4 class="text-center p-2">GESTIÓN DE PRODUCTOS</h4>
            </div>
            <div class="col-2 m-auto">
            <a href="sales.php" class="btn btn-primary">VENTAS</a>
            </div>
        </div>
        <?php
        include "model/conexion.php";
        include "controller/delete.php";
        ?>
        <div class="container-fluid row">
            <form class="col-2" method="POST">
                <h6 class="text-center alert alert-secondary">Registrar Producto</h6>
                <?php
                include "controller/create.php";
                ?>
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">Nombre del Producto</label>
                    <input type="text" class="form-control" name="nombre">
                </div>
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">Referencia</label>
                    <input type="text" class="form-control" name="referencia">
                </div>
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">Precio</label>
                    <input type="number" class="form-control" name="precio">
                </div>
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">Peso</label>
                    <input type="number" class="form-control" name="peso">
                </div>
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">Categoria</label>
                    <input type="text" class="form-control" name="categoria">
                </div>
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">Stock</label>
                    <input type="number" class="form-control" name="stock">
                </div>
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label">Fecha de Creación</label>
                    <input type="date" class="form-control" name="date">
                </div>
                <button type="submit" class="btn btn-success" name="btnregistrar" value="Registro Ok">Regristrar</button>
            </form>
            <div class="col-10 p-3">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Referencia</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Peso</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Fecha Creación</th>
                            <th scope="col">Fecha Ultima Venta</th>
                            <th scope="col">Gestión</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "model/conexion.php";
                        $sql = $conexion->query("select * from productos");
                        while ($datos = $sql->fetch_object()) { ?>
                            <tr>
                                <th scope="row"><?= $datos->ID ?></th>
                                <td><?= $datos->nombre ?></td>
                                <td><?= $datos->referencia ?></td>
                                <td><?= $datos->precio ?></td>
                                <td><?= $datos->peso ?></td>
                                <td><?= $datos->categoria ?></td>
                                <td><?= $datos->stock ?></td>
                                <td><?= $datos->fechaCreacion ?></td>
                                <td><?= $datos->fechaUltimaVenta ?></td>
                                <td>
                                    <a href="update.php?id=<?= $datos->ID ?>" class="btn btn-small btn-warning"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a onclick="return eliminar()" href="index.php?id=<?= $datos->ID ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                </td> 
                            </tr>    
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>