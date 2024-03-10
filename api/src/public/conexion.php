<?php
include '../../vendor/adodb/adodb-php/adodb.inc.php';


//funcion para crear el objeto de conexión
function conectar()
{
    //Driver de conexion a mysql
    $db = NewADOConnection('mysqli');

    //datos de conexión
    $server        = "localhost";
$username    = "just";
$password    = "jjcc01";
$bd            = "bd_proyectoinm";

    $db→debug = true;
    //crea el objeto
    $db->connect(
        $server,
        $username,
        $password,
        $bd
    );

    return $db;
}
