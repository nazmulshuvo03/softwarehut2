<?php
session_start();
include("config.php");
$person_id = $_SESSION['person_id'];
$conn = connect_db();


$current_password = (isset($_POST['current_password']) ? $_POST['current_password'] : '');
$new_password = (isset($_POST['new_password']) ? $_POST['new_password'] : '');

$sql = "select * from authentication where person_id='$person_id'";
$result = mysql_query($sql, $conn) or die($sql . "<br/><br/>" . mysql_error());
$row = mysql_fetch_array($result);

$person_id = $_SESSION['person_id'];
if ($current_password == $row['password']) {
    $query = "update authentication set password='$new_password' where person_id='$person_id'";
    if (!(mysql_query($query, $conn))) {
        die('Error: ' . mysql_error($conn));
    }
    header("Location: employee_change_password.php?action=password_changed");

}


?>

