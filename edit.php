<?php

    include("db.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM tareas WHERE id = $id";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $titulo = $row['titulo'];
            $descripcion = $row['descripcion'];
        }
    }

    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];

        $query = "UPDATE tareas set titulo = '$titulo', descripcion = '$descripcion' WHERE ID = $id";
        mysqli_query($conn, $query);

        $_SESSION['message'] = "Tarea actualizada!!";
        $_SESSION['message_type'] = "info";
        header("Location: index.php");
    }

?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input 
                            type="text" 
                            name="titulo" 
                            value="<?php echo $titulo; ?>" 
                            class="form-control" 
                            placeholder="Actualiza"
                        >
                    </div>
                    <div class="form-group">
                        <textarea 
                            name="descripcion" 
                            class="form-control" 
                            placeholder="Descripcion" 
                            rows="2"><?php echo $descripcion; ?>
                        </textarea>
                    </div>
                    <button class="btn btn-success" name="update">
                        Editar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>
