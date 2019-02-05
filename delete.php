<?php
include("config.php");
$conn = connect_db();
if (isset($_GET['id'])) {
    $person_id = $_GET['id'];
    $_SESSION['person_id'] = $person_id;
}

$conn = connect_db();
$query = "delete from personal_information where person_id=$person_id";
mysql_query($query, $conn);

$query = "delete from employee_information where person_id=$person_id";
mysql_query($query, $conn);

$query = "delete from education_information where person_id=$person_id";
mysql_query($query, $conn);

$query = "delete from authentication where person_id=$person_id";
mysql_query($query, $conn);

$query = "delete from bank_information where person_id=$person_id";
mysql_query($query, $conn);

$query = "delete from employment_history where person_id=$person_id";
mysql_query($query, $conn);

$query = "delete from leave_table where person_id=$person_id";
mysql_query($query, $conn);

$query = "delete from performance where person_id=$person_id";
mysql_query($query, $conn);

header("Location:list_of_employee.php?action=employee_deleted");

?>