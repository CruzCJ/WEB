<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../../vendor/autoload.php';
require 'conexion.php';
//instanciando el objeto slim
$app = new \Slim\App;

//endpoints administrar un usuario
//consultar usuarios
$app->get('/listUsuarios', function (Request $request, Response $response, array $args) {
    $db = conectar();
    $db->setFetchMode(ADODB_FETCH_ASSOC); //REGRSARNOS UN ARREGLO ASOCIATIVO CON LOS RESULTADOS
    $sql = "SELECT * FROM usuario";
    $res = $db->GetAll($sql);
    $response->getBody()->write(json_encode($res));

    return $response;
});
//consultar un usuario por id
$app->get('/listUsuarios/{id}', function (Request $request, Response $response, array $args) {
    $db = conectar();
    $db->setFetchMode(ADODB_FETCH_ASSOC); //REGRSARNOS UN ARREGLO ASOCIATIVO CON LOS RESULTADOS
    $sql = "SELECT * FROM usuario WHERE id=$args[id]";
    $res = $db->GetRow($sql);
    $response->getBody()->write(json_encode($res));

    return $response;
});

//insertar un usuario
$app->post('/insUsuario', function (Request $request, Response $response, array $args) {
    $db = conectar();
    $queryParams = $request->getQueryParams();

    // Verificar si se proporcionó una imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        // Ejecutar la inserción del usuario
        $res = $db->autoExecute("usuario", $queryParams, "INSERT");
        
        // Verificar si la inserción tuvo éxito
        if ($res == 1) {
            // Obtener el ID del usuario insertado
            $idInsertado = $db->Insert_ID();
            
            // Obtener la extensión del archivo
            $extension = "jpg"; // Cambiar la extensión a jpg
            
            // Generar el nombre del archivo
            $nomArchivo = "../../../imgClientes/upload/{$idInsertado}.{$extension}";
            
            // Mover el archivo a la carpeta deseada
            move_uploaded_file($_FILES['imagen']['tmp_name'], $nomArchivo);
            
            // Asignar el nombre del archivo al parámetro de la imagen
            $queryParams['imagen'] = "{$idInsertado}.{$extension}";

            $msg = "Insertando";
        } else {
            $msg = "Error al insertar usuario";
        }
    } else {
        $msg = "Error al subir la imagen";
    }

    $response->getBody()->write($msg);
    return $response;
});




//modificar un usaurio
$app->post('/updUsuario', function (Request $request, Response $response, array $args) {
    $db = conectar();
    $rec = $request->getQueryParams();

    // Verificar si se proporcionó una imagen
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
        $nomArchivo = "../../../imgClientes/upload/$rec[id].jpg";
        move_uploaded_file($_FILES['imagen']['tmp_name'], $nomArchivo);
        // Asignar el nombre del archivo al parámetro de la imagen
        $rec['imagen'] = "$rec[id].jpg";
    }

    $db->autoExecute("usuario", $rec, 'UPDATE', "id = $rec[id]");
    $response->getBody()->write("Modificando Usuario");
    return $response;
});


//eliminar un usuario
$app->delete('/delUsuario/{id}', function (Request $request, Response $response, array $args) {
    $id = $args["id"];
    $db = conectar();
    $sql = "DELETE FROM usuario  WHERE id=$id";
    $db->execute($sql);
    $response->getBody()->write("Eliminando Usuario");

    return $response;
});

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



//consultar propiedades
$app->get('/listPropiedad', function (Request $request, Response $response, array $args) {
    $db = conectar();
    $db->setFetchMode(ADODB_FETCH_ASSOC); //REGRSARNOS UN ARREGLO ASOCIATIVO CON LOS RESULTADOS
    $sql = "SELECT * FROM propiedades";
    $res = $db->GetAll($sql);
    $response->getBody()->write(json_encode($res));

    return $response;
});

$app->get('/listPropiedad/{id}', function (Request $request, Response $response, array $args) {
    $db = conectar();
    $db->setFetchMode(ADODB_FETCH_ASSOC); //REGRSARNOS UN ARREGLO ASOCIATIVO CON LOS RESULTADOS
    $sql = "SELECT * FROM propiedades WHERE id=$args[id]";
    $res = $db->GetRow($sql);
    $response->getBody()->write(json_encode($res));

    return $response;
});

