<?php
//Inicio de Sesión.
session_start();
//Conexión con la BD ('Servidor', 'Usuario', 'Clave', 'BD').
$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'tutorial_crud'
);
?>