<?php
include ("db.php");
//Si se envia el metodo GET correctamente.
if (isset($_GET['id'])) {
    //Asignación del dato enviado a traves del metodo GET a una variable.
    $id = $_GET['id'];
    //Eliminación de los datos de la BD.
    $query = "DELETE FROM task WHERE id = $id";
    //Ejecución de la función.
    $result = mysqli_query($conn, $query);
    //Verificación del resultado.
    if (!$result)
    {
        die ("Query Failed");
    }
    //Variables para Boostrap.
    $_SESSION['message'] = 'Task Removed Successfully';
    $_SESSION['message_type'] = 'danger';
    //Reedireción a la página principal.
    header("Location: index.php");
}
?>