<?php
session_start();
if (!isset($_SESSION['authorized'])) {
    header("Location:index.php");
} else if (isset($_SESSION['type'])) {
    if ($_SESSION['type'] == 'Employee')
        header("Location:view_employee_employee.php");
}


?>


<html>
<!DOCTYPE HTML>
<html>
<head>
    <link rel="shortcut icon" href="images/favicon.html">

    <title>Employee Profile</title>


    <!--Core CSS -->
    <link href="bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="bootstrap/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/bootstrap-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/jquery-steps-master/demo/css/jquery.steps.css">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="js/ie8/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">.jqstooltip {
            position: absolute;
            left: 30px;
            top: 0px;
            display: block;
            visibility: hidden;
            background: rgb(0, 0, 0) transparent;
            background-color: rgba(0, 0, 0, 0.6);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);
            -ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";
            color: white;
            font: 10px arial, san serif;
            text-align: left;
            white-space: nowrap;
            border: 0px solid white;
            border-radius: 3px;
            -webkit-border-radius: 3px;
            z-index: 10000;
        }

        .jqsfield {
            color: white;
            padding: 5px 5px 5px 5px;
            font: 10px arial, san serif;
            text-align: left;
        }</style>
</head>
<body>

<!--header start-->
<?php
include('header.php');
include('sidebar_left.php');
?>
<?php

$conn = connect_db();
if (isset($_GET['id'])) {
    $person_id = $_GET['id'];
    $_SESSION['person_id'] = $person_id;
}

?>
<?php
$person_id = $_SESSION['person_id'];
$sql = "SELECT * FROM authentication,personal_information,employee_information,education_information,bank_information,employment_history
		where personal_information.person_id=employee_information.person_id and personal_information.person_id=education_information.person_id and personal_information.person_id=bank_information.person_id and
		personal_information.person_id=employment_history.person_id and personal_information.person_id=authentication.person_id and personal_information.person_id='$person_id'";
$result = mysql_query($sql, $conn) or die($sql . "<br/><br/>" . mysql_error());
$row = mysql_fetch_array($result);

