<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "save_the_axo";

    $loginuser = $_POST["loginUser"];
    $loginPass = $_POST["loginPass"];


    $conn = new mysqli($servername, $username, $password,$dbname);

    if ($conn->connect_error) {
        die ("Connection failed: " . $conn->connected_error);
    }
    echo "Connected successfully <br>";

    $sql = "SELECT password FROM user WHERE username = '" . $loginuser."'";
    $result = $conn ->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          if($row["password"] == $loginPass){
            echo "Login Succes.";
          }
          else {
            echo "Wrong password or username.";
          }
        }
      } else {
        echo "Username does not exit";
      }
      $conn->close();
?>