$app->post('/insPropiedad', function (Request $request, Response $response, array $args) {
    $db = conectar();
    $params = $request->getQueryParams();

    if (isset($_FILES['imagen']) && isset($_FILES['imagen']['tmp_name'])) {
        $imagenes = $_FILES['imagen'];

        // Insertar los datos de la propiedad en la tabla "propiedades"
        $res = $db->autoExecute("propiedades", $params, "INSERT");

        // Generar el ID de la propiedad insertada
        $idInsertado = $db->Insert_ID();

        // Iterar por todas las imágenes y guardarlas en la base de datos y en el servidor
        foreach ($imagenes['tmp_name'] as $key => $tmp_name) {
            // Generar un nombre de archivo único para cada imagen
            $nombreImagen = $idInsertado . "_" . $key . ".jpg";

            // Insertar los datos de la imagen en la tabla "imagenes"
            $img = array(
                "nombre" => $nombreImagen,
                "id_propiedad" => $idInsertado
            );
            $resImagen = $db->autoExecute("imagenes", $img, "INSERT");

            // Mover el archivo de la imagen a la carpeta deseada
            $rutaImagen = "../../../imgPropiedades/upload/" . $nombreImagen;
            move_uploaded_file($tmp_name, $rutaImagen);
        }

        // Devolver una respuesta con un mensaje indicando que se han insertado los datos correctamente
        $msg = ($res == 1) ? "Propiedad insertada correctamente" : "Error al insertar la propiedad";
    } else {
        // Si no se recibió ninguna imagen, simplemente insertar los datos de la propiedad
        $res = $db->autoExecute("propiedades", $params, "INSERT");
        $msg = ($res == 1) ? "Propiedad insertada correctamente" : "Error al insertar la propiedad";
    }

    $response->getBody()->write($msg);
    return $response;
});



//modificar una Propiedad
$app->post('/updPropiedad', function (Request $request, Response $response, array $args) {
    $db = conectar();
    $rec = $request->getQueryParams();
    $imagenes = $_FILES['imagen'];

    $res = $db->autoExecute("propiedades", $rec, 'UPDATE', "id = $rec[id]");

    // Obtener la lista actual de imágenes para la propiedad
    $result = $db->Execute("SELECT nombre FROM imagenes WHERE id_propiedad = $rec[id]");
    // Generar un nombre de archivo único para cada imagen
    $contador = 0;
    $nuevosNombres = array();
    $imagenesActuales = array();
    while (!$result->EOF) {
        $imagenesActuales[] = $result->fields['nombre'];
        $result->MoveNext();
    }

    foreach ($imagenes['tmp_name'] as $tmp_name) {
        $nombreImagen = $rec['id'] . "_" . $contador . ".jpg";
        $nuevosNombres[] = $nombreImagen;
        $rutaImagen = "../../../imgPropiedades/upload/" . $nombreImagen;
        move_uploaded_file($tmp_name, $rutaImagen);
        $contador++;
    }

    $imagenesAEliminar = array_diff($imagenesActuales, $nuevosNombres);
    $imagenesAInsertar = array_diff($nuevosNombres, $imagenesActuales);

    // Eliminar las imágenes que están en la lista actual pero no en las nuevas imágenes
    foreach ($imagenesAEliminar as $imagen) {
        $db->Execute("DELETE FROM imagenes WHERE nombre = '$imagen'");
        $rutaImagen = "../../../imgPropiedades/upload/" . $imagen;
        unlink($rutaImagen);
    }

    // Insertar las nuevas imágenes que no están en la lista actual
    foreach ($imagenesAInsertar as $imagen) {
        // Obtener el índice de la imagen en el array de nuevos nombres
        $indice = array_search($imagen, $nuevosNombres);

        // Insertar los datos de la imagen en la tabla "imagenes"
        $img = array(
            "nombre" => $imagen,
            "id_propiedad" => $rec['id']
        );
        $resImagen = $db->autoExecute("imagenes", $img, "INSERT");

        // Mover el archivo de la imagen a la carpeta deseada
        $rutaImagen = "../../../imgPropiedades/upload/" . $imagen;
        move_uploaded_file($imagenes['tmp_name'][$indice], $rutaImagen);
    }

    $msg = ($res == 1) ? "Propiedad modificada correctamente" : "Error al insertar la propiedad";
    $response->getBody()->write($msg);
    return $response;
});


//eliminar una propiedad
$app->delete('/delPropiedad/{id}', function (Request $request, Response $response, array $args) {
    $id = $args["id"];
    $db = conectar();
    $sql = "DELETE FROM propiedades  WHERE id=$id";
    $sqll = "DELETE FROM imagenes WHERE id_propiedad=$id";
    $db->execute($sql);
    $db->execute($sqll);
    $response->getBody()->write("Eliminando propiedad");

    return $response;
});


//ejecutramos la aplicación
$app->run();
