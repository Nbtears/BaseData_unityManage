<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "save_the_axo";
    $score = $_POST["finalScore"];

    //Conection
    $conn = new mysqli($servername, $username, $password,$dbname);

    if ($conn->connect_error) {
        die ("Connection failed: " . $conn->connected_error);
    }

    $sql1 = "UPDATE game SET score='" . $score."' ORDER BY id DESC LIMIT 1";
    $result = $conn ->query($sql1);

    if ($conn->connect_error){
        echo "Failed";
    } 
    
    else {
        echo "Sucess";
    }
    $conn->close();

?>


    