<?php

require_once(__DIR__ . "/../mdb/mdbCliente.php");

$nombre;
$apellidos;
$email;
$password;
$telefono;
$passwordF;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $telefono = $_POST['telefono'];
}

$errores = [];
if (!$nombre) $errores[] = 'El nombre es obligatorio</br>';
if (!$apellidos) $errores[] = 'Los apellidos son obligatorios</br>';
if (!$email) $errores[] = 'El email es obligatorio</br>';
if (!$password) $errores[] = 'La contraseña es obligatoria</br>';
if (!$telefono) $errores[] = 'El teléfono es obligatorio';


if (!empty($errores)) {
    echo json_encode($errores, JSON_UNESCAPED_UNICODE);
    exit;
} else {
    $passwordF = password_hash($password, PASSWORD_DEFAULT);
}

$cliente = new Cliente(NULL, $nombre, $apellidos, $email, $passwordF, $telefono);

$resultado = registrarCliente($cliente);

if ($resultado == -1) {
    $errores = [];
    $errores[] = 'El email ya ha sido registrado en otra cuenta';
}

echo json_encode($errores, JSON_UNESCAPED_UNICODE);
