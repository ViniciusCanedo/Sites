<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "db_admilson";
    $port = 3306;

    // try {
        $conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);
    //  echo "Conectado";
    // }catch(PDOException $err){
    //     echo "falha na conexão" . $err->getMessage();
    // }

?>