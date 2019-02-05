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

$sql = "SELECT * FROM personal_information,leave_table where personal_information.person_id=leave_table.person_id and personal_information.person_id=$person_id";
$result = mysql_query($sql, $conn) or die($sql . "<br/><br/>" . mysql_error());
$row = mysql_fetch_array($result);


$annual_leave_taken = (isset($_POST['edit_annual_leave']) ? ($_POST['edit_annual_leave']) : '') + $row['annual_leave_taken'];
$casual_leave_taken = (isset($_POST['edit_casual_leave']) ? $_POST['edit_casual_leave'] : '') + $row['casual_leave_taken'];
$medical_leave_taken = (isset($_POST['edit_medical_leave']) ? $_POST['edit_medical_leave'] : '') + $row['medical_leave_taken'];
$others_leave_taken = (isset($_POST['edit_others_leave']) ? $_POST['edit_others_leave'] : '');
+$row['others_leave_taken'];


$query = "update leave_table set annual_leave_taken='$annual_leave_taken', casual_leave_taken='$casual_leave_taken',
medical_leave_taken='$medical_leave_taken', others_leave_taken='$others_leave_taken' where person_id='$person_id'";

if (!(mysql_query($query, $conn))) {
    die('Error: ' . mysql_error($conn));
}

header("Location: leave_management.php?action=leave_edited");

?>