?>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <ul class="nav nav-tabs" id="modTab"
            style="padding-bottom: 15px;margin-bottom:0px;margin-left:5px;border-bottom: none;">
        </ul>


        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;overflow:hidden">

            <img class="img-responsive" style="width:167px;height:158px;" src="<?php echo $row['image']; ?>" alt="">
        </div>


        <br/><br/>
        <div style="width: 80%">
            <b style="font-size:20px;color:#00004C">Personal Information</b><br/> <br/><br/>
            <section class="panel">

                <div>
                    <table class="table">

                        <tbody style="color:black">
                        <tr>
                            <td>Employee name:</td>
                            <td><?php echo $row['full_name']; ?></td>
                        </tr>
                        <tr style="background-color:#ECECEC">
                            <td>Gender</td>
                            <td><?php echo $row['gender']; ?></td>
                        </tr>

                        <tr>
                            <td>Phone number</td>
                            <td><?php echo $row['mobile_number']; ?></td>
                        </tr>
                        <tr style="background-color:#ECECEC">
                            <td>Emergency Contact</td>
                            <td><?php echo $row['emergency_number']; ?></td>
                        </tr>

                        <tr>
                            <td>Email</td>
                            <td><?php echo $row['email']; ?></td>
                        </tr>
                        <tr style="background-color:#ECECEC">
                            <td>Address</td>
                            <td><?php echo $row['address']; ?></td>
                        </tr>
                        <tr>
                            <td>Date of Birth</td>
                            <td><?php echo $row['date_of_birth']; ?></td>
                        </tr>

                        <tr style="background-color:#ECECEC">
                            <td>Maritial status</td>
                            <td><?php echo $row['maritial_status']; ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

            </section>
            <br><br>
            <b style="font-size:20px;color:#00004C">Employee Information</b><br/> <br/><br>
            <section class="panel">

                <div class="panel-body">

                    <table class="table">
                        <tbody style="color:black">
                        <tr>
                            <td>Employee ID</td>
                            <td><?php echo $row['company_id']; ?></td>
                        </tr>

                        <tr style="background-color:#ECECEC">
                            <td>Departmrnt</td>
                            <td><?php echo $row['department']; ?></td>
                        </tr>

                        <tr>
                            <td>Designation</td>
                            <td><?php echo $row['designation']; ?></td>
                        </tr>

                        <tr>
                            <td>Joining Date</td>
                            <td><?php echo $row['joining_date']; ?></td>
                        </tr>

                        <tr style="background-color:#ECECEC">
                            <td>User Type</td>
                            <td><?php echo $row['type']; ?></td>
                        </tr>
                        <tr>
                            <td>Gross Salary</td>
                            <td><?php echo $row['gross_salary']; ?></td>
                        </tr>
                        <tr style="background-color:#ECECEC">
                            <td>House Rent</td>
                            <td><?php echo $row['house_rent']; ?></td>
                        </tr>
                        <tr>

                            <td>Medical Expense</td>
                            <td><?php echo $row['medical_expense']; ?></td>
                        </tr>
                        <tr style="background-color:#ECECEC">

                            <td>Entertainment Expense</td>
                            <td><?php echo $row['entertainment_expense']; ?></td>
                        </tr>
                        <tr>

                            <td>Transport Expense</td>
                            <td><?php echo $row['transport_expense']; ?></td>
                        </tr>
                        <tr style="background-color:#ECECEC">
                            <td>Tax</td>
                            <td><?php echo $row['tax']; ?></td>
                        </tr>
                        <tr>
                            <td>Net Salary</td>
                            <td><?php echo $row['net_salary']; ?></td>
                        </tr>

                        </tbody>
                    </table>
                </div>

            </section>
            <br><br>

            <b style="font-size:20px;color:#00004C">Employment History</b><br/> <br/><br>
            <section class="panel">

                <div class="panel-body">

                    <table class="table">
                        <tbody style="color:black">
                        <tr>
                            <td>Company name</td>
                            <td><?php echo $row['previous_company']; ?></td>
                        </tr>
                        <tr style="background-color:#ECECEC">
                            <td>Department</td>
                            <td><?php echo $row['department_previous']; ?></td>
                        </tr>

                        <tr>
                            <td>Designation</td>
                            <td><?php echo $row['designation_previous']; ?></td>
                        </tr>
                        <tr style="background-color:#ECECEC">
                            <td>Time Period</td>
                            <td><?php echo $row['start_time']; ?> to <?php echo $row['end_time']; ?></td>
                        </tr>

                        </tbody>
                    </table>
                </div>

            </section>
            <br><br>


            <b style="font-size:20px;color:#00004C">Bank Information</b><br/> <br/><br>
            <section class="panel">

                <div class="panel-body">

                    <table class="table">
                        <tbody style="color:black">
                        <tr>
                            <td>Bank Name</td>
                            <td><?php echo $row['bank_name']; ?></td>
                        </tr>
                        <tr style="background-color:#ECECEC">
                            <td>Branch Code</td>
                            <td><?php echo $row['branch_code']; ?></td>
                        </tr>
                        <tr>
                            <td>TIN Number</td>
                            <td><?php echo $row['tin_number']; ?></td>
                        </tr>
                        <tr style="background-color:#ECECEC">
                            <td>Account Number</td>
                            <td><?php echo $row['account_number']; ?></td>
                        </tr>

                        </tbody>
                    </table>
                </div>

            </section>

            <b style="font-size:20px;color:#00004C">Allocated Resource</b><br/> <br/><br>
            <section class="panel">

                <div class="panel-body">

                    <table class="table">
                        <tbody>
                        <tr>
                            <td>Resource</td>
                            <td><?php echo $row['allocated_resource']; ?></td>

                        </tbody>
                    </table>
                </div>

            </section>
            <br><br>

            <b style="font-size:20px;color:#00004C">Education Information</b><br/> <br/><br>
            <section class="panel">
                <table class="table table-striped table-hover table-bordered dataTable" id="editable-sample"
                       aria-describedby="editable-sample_info">
                    <thead style="background-color:#00001F; color:white">
                    <tr role="row">
                        <th style="text-align:center;" class="sorting_disabled" role="columnheader" rowspan="1"
                            colspan="1" aria-label="First Name" style="width: 188px;">Degree
                        </th>
                        <th style="text-align:center;" class="sorting" role="columnheader" tabindex="0"
                            aria-controls="editable-sample" rowspan="1" colspan="1"
                            aria-label="Last Name: activate to sort column ascending" style="width: 184px;">Institute
                        </th>

                        <th style="text-align:center;" class="sorting" role="columnheader" tabindex="0"
                            aria-controls="editable-sample" rowspan="1" colspan="1"
                            aria-label="Status: activate to sort column ascending" style="width: 220px;">Grade
                        </th>
                        <th style="text-align:center;" class="sorting_disabled" role="columnheader" rowspan="1"
                            colspan="1" aria-label="First Name" style="width: 188px;">Year
                        </th>
                    </thead>

                    <tbody role="alert" aria-live="polite" aria-relevant="all" style="color:black">
                    <tr class="odd">

                        <td>SSC</td>
                        <td><?php echo $row['ssc_institute']; ?></td>
                        <td><?php echo $row['ssc_grade']; ?></td>
                        <td class=" "><?php echo $row['ssc_year']; ?></td>

                    </tr>
                    <tr style="background-color:#ECECEC">

                        <td>HSC</td>
                        <td><?php echo $row['hsc_institute']; ?></td>
                        <td><?php echo $row['hsc_grade']; ?></td>
                        <td class=" "><?php echo $row['hsc_year']; ?></td>
                    </tr>
                    <tr class="odd">

                        <td>Bachelor</td>
                        <td><?php echo $row['bachelor_institute']; ?></td>
                        <td><?php echo $row['bachelor_grade']; ?></td>
                        <td class=" "><?php echo $row['bachelor_year']; ?></td>
                    </tr>
                    <tr style="background-color:#ECECEC">
                        <td>Masters</td>
                        <td><?php echo $row['masters_institute']; ?></td>
                        <td><?php echo $row['masters_grade']; ?></td>
                        <td class=" "><?php echo $row['masters_year']; ?></td>
                    </tr>
                    </tbody>
                </table>
            </section>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--right sidebar start-->

