<?php
session_start();
include('config.php');
$conn = connect_db();
$punchin_time = date("H:i");
$punchin_date = date("d-m-Y");
$person_id = $_SESSION['person_id'];

$query = "insert into attendence(person_id, date, in_time) values('$person_id', '$punchin_date', '$punchin_time')";
$sql = "select * from attendence where person_id='$person_id' and date='$punchin_date'";
$result = mysql_query($sql) or die($result . "</br></br>" . mysql_error());
$row = mysql_fetch_assoc($result);

if ($row['date'] == $punchin_date) {
    header("Location: employee_attendance.php?action=already_attend");
} else if (!(mysql_query($query, $conn))) {
    die('Error: ' . mysql_error($conn));
}


header("Location: employee_attendance.php");

?>