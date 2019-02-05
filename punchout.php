<?php
session_start();
$type = $_SESSION['type'];
include('config.php');
$conn = connect_db();
$punchout_time = date("H:i");
$person_id = $_SESSION['person_id'];
$date = date("d-m-Y");

$query = "update attendence set out_time='$punchout_time' where person_id='$person_id' and date='$date'";

if (!(mysql_query($query, $conn))) {
    die('Error: ' . mysql_error($conn));
}
if ($type == 'Admin') {
    header("Location: admin_attendence.php");
} else
    header("Location: employee_attendance.php");
?>