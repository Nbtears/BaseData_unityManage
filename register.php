<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "save_the_axo";

$loginuser = $_POST["loginUser"];
$loginPass = $_POST["loginPass"];
$name = $_POST["nameUser"];
$lastname = $_POST["lastname"];
$arm = $_POST["armuser"];
$injury = $_POST["injuryuser"];
$clinic = $_POST["clinicuser"];
$age = $_POST["ageuser"];

$conn = new mysqli($servername, $username, $password,$dbname);

if ($conn->connect_error) {
    die ("Connection failed: " . $conn->connected_error);
}
echo "Connected successfully <br>";

$sql = "SELECT password FROM user WHERE username = '" . $loginuser."'";
$result = $conn ->query($sql);

if ($result->num_rows > 0) {
    echo "Username taken.";

} else {
    echo "Creating user...";
    $sql2 = "INSERT INTO user 
    VALUES ('" . $loginuser . "', '" . $loginPass . "', '" . $name . "', '" . $lastname . "', '" . $arm . "', '" . $injury . "', '" . $clinic . "', '" . $age . "')";

    if ($conn->query($sql2) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

  }
  $conn->close();

?>