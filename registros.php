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
<?php
include "controlador/eliminar_persona.php";
?>

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
                        <a class="nav-link" href="footer.php">Contactos</a>
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

    <?php
    include "controlador/eliminar_persona.php";
    ?>
    <div class="container-fluis row" style="padding-left: 40px">

        <div class="modal fade" id="registroModal" tabindex="-1" aria-labelledby="registroModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="registroModalLabel">Registro de Clientes</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="col-12" method="POST">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <h1 class="text-center">Administrar Clientes</h1>
    <div class="col-12 p-4">
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

    <?php include 'footer.php'; ?>

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