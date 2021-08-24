<?php

include("db.php");

if (isset($_POST['save_task'])){
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    $query = "INSERT INTO tareas(titulo, descripcion) VALUES ('$titulo', '$descripcion')"; 
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query fallido");
    }

    $_SESSION["message"] = "Tarea guardada";
    $_SESSION["message_type"] = "success";

    header("Location: index.php");
}

?>