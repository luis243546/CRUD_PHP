<?php

include "modelo/conexion.php";

$id = $_GET["id"];

$sql = $conexion->query("SELECT * FROM persona WHERE id = $id");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Datos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <form class="col-3" method="POST" style="padding-left: 40px; padding-top:20px">
        <h3 class="text-center text-secondary">Actualizar Datos</h3>
        <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
        <?php
        include "controlador/modificar_persona.php";
        while ($datos = $sql->fetch_object()) { ?>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?= $datos->nombre ?>">
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido" value="<?= $datos->apellido ?>">
            </div>
            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni" value="<?= $datos->dni ?>">
            </div>
            <div class="mb-3">
                <label for="nacimiento" class="form-label">Fecha Nacimiento</label>
                <input type="date" class="form-control" name="nacimiento" value="<?= $datos->nacimiento ?>">
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" name="correo" value="<?= $datos->correo ?>">
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono</label>
                <input type="text" class="form-control" name="telefono" value="<?= $datos->telefono ?>">
            </div>
        <?php }
        ?>
        <button type="submit" class="btn btn-primary" name="registrar" value="ok">Actualizar</button>
    </form>
</body>

</html>