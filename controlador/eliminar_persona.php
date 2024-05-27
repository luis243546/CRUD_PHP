<?php

include "modelo/conexion.php";

if (!empty($_GET["id"])) {
    $id = $_GET["id"];
    $sql = $conexion->query("delete from persona where id=$id");
    if ($sql == 1) {
        echo '<div class="alert alert-success">Registro eliminado exitosamente</div>';
    } else {
        echo '<div class="alert alert-danger">Error al eliminar registro</div>';
    }
}
