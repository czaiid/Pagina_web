<?php
require 'usuario.php';
require 'conexion.php';

$usuario = $_POST['txtusuario'];
$password = $_POST['txtpassword'];

header('Content-Type: application/json');
echo $respuesta = Usuario::login($usuario, $password);
