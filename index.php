<?php
if (isset($_POST["registrar"])) {
    $dni = htmlentities($_POST["dni"]);

    setcookie('dni', $dni, time() + 3600);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud - php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/be63b51952.js" crossorigin="anonymous"></script>
</head>

<body>
    <h1 class="text-center">DASHBOARD</h1>
    <?php
    include "controlador/eliminar_persona.php";
    ?>
    <div class="container-fluis row" style="padding-left: 40px">
        <form class="col-3" method="POST">
            <h3 class="text-center text-secondary">Registro de Clientes</h3>
            <?php
            include "modelo/conexion.php";
            include "controlador/registro_persona.php";
            ?>
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre">
            </div>
            <div class="mb-3">
                <label for="nombre" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="apellido">
            </div>
            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" name="dni">
            </div>
            <div class="mb-3">
                <label for="nacimiento" class="form-label">Fecha Nacimiento</label>
                <input type="date" class="form-control" name="nacimiento">
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" name="correo">
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono</label>
                <input type="text" class="form-control" name="telefono">
            </div>
            <button type="submit" class="btn btn-primary" name="registrar" value="ok">Registrar</button>
        </form>

        <div class="col-8 p-4">
            <table class="table">
                <thead class="table-info">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">DNI</th>
                        <th scope="col">F. Nacimiento</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "modelo/conexion.php";
                    $sql = $conexion->query(" select * from persona ");
                    while ($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <td><?= $datos->id ?></td>
                            <th><?= $datos->nombre ?></th>
                            <td><?= $datos->apellido ?></td>
                            <td><?= $datos->dni ?></td>
                            <td><?= $datos->nacimiento ?></td>
                            <td><?= $datos->correo ?></td>
                            <td><?= $datos->telefono ?></td>
                            <td>
                                <a href="modificar_persona.php?id=<?= $datos->id ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <button class="btn btn-small btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal" data-id="<?= $datos->id ?>"><i class="fa-solid fa-trash"></i></button>
                                <!--<a href="index.php?id=<?= $datos->id ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>-->
                            </td>
                        </tr>
                    <?php }
                    ?>

                </tbody>
            </table>
        </div>

        <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmModalLabel">Confirmar Eliminación</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ¿Estás seguro de que deseas eliminar este registro?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <a href="#" id="confirmDeleteButton" class="btn btn-danger">Eliminar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        var confirmModal = document.getElementById('confirmModal');
        confirmModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var confirmDeleteButton = document.getElementById('confirmDeleteButton');
            confirmDeleteButton.href = 'index.php?id=' + id;
        });
    </script>

</body>

</html>