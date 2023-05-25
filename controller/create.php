<?php
    if (!empty($_POST["btnregistrar"])) {
        if (!empty($_POST["nombre"]) &&
            !empty($_POST["referencia"]) &&
            !empty($_POST["precio"]) &&
            !empty($_POST["peso"]) &&
            !empty($_POST["categoria"]) &&
            !empty($_POST["stock"]) &&
            !empty($_POST["date"])
        ) {

            $nombre=$_POST["nombre"];
            $referencia=$_POST["referencia"];
            $precio=$_POST["precio"];
            $peso=$_POST["peso"];
            $categoria=$_POST["categoria"];
            $stock=$_POST["stock"];
            $date=$_POST["date"];

            $sql=$conexion->query("insert into productos(nombre,referencia,precio,peso,categoria,stock,fechaCreacion)values('$nombre','$referencia',$precio,$peso,'$categoria',$stock,'$date') ");
            if($sql==1){
                header("location:index.php");
            }else{
                echo '<div class="alert alert-danger">Error registro</div>';
            }
        } else {
            echo '<div class="alert alert-warning">Debe diligenciar todos los campos</div>';
        }
        $result->free();
    }
?>
