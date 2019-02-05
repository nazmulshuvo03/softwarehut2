<?php

include("config.php");
$conn = connect_db();
$sql = "select * from message";
$result = mysql_query($sql, $conn) or die($sql . "<br/><br/>" . mysql_error());
$row = mysql_fetch_array($result);

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

$insert_data = "INSERT INTO message(id, name, email, message) values(NULL, '$name', '$email', '$message')";
$run_insert = mysql_query($insert_data);

if($run_insert){
    echo "<h1> Messege Delivered</h1>";
}else {
    echo "Insertation failed";
}
?>