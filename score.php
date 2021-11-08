<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "save_the_axo";

    //Conection
    $conn = new mysqli($servername, $username, $password,$dbname);

    if ($conn->connect_error) {
        die ("Connection failed: " . $conn->connected_error);
    }
    $sql1="SELECT * FROM sesion ORDER BY date DESC LIMIT 1";
    $result = $conn ->query($sql1);
    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $loginuser = $row["user"];
    }

    $sql2 = "SELECT MAX(rep_flex),MAX(rep_sup) FROM game, sesion WHERE game.sesion = sesion.id AND Sesion.user = '" . $loginuser."'";
    $result = $conn ->query($sql2);

    if ($result->num_rows > 0){
        $rows = array();
        while($row = $result->fetch_assoc()){
            $rows[] = $row;
            echo "".$row["MAX(rep_flex)"]."-".$row["MAX(rep_sup)"];
        }
        //echo json_encode($rows);
    } 
    
    else {
        echo "0-0";
    }
    $conn->close();

?>