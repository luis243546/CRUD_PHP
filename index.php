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
    <style>
        body {
            padding-top: 20px;
            overflow-x: hidden
        }

        .navbar {
            background-color: #f8f9fa;
        }

        .navbar-brand {
            color: #343a40;
            font-weight: bold;

        }

        .navbar-nav .nav-link {
            color: #6c757d;

        }

        .navbar-nav .nav-link:hover {
            color: #495057;

        }

        .home {
            display: grid;
            grid-template-columns: repeat(2, 8fr 1fr);
            gap: 20px;
            padding-left: 250px;
        }

        .card {
            width: 700px;
            height: 500px;
            border: none;
            display: flex;
            align-content: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Bienvenidos</a>
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

        </div>
    </nav>
    <br>
    <br>
    <?php
    include "controlador/eliminar_persona.php";
    ?>
    <br>
    <br>
    <br><br><br>
    <div class="home">
        <div class="card text-center">
            <h1 class="display-4">¡Bienvenido a Mi Sitio Web!</h1>
            <p class="lead">Una página increíble para que puedas incluir en tus proyectos</p>
            <div>
                <a href="registros.php" class="btn btn-primary btn-lg">¡Descubre más!</a>
            </div>
        </div>
        <div class="card" style="overflow: hidden;">
            <img src="./img/uno.jpg">
        </div>

    </div>


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
    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>