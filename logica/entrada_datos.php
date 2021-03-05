<?php
    //Conexion con BD
    try {
        $conexionBD = new PDO('mysql:host=localhost;dbname=estmetereologica', 'root', '');
        echo "Conexion establecida con la base de datos </br>";
    } catch (PDOException $e) {
        echo "Conexion fallida </br>";
    }

    //ingreso de datos
    $humedad = $_POST['humedad'];
    $temperatura = $_POST['temperatura'];

    $statement = $conexionBD->prepare('INSERT INTO datost (id,fecha,temperatura) VALUES (null, CURRENT_TIMESTAMP, :temperatura)');
    $statement->execute(array(':temperatura'=>$temperatura));
    echo "Datos de temperatura ingresados correctamente";
    $statement = $conexionBD->prepare('INSERT INTO datosh (id,fecha,humedad) VALUES (null, CURRENT_TIMESTAMP, :humedad)');
    $statement->execute(array(':humedad'=>$humedad));
    echo "Datos de humedad ingresados correctamente";
?>