<?php 

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$consulta = $_POST['consulta'];

echo "<p class='text-center mt-5'>Nombre del usuario: ".$nombre."</p>";
echo "<p class='text-center'>Apellido del usuario: ".$apellido."</p>";
echo "<p class='text-center'>Email del usuario: ".$email."</p>";
echo "<p class='text-center'>Telefono del usuario: ".$telefono."</p>";
echo "<p class='text-center mb-5'>Consulta del usuario: ".$consulta."</p>";