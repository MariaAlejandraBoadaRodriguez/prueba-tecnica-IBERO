<?php

    if(!empty($_POST["btnregistrar"])){
        if (!empty($_POST["nombre"]) &&
            !empty($_POST["referencia"]) &&
            !empty($_POST["precio"]) &&
            !empty($_POST["peso"]) &&
            !empty($_POST["categoria"]) &&
            !empty($_POST["stock"]) &&
            !empty($_POST["date"])
        ) {
            $id=$_POST["id"];
            $nombre=$_POST["nombre"];
            $referencia=$_POST["referencia"];
            $precio=$_POST["precio"];
            $peso=$_POST["peso"];
            $categoria=$_POST["categoria"];
            $stock=$_POST["stock"];
            $date=$_POST["date"];

            $sql=$conexion->query("update productos set nombre='$nombre',referencia='$referencia',precio=$precio,peso=$peso,categoria='$categoria',stock=$stock,fechaCreacion='$date' where id=$id");
            if($sql==1){
                header("location:index.php");
            }else{
                echo '<div class="alert alert-danger">Error Modificación</div>';
            }
        }else {
            echo '<div class="alert alert-warning">Debe diligenciar todos los campos</div>';
        }
        $result->free();
    }

?>


