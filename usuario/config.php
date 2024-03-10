<?php
//datos del servidor
$server        = "localhost";
$username    = "just";
$password    = "jjcc01";
$bd            = "bd_proyectoinm";


$conn = mysqli_connect($server, $username, $password, $bd);
$mysqli= new mysqli("localhost","just","jjcc01","bd_proyectoinm");

if (!$conn) {
    die("Conexión fallida:" . mysqli_connect_error());
}
