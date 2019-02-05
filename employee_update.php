<?php
session_start();
include("config.php");
?>

<?php

$person_id = $_SESSION['person_id'];
$conn = connect_db();
$sql = "select * from personal_information where person_id='$person_id'";
$result = mysql_query($sql, $conn) or die($sql . "<br/><br/>" . mysql_error());
$row = mysql_fetch_array($result);


if (!file_exists($_FILES['employee_image']['tmp_name']) || !is_uploaded_file($_FILES['employee_image']['tmp_name'])) {
    $pic_path = $row['image'];
} else {

    $picture = $_FILES['employee_image'];
    $picture_upload_name = $picture['name'];
    $ext = pathinfo($picture_upload_name, PATHINFO_EXTENSION);
    $pic_name = date('y-m-d_h-i-s') . "." . $ext;
    $pic_path = "employee_pics/$pic_name";
    move_uploaded_file($picture["tmp_name"], $pic_path);
}

/*
if(isset($_POST["employee_image"]))
{
$picture=$_FILES['employee_image'];
$pic_name=date('y-m-d_h-i-s').$picture["name"];

$pic_path="employee_pics/$pic_name";
move_uploaded_file($picture["tmp_name"],$pic_path);
}
else $pic_path=$_SESSION['pic_name'];
*/


$full_name = (isset($_POST['full_name']) ? $_POST['full_name'] : '');
$gender = (isset($_POST['gender']) ? $_POST['gender'] : '');
$mobile_number = (isset($_POST['mobile_number']) ? $_POST['mobile_number'] : '');
$emergency_contact = (isset($_POST['emergency_contact']) ? $_POST['emergency_contact'] : '');
$email = (isset($_POST['email']) ? $_POST['email'] : '');
$date_of_birth = (isset($_POST['date_of_birth']) ? $_POST['date_of_birth'] : '');
$maritial_status = (isset($_POST['maritial_status']) ? $_POST['maritial_status'] : '');
$address = (isset($_POST['address']) ? $_POST['address'] : '');


$ssc_institute = (isset($_POST['ssc_institute']) ? $_POST['ssc_institute'] : '');
$ssc_grade = (isset($_POST['ssc_grade']) ? $_POST['ssc_grade'] : '');
$ssc_year = (isset($_POST['ssc_year']) ? $_POST['ssc_year'] : '');
$hsc_institute = (isset($_POST['hsc_institute']) ? $_POST['hsc_institute'] : '');
$hsc_grade = (isset($_POST['hsc_grade']) ? $_POST['hsc_grade'] : '');
$hsc_year = (isset($_POST['hsc_year']) ? $_POST['hsc_year'] : '');
$bachelor_institute = (isset($_POST['bachelor_institute']) ? $_POST['bachelor_institute'] : '');
$bachelor_grade = (isset($_POST['bachelor_grade']) ? $_POST['bachelor_grade'] : '');
$bachelor_year = (isset($_POST['bachelor_year']) ? $_POST['bachelor_year'] : '');
$masters_institute = (isset($_POST['masters_institute']) ? $_POST['masters_institute'] : '');
$masters_grade = (isset($_POST['masters_grade']) ? $_POST['masters_grade'] : '');
$masters_year = (isset($_POST['masters_year']) ? $_POST['masters_year'] : '');

$employee_id = (isset($_POST['employee_id']) ? $_POST['employee_id'] : '');

$bank_name = (isset($_POST['bank_name']) ? $_POST['bank_name'] : '');
$branch_code = (isset($_POST['branch_code']) ? $_POST['branch_code'] : '');
$tin_number = (isset($_POST['tin_number']) ? $_POST['tin_number'] : '');
$account_number = (isset($_POST['account_number']) ? $_POST['account_number'] : '');


$query = "update personal_information set full_name='$full_name',gender='$gender',mobile_number='$mobile_number',
emergency_number='$emergency_contact',email='$email',address='$address',date_of_birth='$date_of_birth',maritial_status='$maritial_status'
,image='$pic_path' where person_id='$person_id' ";
echo $query;
if (!(mysql_query($query, $conn))) {
    die('Error: ' . mysql_error($conn));
}


$query1 = "update education_information set ssc_institute='$ssc_institute',hsc_institute='$hsc_institute',
bachelor_institute='$bachelor_institute',masters_institute='$masters_institute',ssc_year='$ssc_year',hsc_year='$hsc_year',bachelor_year='$bachelor_year',masters_year='$masters_year',ssc_grade='$ssc_grade',hsc_grade='$hsc_grade',bachelor_grade='$bachelor_grade',masters_grade='$masters_grade' where person_id='$person_id'";

$query2 = "update employee_information set company_id='$employee_id'";


$query3 = "update bank_information set bank_name='$bank_name',
branch_code='$branch_code',tin_number='$tin_number',account_number='$account_number' where person_id='$person_id'";


//$result2="select email from personal_information where person_id='result1'";
//$result3=mysql_query($result2);

//$query5= "insert into authentication(person_id,email,password)
//values ('$result1','$result3','iit123');";

//echo "1 record added";

if (!(mysql_query($query1, $conn))) {
    die('Error: ' . mysql_error($conn));
}
if (!(mysql_query($query2, $conn))) {
    die('Error: ' . mysql_error($conn));
}
if (!(mysql_query($query3, $conn))) {
    die('Error: ' . mysql_error($conn));
}


header("Location: view_employee_employee.php?action=employee_added");

?>

