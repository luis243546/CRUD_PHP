<?php
if (!empty($_POST["registrar"])) {
    if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["dni"]) and !empty($_POST["nacimiento"]) and !empty($_POST["correo"]) and !empty($_POST["telefono"])) {
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $dni = $_POST["dni"];
        $nacimiento = $_POST["nacimiento"];
        $correo = $_POST["correo"];
        $telefono = $_POST["telefono"];

        $sql = $conexion->query("update persona set nombre='$nombre', apellido='$apellido', dni='$dni', nacimiento='$nacimiento', correo='$correo', telefono='$telefono' where id=$id");

        if ($sql == 1) {
            header("location:index.php");
        } else {
            echo "<div class='alert alert-danger'>Error al modificar los datos</div>";
        }
    } else {
        echo "<div class='alert alert-warning'>Campos vacios</div>";
    }
}
