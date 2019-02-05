<?php
include("config.php");
$conn = connect_db();
if (isset($_SESSION['person_id'])) {
    $person_id = $_SESSION['person_id'];
}

?>

<?php


$company_name = (isset($_POST['company_name']) ? $_POST['company_name'] : '');
$company_title = (isset($_POST['company_title']) ? $_POST['company_title'] : '');
$company_address = (isset($_POST['company_address']) ? $_POST['company_address'] : '');
$company_email = (isset($_POST['company_email']) ? $_POST['company_email'] : '');
$company_mobile = (isset($_POST['company_mobile']) ? $_POST['company_mobile'] : '');


$query = "update company set company_name='$company_name',company_title='$company_title',
company_address='$company_address',company_email='$company_email',company_mobile='$company_mobile' where company_id=1";


//echo $query;

if (!(mysql_query($query, $conn))) {
    die('Error: ' . mysql_error($conn));
}


header("Location: dashboard1.php?action=dashboard_updated");

?>

