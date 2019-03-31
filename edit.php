<?php
include ("db.php");
//Si se envia el metodo GET correctamente.
if (isset($_GET['id']))
{
    //Asignación del dato enviado a traves del metodo GET a una variable.
    $id = $_GET['id'];
    //Selección del dato de la BD a traves de un filtro.
    $query = "SELECT * FROM task WHERE id = $id";
    //Ejecución de la función.
    $result = mysqli_query($conn, $query);
    //Verificación de cuantas veces envias los datos la BD y si pasa solo 1 realiza lo siguiente.
    if (mysqli_num_rows($result) == 1)
    {
        //Asignación de los datos de la BD a las variables.
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];
    }
}
//Si se envia el metodo POST (la información del formulario que esta mas abajo) correctamente.
if (isset($_POST['update']))
{
    //Asignación de los datos a las variables.
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    //Actualización del dato de la BD.
    $query = "UPDATE task set title = '$title', description = '$description' WHERE id = $id";
    //Ejecución de la función.
    $result = mysqli_query($conn, $query);
    //Variables para Boostrap.
    $_SESSION['message'] = 'Task Updated Successfully';
    $_SESSION['message_type'] = 'warning';
    //Reedireción a la página principal.
    header("Location: index.php");
}
?>

<?php include ("includes/header.php") ?>

    <div class="conatiner p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                    <!--Formulario para actualizar-->
                    <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" value="<?php echo $title; ?>" placeholder="Update Title">
                        </div>
                        <div class="form-group">
                            <textarea name="description" rows="2" class="form-control" placeholder="Update Description"><?php echo $description; ?></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success btn-block" name="update" value="Update Task">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include ("includes/footer.php") ?>