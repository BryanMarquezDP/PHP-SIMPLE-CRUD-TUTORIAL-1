<?php
include ("db.php");
//Si se envia el metodo POST correctamente.
if (isset($_POST['save_task']))
{
    //Asignación de la información del formulario dentro de las variables.
    $title = $_POST['title'];
    $description = $_POST['description'];
    //Inserción de datos a la BD.
    $query = "INSERT INTO task (title, description) VALUES ('$title', '$description')";
    //Ejecución de la función.
    $result = mysqli_query($conn, $query);
    //Verificación del resultado.
    if (!$result)
    {
        die ("Query Failed");
    }
    //Variables para Boostrap.
    $_SESSION['message'] = 'Task Saved Succesfully';
    $_SESSION['message_type'] = 'success';
    //Reedirecion a la página principal.
    header ("location: index.php");
}
?>