<!--right sidebar end-->


<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
<script src="js/lib/jquery.js"></script>
<script src="bs3/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="js/accordion-menu/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scrollTo/jquery.scrollTo.min.js"></script>&gt;
<script src="js/nicescroll/jquery.nicescroll.js" type="text/javascript"></script>

<script src="assets/jquery-steps-master/build/jquery.steps.js"></script>
<!--Easy Pie Chart-->
<script src="assets/easypiechart/jquery.easypiechart.js"></script>
<!--Sparkline Chart-->
<script src="assets/sparkline/jquery.sparkline.js"></script>
<!--jQuery Flot Chart-->
<script src="assets/flot-chart/jquery.flot.js"></script>
<script src="assets/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="assets/flot-chart/jquery.flot.resize.js"></script>
<script src="assets/flot-chart/jquery.flot.pie.resize.js"></script>


<!--common script init for all pages-->
<script src="js/scripts.js"></script>
<div style="width: 3px; z-index: auto; background: none repeat scroll 0% 0% rgb(64, 64, 64); cursor: default; position: fixed; top: 0px; left: 237px; height: 388px; opacity: 0;"
     class="nicescroll-rails" id="ascrail2000">
    <div style="position: relative; top: 0px; float: right; width: 3px; height: 166px; background-color: rgb(31, 181, 173); background-clip: padding-box; border-radius: 10px;"></div>
</div>
<div style="height: 3px; z-index: auto; background: none repeat scroll 0% 0% rgb(64, 64, 64); top: 385px; left: 0px; position: fixed; cursor: default; display: none; width: 237px; opacity: 0;"
     class="nicescroll-rails" id="ascrail2000-hr">
    <div style="position: relative; top: 0px; height: 3px; width: 240px; background-color: rgb(31, 181, 173); background-clip: padding-box; border-radius: 10px;"></div>
</div>
<div style="width: 3px; z-index: 1000; background: none repeat scroll 0% 0% rgb(64, 64, 64); cursor: default; position: fixed; top: 0px; left: 1586px; height: 388px; opacity: 0;"
     class="nicescroll-rails" id="ascrail2001">
    <div style="position: relative; top: 0px; float: right; width: 3px; height: 266px; background-color: rgb(31, 181, 173); background-clip: padding-box; border-radius: 10px;"></div>
</div>
<div style="height: 3px; z-index: 1000; background: none repeat scroll 0% 0% rgb(64, 64, 64); top: 385px; left: 1349px; position: fixed; cursor: default; display: none; width: 237px; opacity: 0;"
     class="nicescroll-rails" id="ascrail2001-hr">
    <div style="position: relative; top: 0px; height: 3px; width: 240px; background-color: rgb(31, 181, 173); background-clip: padding-box; border-radius: 10px;"></div>
</div>

<script>
    $(function () {
        $("#wizard").steps({
            headerTag: "h2",
            bodyTag: "section",
            transitionEffect: "slideLeft"
        });

        $("#wizard-vertical").steps({
            headerTag: "h2",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            stepsOrientation: "vertical"
        });
    });


</script>
</div>

</body>
</html>
