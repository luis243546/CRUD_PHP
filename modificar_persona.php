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

    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Volver</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registros.php">Registros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true" href="footer.php">Contactos</a>
                    </li>
                </ul>
            </div>
            <div class="ml-auto">
                <button type="button" class="btn btn-primary mb-3 d-flex align-items-center justify-content-center" style="width: 100px; height: 40px;" data-bs-toggle="modal" data-bs-target="#registroModal">
                    Agregar Cliente
                </button>
            </div>
        </div>
    </nav>
    <br>
    <br>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form class="col-4 mx-auto" method="POST">
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
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>