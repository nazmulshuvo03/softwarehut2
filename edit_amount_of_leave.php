<?php
include("config.php");
$conn = connect_db();
if (isset($_SESSION['person_id'])) {
    $person_id = $_SESSION['person_id'];
}

?>

<?php


$annual_leave = (isset($_POST['annual_leave']) ? $_POST['annual_leave'] : '');
$casual_leave = (isset($_POST['casual_leave']) ? $_POST['casual_leave'] : '');
$medical_leave = (isset($_POST['medical_leave']) ? $_POST['medical_leave'] : '');
$others_leave = (isset($_POST['others_leave']) ? $_POST['others_leave'] : '');


$query = "update leave_type set annual_leave='$annual_leave',casual_leave='$casual_leave',
medical_leave='$medical_leave',others_leave='$others_leave' where leave_type_id=1";

if (!(mysql_query($query, $conn))) {
    die('Error: ' . mysql_error($conn));
}

header("Location: amount_of_leave1.php?action=amount_of_leave_updated");

?>

