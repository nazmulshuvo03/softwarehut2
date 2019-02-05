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
$resource = (isset($_POST['resource']) ? $_POST['resource'] : '');
$user_type = (isset($_POST['user_type']) ? $_POST['user_type'] : '');

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
$designation = (isset($_POST['designation']) ? $_POST['designation'] : '');
$department = (isset($_POST['department']) ? $_POST['department'] : '');
$gross_salary = (isset($_POST['gross_salary']) ? $_POST['gross_salary'] : '');
$house_rent = (isset($_POST['house_rent']) ? $_POST['house_rent'] : '');
$transport_expense = (isset($_POST['transport_expense']) ? $_POST['transport_expense'] : '');
$medical_expense = (isset($_POST['medical_expense']) ? $_POST['medical_expense'] : '');
$entertainment_expense = (isset($_POST['entertainment_expense']) ? $_POST['entertainment_expense'] : '');


$bank_name = (isset($_POST['bank_name']) ? $_POST['bank_name'] : '');
$branch_code = (isset($_POST['branch_code']) ? $_POST['branch_code'] : '');
$tin_number = (isset($_POST['$tin_number']) ? $_POST['$tin_number'] : '');
$account_number = (isset($_POST['account_number']) ? $_POST['account_number'] : '');


$previous_company = (isset($_POST['previous_company']) ? $_POST['previous_company'] : '');
$department_previous = (isset($_POST['department_previous']) ? $_POST['department_previous'] : '');
$designation_previous = (isset($_POST['designation_previous']) ? $_POST['designation_previous'] : '');
$start_time = (isset($_POST['start_time']) ? $_POST['start_time'] : '');
$end_time = (isset($_POST['end_time']) ? $_POST['end_time'] : '');

$basic_salary = $gross_salary - $entertainment_expense - $house_rent - $transport_expense - $medical_expense;
$yearly_salary = 12 * ($basic_salary);

if ($gender == "Male") {
    $tax = 0;
    if ($yearly_salary > 220000) {
        $taxable_salary = $yearly_salary - 220000;
        if ($taxable_salary > 300000) {
            $tax = (300000 * 10) / 100;
            $taxable_salary -= 300000;
            if ($taxable_salary > 400000) {
                $tax += (400000 * 15) / 100;
                $taxable_salary -= 400000;
                if ($taxable_salary > 300000) {
                    $tax += (300000 * 20) / 100;
                    $taxable_salary -= 300000;
                    if ($taxable_salary > 0) {
                        $tax += ($taxable_salary * 25) / 100;
                    }
                } else {
                    $tax += ($taxable_salary * 20) / 100;
                }
            } else {
                $tax += ($taxable_salary * 15) / 100;
            }
        } else {
            $tax = ($taxable_salary * 10) / 100;
        }
    }
} else {
    $tax = 0;
    if ($yearly_salary > 250000) {
        $taxable_salary = $yearly_salary - 250000;
        if ($taxable_salary > 300000) {
            $tax = (300000 * 10) / 100;
            $taxable_salary -= 300000;
            if ($taxable_salary > 400000) {
                $tax += (400000 * 15) / 100;
                $taxable_salary -= 400000;
                if ($taxable_salary > 300000) {
                    $tax += (300000 * 20) / 100;
                    $taxable_salary -= 300000;
                    if ($taxable_salary > 0) {
                        $tax += ($taxable_salary * 25) / 100;
                    }
                } else {
                    $tax += ($taxable_salary * 20) / 100;
                }
            } else {
                $tax += ($taxable_salary * 15) / 100;
            }
        } else {
            $tax = ($taxable_salary * 10) / 100;
        }
    }
}
$payable = ($tax) / 12;
$net_salary = $gross_salary - $payable;


$query = "update personal_information set full_name='$full_name',gender='$gender',mobile_number='$mobile_number',
emergency_number='$emergency_contact',email='$email',address='$address',date_of_birth='$date_of_birth',maritial_status='$maritial_status',
allocated_resource='$resource',image='$pic_path' where person_id='$person_id' ";


echo $query;
if (!(mysql_query($query, $conn))) {
    die('Error: ' . mysql_error($conn));
}


$query1 = "update education_information set ssc_institute='$ssc_institute',hsc_institute='$hsc_institute',
bachelor_institute='$bachelor_institute',masters_institute='$masters_institute',ssc_year='$ssc_year',hsc_year='$hsc_year',bachelor_year='$bachelor_year',masters_year='$masters_year',ssc_grade='$ssc_grade',hsc_grade='$hsc_grade',bachelor_grade='$bachelor_grade',masters_grade='$masters_grade' where person_id='$person_id'";

$query2 = "update employee_information set company_id='$employee_id',designation='$designation',
department='$department',gross_salary='$gross_salary',house_rent='$house_rent',medical_expense='$medical_expense',transport_expense='$transport_expense',
entertainment_expense='$entertainment_expense',tax='$payable',net_salary='$net_salary' where person_id='$person_id'";


$query3 = "update bank_information set bank_name='$bank_name',
branch_code='$branch_code',tin_number='$tin_number',account_number='$account_number' where person_id='$person_id'";


$query4 = "update employment_history set previous_company='$previous_company',
department_previous='$department_previous',designation_previous='$designation_previous',start_time='$start_time',end_time='$end_time' where person_id='$person_id'";


$query5 = "update authentication set type='$user_type' where person_id='$person_id'";


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
if (!(mysql_query($query4, $conn))) {
    die('Error: ' . mysql_error($conn));
}
if (!(mysql_query($query5, $conn))) {
    die('Error: ' . mysql_error($conn));
}

header("Location: list_of_employee.php?action=employee_edited");

?>

