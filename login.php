<?php
session_start();
include("config.php");

$conn = connect_db();
$user = $_POST['username'];
$pass = $_POST['password'];
$sql = "select * from authentication where email = '$user' and password = '$pass';";
$result = mysql_query($sql, $conn);
if (mysql_num_rows($result) > 0) {
    $result = mysql_fetch_array($result);
    $type = $result['type'];
    $_SESSION['authorized'] = true;
    $_SESSION['type'] = $type;
    $_SESSION['person_id'] = $result['person_id'];
    if ($type == "Admin") {
        header("Location:dashboard1.php");
    } else {
        header("Location:view_employee_employee.php");
    }
} else {
    $_SESSION['failed'] = true;
    header("Location:index.php");
}

?>