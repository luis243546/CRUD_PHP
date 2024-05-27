<?php
if (!empty($_POST["registrar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["dni"]) and !empty($_POST["nacimiento"]) and !empty($_POST["correo"]) and !empty($_POST["telefono"])) {
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $dni = $_POST["dni"];
        $nacimiento = $_POST["nacimiento"];
        $correo = $_POST["correo"];
        $telefono = $_POST["telefono"];

        $sql = $conexion->query("insert into persona(nombre,apellido,dni,nacimiento,correo,telefono)values('$nombre', '$apellido', '$dni', '$nacimiento', '$correo', '$telefono')");

        if ($sql == 1) {
            echo  '<div class="alert alert-success">Persona registrada correctamente</div>';
        } else {
            echo '<div class="alert alert-danger">Error al registrar</div>';
        }
    } else {
        echo '<div class="alert alert-warning">Alguno de los campos esta vacio</div>';
    }
}
