<?php

    $servername = "localhost";
    $username = "root";
    $pass = "";
    $db = "sistemadb";

    //Criando a conexão
    $conn = new mysqli($servername, $username, $pass, $db);

    //Checando a conexão
    if (!$conn) {
            
                echo "Falha de Conexão com MySQL." . PHP_EOL;
                echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
                echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
                exit;
            
            }

?>