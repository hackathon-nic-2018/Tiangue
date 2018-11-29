<?php

    //Credenciales de conexion
    $Host = 'localhost';
    $Username = 'root';
    $Password = '';
    $dbName = 'tiangue';

    $db = new mysqli($Host, $Username, $Password, $dbName);

   $idn=$_REQUEST['id'];
    if($db->connect_error){
       die("Connection failed: " . $db->connect_error);
    }


    $result = $db->query("SELECT imagenportada FROM negocio where idnegocio=$idn");

    if($result->num_rows > 0){
        $imgDatos = $result->fetch_array(MYSQLI_ASSOC);

        header("Content-type: image/jpg");
        echo $imgDatos['fichero'];
    }else{
        echo 'Imagen no existe...';
    }

?>