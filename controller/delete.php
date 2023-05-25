<?php

    if(!empty($_GET["id"])){
        $id=$_GET["id"];
        $sql=$conexion->query(" delete from productos where id=$id ");
        if($sql==1){
            header("location:index.php");
        }else{
            echo '<div class="alert alert-danger">Error al Eliminar</div>';
        }
        $result->free();
    }
?>