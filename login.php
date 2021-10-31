<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "save_the_axo";

    $loginuser = $_POST["loginUser"];
    $loginPass = $_POST["loginPass"];
    $logintime = $_POST["loginTime"];

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die ("Connection failed: " . $conn->connected_error);
    }

    $sql = "SELECT password FROM user WHERE username = '" . $loginuser."'";
    $result = $conn ->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          if($row["password"] == $loginPass){
            echo "0";
            $sql2 = "INSERT INTO sesion (user) VALUES ('" . $loginuser . "')";
            if ($conn->query($sql2) === FALSE) {
              echo "Error: " . $sql . "<br>" . $conn->error;}
            
          }
          else {
            //Wrong password or username
            echo "1";
          }
        }
      } else {
        //Username doesnot exit
        echo "2";
      }
      $conn->close();
?>