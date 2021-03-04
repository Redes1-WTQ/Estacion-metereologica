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

    $statement = $conexionBD->prepare('INSERT INTO datos (id,fecha,temperatura,humedad) VALUES (null, CURRENT_TIMESTAMP, :temperatura, :humedad)');
    $statement->execute(array(':temperatura'=>$temperatura,':humedad'=>$humedad));
    echo "Datos ingresados correctamente"
?>