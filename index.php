<?php include ("db.php") ?>

<?php include ("includes/header.php") ?>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">
                <!--Inicialización del mensaje de resultado de la operación con Bootstrap-->
                <?php if (isset($_SESSION['message'])) { ?>
                    <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                <?php session_unset(); } ?>
                <!--Fin del mensaje-->

                <!--Inicio del formulario con Boostrap-->
                <div class="card card-body">
                    <form action="save_task.php" method="POST" autocomplete="off">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="Task Title" autofocus>
                        </div>
                        <div class="form-group">
                            <textarea name="description" rows="2" class="form-control" placeholder="Task Description"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success btn-block" name="save_task" value="Save Task">
                        </div>
                    </form>
                </div>
                <!--Fin del formulario-->
            </div>
            <div class="col-md-8">
                    <!--Inicio de la tabla con los resultados de la consulta a la BD-->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //Selección de los datos de la BD.
                            $query = "SELECT * FROM task";
                            //Ejecución de la función de la BD.
                            $result_tasks = mysqli_query($conn, $query);
                            //Bucle: Mientras existan datos realiza lo siguiente.
                            while ($row = mysqli_fetch_array($result_tasks)) { ?>
                            <tr>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><?php echo $row['create_at']; ?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">
                                        <i class="fas fa-marker"></i>
                                    </a>
                                    <a href="delete_task.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!--Fin de la tabla-->
            </div>
        </div>
    </div>

<?php include ("includes/footer.php") ?>