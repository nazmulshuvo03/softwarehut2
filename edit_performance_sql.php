<?php
session_start();
include("config.php");
$conn = connect_db();
if (isset($_SESSION['person_id'])) {
    $person_id = $_SESSION['person_id'];
}

?>


<?php


$conn = connect_db();


$sql = "SELECT * FROM personal_information,performance,employee_information where personal_information.person_id=performance.person_id and
		personal_information.person_id=employee_information.person_id and personal_information.person_id=$person_id";

$result = mysql_query($sql, $conn) or die($sql . "<br/><br/>" . mysql_error());
$row = mysql_fetch_array($result);


$allocated_task = (isset($_POST['allocated_task']) ? ($_POST['allocated_task']) : '') + $row['allocated_task'];
$completed_task = (isset($_POST['completed_task']) ? $_POST['completed_task'] : '') + $row['completed_task'];
$comment = (isset($_POST['comment']) ? $_POST['comment'] : '');


$query = "update performance set allocated_task='$allocated_task',completed_task='$completed_task',
		comment='$comment' where person_id='$person_id'";

if (!(mysql_query($query, $conn))) {
    die('Error: ' . mysql_error($conn));
}

header("Location: performance.php?action=performance_added");

?>

