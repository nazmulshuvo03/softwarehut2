<?php
session_start();
if (!isset($_SESSION['authorized'])) {
    header("Location:index.php");
} else if (isset($_SESSION['type'])) {
    if ($_SESSION['type'] == 'Employee')
        header("Location:view_employee_employee.php");
}

if (isset($_GET['id'])) {
    $person_id = $_GET['id'];
    $_SESSION['person_id'] = $person_id;
}

?>


<!DOCTYPE HTML>
<head>
    <link rel="shortcut icon" href="images/favicon.html">
    <title>Edit Employee</title>


    <!--datepicker calender start--->
    <link rel="stylesheet" href="jquery/jquery-ui.css">
    <script src="jquery/jquery-1.9.1.js"></script>
    <script src="jquery/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script>
        $(function () {
            $("#datepicker").datepicker();
        });
    </script>
    <script>
        $(function () {
            $("#datepicker1").datepicker();
        });
    </script>
    <script>
        $(function () {
            $("#datepicker2").datepicker();
        });
    </script>
    <!--datepicker calender end-->

    <!--Core CSS -->
    <link href="bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link rel="stylesheet" href="assets/bootstrap-switch-master/build/css/bootstrap3/bootstrap-switch.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-fileupload/bootstrap-fileupload.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-timepicker/compiled/timepicker.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-colorpicker/css/colorpicker.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap-datetimepicker/css/datetimepicker.css">
    <link rel="stylesheet" type="text/css" href="assets/jquery-multi-select/css/multi-select.css">
    <link rel="stylesheet" type="text/css" href="assets/jquery-tags-input/jquery.tagsinput.css">


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

<!--header start -->
<?php
include('header.php');
?>

<!-- header end -->
<?php

include('sidebar_left.php');
?>
<?php
$conn = connect_db();
$sql = "SELECT * FROM personal_information,employee_information,education_information,bank_information,employment_history,authentication
		where personal_information.person_id=authentication.person_id and personal_information.person_id=employee_information.person_id and personal_information.person_id=education_information.person_id and personal_information.person_id=bank_information.person_id and
		personal_information.person_id=employment_history.person_id and personal_information.person_id=$person_id";
$result = mysql_query($sql, $conn) or die($sql . "<br/><br/>" . mysql_error());
$row = mysql_fetch_array($result);
?>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <section aria-hidden="false" style="display: block;" class="body current" aria-labelledby="wizard-h-0"
                 role="tabpanel" id="wizard-p-0">


            <form class="form-horizontal" method="post" action="update.php" enctype="multipart/form-data">
                <b style="font-size:20px;color:#00004C">Employee Photo</b><br/> <br/><br/>
                <div class="panel-body">
                    <div class="form-group last">
                        <label class="control-label col-md-3" style="color:#314A4A"><b>Upload Image<b></label>
                        <div class="col-md-9">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                    <img style="width:167px;height:158px;" src="<?php echo $row['image'];
                                    $_SESSION['pic_name'] = $row['image']; ?> " alt="">
                                </div>
                                <div class="fileupload-preview fileupload-exists thumbnail"
                                     style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
			    <span class="btn btn-white btn-file">
				<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
				<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
				<input type="file" name="employee_image" class="default" value="<?php echo $row['image']; ?>"/>
			    </span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i
                                                class="fa fa-trash"></i> Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <b style="font-size:20px;color:#00004C">Personal Information</b><br/> <br/><br/>
                <div class="form-group">
                    <label class="col-lg-2 control-label" style="color:#314A4A"><b>Full Name*</b></label>
                    <div class="col-lg-8">
                        <input class="form-control" style="color:black" placeholder="Full name"
                               value="<?php echo $row['full_name']; ?>" name="full_name" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label" style="color:#314A4A"><b>Gender</b></label>
                    <div class="col-lg-8">
                        <select class="form-control m-bot15" style="color:black" placeholder="Select One" name="gender"
                                required>
                            <option value="Female" <?php if ($row['gender'] == "Female") {
                                echo "selected";
                            } ?>>Female
                            </option>
                            <option value="Male" <?php if ($row['gender'] == "Male") {
                                echo "selected";
                            } ?>>
                                Male
                            </option>

                        </select>
                    </div>


                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label" style="color:#314A4A"><b>Phone Number*</b></label>
                    <div class="col-lg-8">
                        <input class="form-control" style="color:black" placeholder="phone number"
                               value="<?php echo $row['mobile_number']; ?>" name="mobile_number" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label" style="color:#314A4A"><b>Emergency Contact</b></label>
                    <div class="col-lg-8">
                        <input class="form-control" style="color:black" placeholder="Emergency contact"
                               value="<?php echo $row['emergency_number']; ?>" type="text" name="emergency_contact">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label" style="color:#314A4A"><b>Email Address*</b></label>
                    <div class="col-lg-8">
                        <input class="form-control" style="color:black" placeholder="email address"
                               value="<?php echo $row['email']; ?>" name="email" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label" style="color:#314A4A"><b>Date of Birth</b></label>
                    <div class="col-lg-8">
                        <input class="form-control" style="color:black" placeholder="date of birth" name="date_of_birth"
                               value="<?php echo $row['date_of_birth']; ?>" id="datepicker" type="text">
                    </div>

                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label" style="color:#314A4A"><b>Maritial Status</b></label>

                    <div class="col-lg-8">
                        <select class="form-control m-bot15" style="color:black" placeholder="Select One"
                                name="maritial_status" required>
                            <option value="Single" <?php if ($row['maritial_status'] == "Single") {
                                echo "selected";
                            } ?>>Single
                            </option>
                            <option value="Married" <?php if ($row['maritial_status'] == "Married") {
                                echo "selected";
                            } ?>>Married
                            </option>
                            <option value="Divorce" <?php if ($row['maritial_status'] == "Divorce") {
                                echo "selected";
                            } ?>>Divorce
                            </option>
                            >
                        </select>
                    </div>


                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label" style="color:#314A4A"><b>Address</b></label>
                    <div class="col-lg-8">
                        <input class="form-control" style="color:black" placeholder="address"
                               value="<?php echo $row['address']; ?>" type="text" name="address">
                    </div>
                </div>


                <br/><br/>


                <b style="font-size:20px;color:#00004C">Educational Information</b><br/> <br/><br/>
                <table class="table">
                    <thead>
                    <tr>
                        <th>SSC</th>
                        <th>HSC</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" style="color:#314A4A"><b>Institute</b></label>
                                <div class="col-lg-8">
                                    <input class="form-control" style="color:black" placeholder="Institute"
                                           value="<?php echo $row['ssc_institute']; ?>" type="text"
                                           name="ssc_institute">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" style="color:#314A4A"><b>Grade</b></label>
                                <div class="col-lg-8">
                                    <input class="form-control" style="color:black" placeholder="Grade"
                                           value="<?php echo $row['ssc_grade']; ?>" type="text" name="ssc_grade">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" style="color:#314A4A"><b>Year</b></label>
                                <div class="col-lg-8">
                                    <input class="form-control" style="color:black" placeholder="Year"
                                           value="<?php echo $row['ssc_year']; ?>" type="text" name="ssc_year">
                                </div>
                            </div>

                        </td>

                        <td>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" style="color:#314A4A"><b>Institute</b></label>
                                <div class="col-lg-8">
                                    <input class="form-control" style="color:black" placeholder="Institute"
                                           value="<?php echo $row['hsc_institute']; ?>" type="text"
                                           name="hsc_institute">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" style="color:#314A4A"><b>Grade</b></label>
                                <div class="col-lg-8">
                                    <input class="form-control" style="color:black" placeholder="Grade"
                                           value="<?php echo $row['hsc_grade']; ?>" type="text" name="hsc_grade">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-2 control-label" style="color:#314A4A"><b>Year</b></label>
                                <div class="col-lg-8">
                                    <input class="form-control" style="color:black" placeholder="Year"
                                           value="<?php echo $row['hsc_year']; ?>" type="text" name="hsc_year">
                                </div>
                            </div>

                        </td>
                    <tr>
                        <td><a href="Edit.html"><b>Bachelor</b></a></td>
                        <td><b>Masters</b></td>
                    </tr>

                    <td>
                        <div class="form-group">
                            <label class="col-lg-2 control-label" style="color:#314A4A"><b>Institute</b></label>
                            <div class="col-lg-8">
                                <input class="form-control" style="color:black" placeholder="Institute"
                                       value="<?php echo $row['bachelor_institute']; ?>" type="text"
                                       name="bachelor_institute">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label" style="color:#314A4A"><b>Grade</b></label>
                            <div class="col-lg-8">
                                <input class="form-control" style="color:black" placeholder="Grade"
                                       value="<?php echo $row['bachelor_grade']; ?>" type="text" name="bachelor_grade">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label" style="color:#314A4A"><b>Year</b></label>
                            <div class="col-lg-8">
                                <input class="form-control" style="color:black" placeholder="Year"
                                       value="<?php echo $row['bachelor_year']; ?>" type="text" name="bachelor_year">
                            </div>
                        </div>

                    </td>

                    <td>
                        <div class="form-group">
                            <label class="col-lg-2 control-label" style="color:#314A4A"><b>Institute</b></label>
                            <div class="col-lg-8">
                                <input class="form-control" style="color:black" placeholder="Institute"
                                       value="<?php echo $row['masters_institute']; ?>" type="text"
                                       name="masters_institute">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label" style="color:#314A4A"><b>Grade</b></label>
                            <div class="col-lg-8">
                                <input class="form-control" style="color:black" placeholder="Grade"
                                       value="<?php echo $row['masters_grade']; ?>" type="text" name="masters_grade">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label" style="color:#314A4A"><b>Year</b></label>
                            <div class="col-lg-8">
                                <input class="form-control" style="color:black" placeholder="Year"
                                       value="<?php echo $row['masters_year']; ?>" type="text" name="masters_year">
                            </div>
                        </div>

                    </td>


                    </tbody>
                </table>

                <br><br>
                <b style="font-size:20px;color:#00004C">Employee Information</b><br/> <br/><br/>

                <div class="form-group">
                    <label class="col-lg-2 control-label" style="color:#314A4A"><b>Employee ID</b></label>
                    <div class="col-lg-8">
                        <input class="form-control" style="color:black" placeholder="Employee_id"
                               value="<?php echo $row['company_id']; ?>" type="text" name="employee_id">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label" style="color:#314A4A"><b>Department</b></label>
                    <div class="col-lg-8">
                        <input class="form-control" style="color:black" placeholder="Department"
                               value="<?php echo $row['department']; ?>" type="text" name="department">
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-lg-2 control-label" style="color:#314A4A"><b>Designation</b></label>
                    <div class="col-lg-8">
                        <input class="form-control" style="color:black" placeholder="Designation"
                               value="<?php echo $row['designation']; ?>" type="text" name="designation">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label" style="color:#314A4A"><b>User Type</b></label>
                    <div class="col-lg-8">
                        <select class="form-control m-bot15" style="color:black" placeholder="Select One"
                                name="user_type" required>
                            <option value="Employee" <?php if ($row['type'] == "Employee") {
                                echo "selected";
                            } ?>>
                                Employee
                            </option>
                            <option value="Admin" <?php if ($row['type'] == "Admin") {
                                echo "selected";
                            } ?>>Admin
                            </option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label" style="color:#314A4A"><b>Gross Salary</b></label>
                    <div class="col-lg-8">
                        <input class="form-control" style="color:black" placeholder="Gross Salary"
                               value="<?php echo $row['gross_salary']; ?>" type="text" name="gross_salary">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label" style="color:#314A4A"><b>House Rent</b></label>
                    <div class="col-lg-8">
                        <input class="form-control" style="color:black" placeholder="House Rent"
                               value="<?php echo $row['house_rent']; ?>" type="text" name="house_rent">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label" style="color:#314A4A"><b>Medical Expense</b></label>
                    <div class="col-lg-8">
                        <input class="form-control" style="color:black" placeholder="Medical Expense"
                               value="<?php echo $row['medical_expense']; ?>" type="text" name="medical_expense">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label" style="color:#314A4A"><b>Entertainment Expense</b></label>
                    <div class="col-lg-8">
                        <input class="form-control" style="color:black" placeholder="Entertainment Expense"
                               value="<?php echo $row['entertainment_expense']; ?>" type="text"
                               name="entertainment_expense">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label" style="color:#314A4A"><b>Transport Expense</b></label>
                    <div class="col-lg-8">
                        <input class="form-control" style="color:black" placeholder="Transport Expense"
                               value="<?php echo $row['transport_expense']; ?>" type="text" name="transport_expense">
                    </div>
                </div>


                <br><br>
                <b style="font-size:20px;color:#00004C">Bank Account Information</b><br/> <br/><br/>
                <div class="form-group">
                    <label class="col-lg-2 control-label" style="color:#314A4A"><b>Bank Name</b></label>
                    <div class="col-lg-8">
                        <input class="form-control" style="color:black" placeholder="Bank Name"
                               value="<?php echo $row['bank_name']; ?>" type="text" name="bank_name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label" style="color:#314A4A"><b>Branch Code</b></label>
                    <div class="col-lg-8">
                        <input class="form-control" style="color:black" placeholder="Branch Code"
                               value="<?php echo $row['branch_code']; ?>" type="text" name="branch_code">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label" style="color:#314A4A"><b>TIN Number</b></label>
                    <div class="col-lg-8">
                        <input class="form-control" style="color:black" placeholder="TIN"
                               value="<?php echo $row['tin_number']; ?>" type="text" name="tin_number">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label" style="color:#314A4A"><b>Bank Account Number</b></label>
                    <div class="col-lg-8">
                        <input class="form-control" style="color:black" placeholder="Bank Account Number"
                               value="<?php echo $row['account_number']; ?>" type="text" name="ban">
                    </div>
                </div>
                <br><br>
                <b style="font-size:20px;color:#00004C">Allocated Resource</b><br/> <br/><br/>
                <div class="form-group">
                    <label class="col-lg-2 control-label" style="color:#314A4A"><b>Resource</b></label>
                    <div class="col-lg-8">
                        <input class="form-control" style="color:black" placeholder="Resource"
                               value="<?php echo $row['allocated_resource']; ?>" type="text" name="resource">
                    </div>
                </div>
                </div>
                <br><br>
                <b style="font-size:20px;color:#00004C">Employment History</b><br/> <br/><br/>
                <div class="form-group">
                    <label class="col-lg-2 control-label" style="color:#314A4A"><b>Previous Company</b></label>
                    <div class="col-lg-8">
                        <input class="form-control" style="color:black" placeholder="Company name"
                               value="<?php echo $row['previous_company']; ?>" type="text" name="previous_company">
                    </div>
                </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label" style="color:#314A4A"><b>Department</b></label>
                    <div class="col-lg-8">
                        <input class="form-control" style="color:black" placeholder="Department"
                               value="<?php echo $row['department_previous']; ?>" type="text"
                               name="previous_company_designation">
                    </div>
                </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label" style="color:#314A4A"><b>Designation</b></label>
                    <div class="col-lg-8">
                        <input class="form-control" style="color:black" placeholder="Designation"
                               value="<?php echo $row['designation_previous']; ?>" type="text"
                               name="previous_company_designation">
                    </div>
                </div>
                </div>

                <div class="form-group">
                    <label class="col-lg-2 control-label" style="color:#314A4A"><b>Time Period</b></label>
                    <div class="col-md-4">
                        <div class="input-group input-large" data-date="13/07/2013" data-date-format="mm/dd/yyyy">
                            <input class="form-control dpd1" style="color:black" placeholder="start time"
                                   value="<?php echo $row['start_time']; ?>" name="start_time" id="datepicker1"
                                   type="text">
                            <span class="input-group-addon">To</span>
                            <input class="form-control dpd2" style="color:black" placeholder="End time"
                                   value="<?php echo $row['end_time']; ?>" name="end_time" id="datepicker2" type="text">
                        </div>
                    </div>
                </div>
                <br><br>


                <button type="submit" class="btn btn-success" style="float: right">Save</button>
            </form>


        </section>


        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--right sidebar start-->


<!--right sidebar end-->


</section>

<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->k8
<script src="js/lib/jquery.js"></script>
<script src="js/lib/jquery-1.8.3.min.js"></script>
<script src="bs3/js/bootstrap.min.js"></script>
<script src="js/lib/jquery-ui-1.9.2.custom.min.js"></script>
<script class="include" type="text/javascript" src="js/accordion-menu/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scrollTo/jquery.scrollTo.min.js"></script>
<script src="assets/easypiechart/jquery.easypiechart.js"></script>
<script src="js/nicescroll/jquery.nicescroll.js" type="text/javascript"></script>

<script src="assets/bootstrap-switch-master/build/js/bootstrap-switch.js"></script>

<script type="text/javascript" src="assets/fuelux/js/spinner.min.js"></script>
<script type="text/javascript" src="assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="assets/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="assets/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script type="text/javascript" src="assets/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="assets/jquery-multi-select/js/jquery.quicksearch.js"></script>

<script type="text/javascript" src="assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>

<script src="assets/jquery-tags-input/jquery.tagsinput.js"></script>

<!--common script init for all pages-->
<script src="js/scripts.js"></script>
<div id="ascrail2000" class="nicescroll-rails"
     style="width: 3px; z-index: auto; background-color: rgb(64, 64, 64); cursor: default; position: fixed; height: 389px; opacity: 1; background-position: initial initial; background-repeat: initial initial;">
    <div style="position: relative; top: 0px; float: right; width: 3px; height: 167px; background-color: rgb(31, 181, 173); background-clip: padding-box; border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px;"></div>
</div>
<div id="ascrail2000-hr" class="nicescroll-rails"
     style="height: 3px; z-index: auto; background-color: rgb(64, 64, 64); position: fixed; cursor: default; display: none; width: 237px; opacity: 1; background-position: initial initial; background-repeat: initial initial;">
    <div style="position: relative; top: 0px; height: 3px; width: 240px; background-color: rgb(31, 181, 173); background-clip: padding-box; border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px;"></div>
</div>
<div id="ascrail2001" class="nicescroll-rails"
     style="width: 3px; z-index: 1000; background-color: rgb(64, 64, 64); cursor: default; position: fixed; top: 0px; height: 389px; opacity: 0; background-position: initial initial; background-repeat: initial initial;">
    <div style="position: relative; top: 0px; float: right; width: 3px; height: 100px; background-color: rgb(31, 181, 173); background-clip: padding-box; border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px;"></div>
</div>
<div id="ascrail2001-hr" class="nicescroll-rails"
     style="height: 3px; z-index: 1000; background-color: rgb(64, 64, 64); top: 386px; position: fixed; cursor: default; display: none; width: 237px; opacity: 0; background-position: initial initial; background-repeat: initial initial;">
    <div style="position: relative; top: 0px; height: 3px; width: 240px; background-color: rgb(31, 181, 173); background-clip: padding-box; border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-right-radius: 10px; border-bottom-left-radius: 10px;"></div>
</div>

<script src="js/toggle-button/toggle-init.js"></script>

<script src="js/advanced-form/advanced-form.js"></script>
<div class="datetimepicker datetimepicker-dropdown-bottom-right dropdown-menu" style="left: 540.25px; z-index: 10;">
    <div class="datetimepicker-minutes" style="display: none;">
        <table class=" table-condensed">
            <thead>
            <tr>
                <th class="prev" style="visibility: visible;"><i class="icon-angle-left"></i></th>
                <th colspan="5" class="switch">15 June 2012</th>
                <th class="next" style="visibility: visible;"><i class="icon-angle-right"></i></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td colspan="7"><span class="minute">14:00</span><span class="minute">14:05</span><span class="minute">14:10</span><span
                            class="minute">14:15</span><span class="minute">14:20</span><span
                            class="minute">14:25</span><span class="minute">14:30</span><span
                            class="minute">14:35</span><span class="minute">14:40</span><span class="minute active">14:45</span><span
                            class="minute">14:50</span><span class="minute">14:55</span></td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th colspan="7" class="today" style="display: none;">Today</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="datetimepicker-hours" style="display: none;">
        <table class=" table-condensed">
            <thead>
            <tr>
                <th class="prev" style="visibility: visible;"><i class="icon-angle-left"></i></th>
                <th colspan="5" class="switch">15 June 2012</th>
                <th class="next" style="visibility: visible;"><i class="icon-angle-right"></i></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td colspan="7"><span class="hour">0:00</span><span class="hour">1:00</span><span
                            class="hour">2:00</span><span class="hour">3:00</span><span class="hour">4:00</span><span
                            class="hour">5:00</span><span class="hour">6:00</span><span class="hour">7:00</span><span
                            class="hour">8:00</span><span class="hour">9:00</span><span class="hour">10:00</span><span
                            class="hour">11:00</span><span class="hour">12:00</span><span class="hour">13:00</span><span
                            class="hour active">14:00</span><span class="hour">15:00</span><span
                            class="hour">16:00</span><span class="hour">17:00</span><span class="hour">18:00</span><span
                            class="hour">19:00</span><span class="hour">20:00</span><span class="hour">21:00</span><span
                            class="hour">22:00</span><span class="hour">23:00</span></td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th colspan="7" class="today" style="display: none;">Today</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="datetimepicker-days" style="display: block;">
        <table class=" table-condensed">
            <thead>
            <tr>
                <th class="prev" style="visibility: visible;"><i class="icon-angle-left"></i></th>
                <th colspan="5" class="switch">June 2012</th>
                <th class="next" style="visibility: visible;"><i class="icon-angle-right"></i></th>
            </tr>
            <tr>
                <th class="dow">Su</th>
                <th class="dow">Mo</th>
                <th class="dow">Tu</th>
                <th class="dow">We</th>
                <th class="dow">Th</th>
                <th class="dow">Fr</th>
                <th class="dow">Sa</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="day old">27</td>
                <td class="day old">28</td>
                <td class="day old">29</td>
                <td class="day old">30</td>
                <td class="day old">31</td>
                <td class="day">1</td>
                <td class="day">2</td>
            </tr>
            <tr>
                <td class="day">3</td>
                <td class="day">4</td>
                <td class="day">5</td>
                <td class="day">6</td>
                <td class="day">7</td>
                <td class="day">8</td>
                <td class="day">9</td>
            </tr>
            <tr>
                <td class="day">10</td>
                <td class="day">11</td>
                <td class="day">12</td>
                <td class="day">13</td>
                <td class="day">14</td>
                <td class="day active">15</td>
                <td class="day">16</td>
            </tr>
            <tr>
                <td class="day">17</td>
                <td class="day">18</td>
                <td class="day">19</td>
                <td class="day">20</td>
                <td class="day">21</td>
                <td class="day">22</td>
                <td class="day">23</td>
            </tr>
            <tr>
                <td class="day">24</td>
                <td class="day">25</td>
                <td class="day">26</td>
                <td class="day">27</td>
                <td class="day">28</td>
                <td class="day">29</td>
                <td class="day">30</td>
            </tr>
            <tr>
                <td class="day new">1</td>
                <td class="day new">2</td>
                <td class="day new">3</td>
                <td class="day new">4</td>
                <td class="day new">5</td>
                <td class="day new">6</td>
                <td class="day new">7</td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th colspan="7" class="today" style="display: none;">Today</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="datetimepicker-months" style="display: none;">
        <table class="table-condensed">
            <thead>
            <tr>
                <th class="prev" style="visibility: visible;"><i class="icon-angle-left"></i></th>
                <th colspan="5" class="switch">2012</th>
                <th class="next" style="visibility: visible;"><i class="icon-angle-right"></i></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td colspan="7"><span class="month">Jan</span><span class="month">Feb</span><span
                            class="month">Mar</span><span class="month">Apr</span><span class="month">May</span><span
                            class="month active">Jun</span><span class="month">Jul</span><span
                            class="month">Aug</span><span class="month">Sep</span><span class="month">Oct</span><span
                            class="month">Nov</span><span class="month">Dec</span></td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th colspan="7" class="today" style="display: none;">Today</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="datetimepicker-years" style="display: none;">
        <table class="table-condensed">
            <thead>
            <tr>
                <th class="prev" style="visibility: visible;"><i class="icon-angle-left"></i></th>
                <th colspan="5" class="switch">2010-2019</th>
                <th class="next" style="visibility: visible;"><i class="icon-angle-right"></i></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td colspan="7"><span class="year old">2009</span><span class="year">2010</span><span
                            class="year">2011</span><span class="year active">2012</span><span
                            class="year">2013</span><span class="year">2014</span><span class="year">2015</span><span
                            class="year">2016</span><span class="year">2017</span><span class="year">2018</span><span
                            class="year">2019</span><span class="year old">2020</span></td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th colspan="7" class="today" style="display: none;">Today</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="datetimepicker datetimepicker-dropdown-bottom-right dropdown-menu" style="left: 834.25px; z-index: 10;">
    <div class="datetimepicker-minutes" style="display: none;">
        <table class=" table-condensed">
            <thead>
            <tr>
                <th class="prev" style="visibility: visible;"><i class="icon-angle-left"></i></th>
                <th colspan="5" class="switch">29 March 2014</th>
                <th class="next" style="visibility: visible;"><i class="icon-angle-right"></i></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td colspan="7"><span class="minute">2:00</span><span class="minute">2:05</span><span class="minute">2:10</span><span
                            class="minute">2:15</span><span class="minute">2:20</span><span
                            class="minute">2:25</span><span class="minute">2:30</span><span
                            class="minute">2:35</span><span class="minute">2:40</span><span
                            class="minute">2:45</span><span class="minute">2:50</span><span
                            class="minute active">2:55</span></td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th colspan="7" class="today" style="display: none;">Today</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="datetimepicker-hours" style="display: none;">
        <table class=" table-condensed">
            <thead>
            <tr>
                <th class="prev" style="visibility: visible;"><i class="icon-angle-left"></i></th>
                <th colspan="5" class="switch">29 March 2014</th>
                <th class="next" style="visibility: visible;"><i class="icon-angle-right"></i></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td colspan="7"><span class="hour">0:00</span><span class="hour">1:00</span><span class="hour active">2:00</span><span
                            class="hour">3:00</span><span class="hour">4:00</span><span class="hour">5:00</span><span
                            class="hour">6:00</span><span class="hour">7:00</span><span class="hour">8:00</span><span
                            class="hour">9:00</span><span class="hour">10:00</span><span class="hour">11:00</span><span
                            class="hour">12:00</span><span class="hour">13:00</span><span class="hour">14:00</span><span
                            class="hour">15:00</span><span class="hour">16:00</span><span class="hour">17:00</span><span
                            class="hour">18:00</span><span class="hour">19:00</span><span class="hour">20:00</span><span
                            class="hour">21:00</span><span class="hour">22:00</span><span class="hour">23:00</span></td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th colspan="7" class="today" style="display: none;">Today</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="datetimepicker-days" style="display: block;">
        <table class=" table-condensed">
            <thead>
            <tr>
                <th class="prev" style="visibility: visible;"><i class="icon-angle-left"></i></th>
                <th colspan="5" class="switch">March 2014</th>
                <th class="next" style="visibility: visible;"><i class="icon-angle-right"></i></th>
            </tr>
            <tr>
                <th class="dow">Su</th>
                <th class="dow">Mo</th>
                <th class="dow">Tu</th>
                <th class="dow">We</th>
                <th class="dow">Th</th>
                <th class="dow">Fr</th>
                <th class="dow">Sa</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="day old">23</td>
                <td class="day old">24</td>
                <td class="day old">25</td>
                <td class="day old">26</td>
                <td class="day old">27</td>
                <td class="day old">28</td>
                <td class="day">1</td>
            </tr>
            <tr>
                <td class="day">2</td>
                <td class="day">3</td>
                <td class="day">4</td>
                <td class="day">5</td>
                <td class="day">6</td>
                <td class="day">7</td>
                <td class="day">8</td>
            </tr>
            <tr>
                <td class="day">9</td>
                <td class="day">10</td>
                <td class="day">11</td>
                <td class="day">12</td>
                <td class="day">13</td>
                <td class="day">14</td>
                <td class="day">15</td>
            </tr>
            <tr>
                <td class="day">16</td>
                <td class="day">17</td>
                <td class="day">18</td>
                <td class="day">19</td>
                <td class="day">20</td>
                <td class="day">21</td>
                <td class="day">22</td>
            </tr>
            <tr>
                <td class="day">23</td>
                <td class="day">24</td>
                <td class="day">25</td>
                <td class="day">26</td>
                <td class="day">27</td>
                <td class="day">28</td>
                <td class="day active">29</td>
            </tr>
            <tr>
                <td class="day">30</td>
                <td class="day">31</td>
                <td class="day new">1</td>
                <td class="day new">2</td>
                <td class="day new">3</td>
                <td class="day new">4</td>
                <td class="day new">5</td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th colspan="7" class="today" style="display: none;">Today</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="datetimepicker-months" style="display: none;">
        <table class="table-condensed">
            <thead>
            <tr>
                <th class="prev" style="visibility: visible;"><i class="icon-angle-left"></i></th>
                <th colspan="5" class="switch">2014</th>
                <th class="next" style="visibility: visible;"><i class="icon-angle-right"></i></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td colspan="7"><span class="month">Jan</span><span class="month">Feb</span><span class="month active">Mar</span><span
                            class="month">Apr</span><span class="month">May</span><span class="month">Jun</span><span
                            class="month">Jul</span><span class="month">Aug</span><span class="month">Sep</span><span
                            class="month">Oct</span><span class="month">Nov</span><span class="month">Dec</span></td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th colspan="7" class="today" style="display: none;">Today</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="datetimepicker-years" style="display: none;">
        <table class="table-condensed">
            <thead>
            <tr>
                <th class="prev" style="visibility: visible;"><i class="icon-angle-left"></i></th>
                <th colspan="5" class="switch">2010-2019</th>
                <th class="next" style="visibility: visible;"><i class="icon-angle-right"></i></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td colspan="7"><span class="year old">2009</span><span class="year">2010</span><span
                            class="year">2011</span><span class="year">2012</span><span class="year">2013</span><span
                            class="year active">2014</span><span class="year">2015</span><span
                            class="year">2016</span><span class="year">2017</span><span class="year">2018</span><span
                            class="year">2019</span><span class="year old">2020</span></td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th colspan="7" class="today" style="display: none;">Today</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="datetimepicker datetimepicker-dropdown-bottom-right dropdown-menu" style="left: 798.25px; z-index: 10;">
    <div class="datetimepicker-minutes" style="display: none;">
        <table class=" table-condensed">
            <thead>
            <tr>
                <th class="prev" style="visibility: hidden;"><i class="icon-angle-left"></i></th>
                <th colspan="5" class="switch">14 February 2013</th>
                <th class="next" style="visibility: visible;"><i class="icon-angle-right"></i></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td colspan="7"><span class="minute active">10:00</span><span class="minute">10:10</span><span
                            class="minute">10:20</span><span class="minute">10:30</span><span
                            class="minute">10:40</span><span class="minute">10:50</span></td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th colspan="7" class="today">Today</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="datetimepicker-hours" style="display: none;">
        <table class=" table-condensed">
            <thead>
            <tr>
                <th class="prev" style="visibility: hidden;"><i class="icon-angle-left"></i></th>
                <th colspan="5" class="switch">14 February 2013</th>
                <th class="next" style="visibility: visible;"><i class="icon-angle-right"></i></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td colspan="7"><span class="hour disabled">0:00</span><span class="hour disabled">1:00</span><span
                            class="hour disabled">2:00</span><span class="hour disabled">3:00</span><span
                            class="hour disabled">4:00</span><span class="hour disabled">5:00</span><span
                            class="hour disabled">6:00</span><span class="hour disabled">7:00</span><span
                            class="hour disabled">8:00</span><span class="hour disabled">9:00</span><span
                            class="hour active">10:00</span><span class="hour">11:00</span><span
                            class="hour">12:00</span><span class="hour">13:00</span><span class="hour">14:00</span><span
                            class="hour">15:00</span><span class="hour">16:00</span><span class="hour">17:00</span><span
                            class="hour">18:00</span><span class="hour">19:00</span><span class="hour">20:00</span><span
                            class="hour">21:00</span><span class="hour">22:00</span><span class="hour">23:00</span></td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th colspan="7" class="today">Today</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="datetimepicker-days" style="display: block;">
        <table class=" table-condensed">
            <thead>
            <tr>
                <th class="prev" style="visibility: hidden;"><i class="icon-angle-left"></i></th>
                <th colspan="5" class="switch">February 2013</th>
                <th class="next" style="visibility: visible;"><i class="icon-angle-right"></i></th>
            </tr>
            <tr>
                <th class="dow">Su</th>
                <th class="dow">Mo</th>
                <th class="dow">Tu</th>
                <th class="dow">We</th>
                <th class="dow">Th</th>
                <th class="dow">Fr</th>
                <th class="dow">Sa</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="day old disabled">27</td>
                <td class="day old disabled">28</td>
                <td class="day old disabled">29</td>
                <td class="day old disabled">30</td>
                <td class="day old disabled">31</td>
                <td class="day disabled">1</td>
                <td class="day disabled">2</td>
            </tr>
            <tr>
                <td class="day disabled">3</td>
                <td class="day disabled">4</td>
                <td class="day disabled">5</td>
                <td class="day disabled">6</td>
                <td class="day disabled">7</td>
                <td class="day disabled">8</td>
                <td class="day disabled">9</td>
            </tr>
            <tr>
                <td class="day disabled">10</td>
                <td class="day disabled">11</td>
                <td class="day disabled">12</td>
                <td class="day disabled">13</td>
                <td class="day">14</td>
                <td class="day">15</td>
                <td class="day">16</td>
            </tr>
            <tr>
                <td class="day">17</td>
                <td class="day">18</td>
                <td class="day">19</td>
                <td class="day">20</td>
                <td class="day">21</td>
                <td class="day">22</td>
                <td class="day">23</td>
            </tr>
            <tr>
                <td class="day">24</td>
                <td class="day">25</td>
                <td class="day">26</td>
                <td class="day">27</td>
                <td class="day">28</td>
                <td class="day new">1</td>
                <td class="day new">2</td>
            </tr>
            <tr>
                <td class="day new">3</td>
                <td class="day new">4</td>
                <td class="day new">5</td>
                <td class="day new">6</td>
                <td class="day new">7</td>
                <td class="day new">8</td>
                <td class="day new">9</td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th colspan="7" class="today">Today</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="datetimepicker-months" style="display: none;">
        <table class="table-condensed">
            <thead>
            <tr>
                <th class="prev" style="visibility: hidden;"><i class="icon-angle-left"></i></th>
                <th colspan="5" class="switch">2013</th>
                <th class="next" style="visibility: visible;"><i class="icon-angle-right"></i></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td colspan="7"><span class="month disabled">Jan</span><span class="month">Feb</span><span
                            class="month">Mar</span><span class="month">Apr</span><span class="month">May</span><span
                            class="month">Jun</span><span class="month">Jul</span><span class="month">Aug</span><span
                            class="month">Sep</span><span class="month">Oct</span><span class="month">Nov</span><span
                            class="month">Dec</span></td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th colspan="7" class="today">Today</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="datetimepicker-years" style="display: none;">
        <table class="table-condensed">
            <thead>
            <tr>
                <th class="prev" style="visibility: hidden;"><i class="icon-angle-left"></i></th>
                <th colspan="5" class="switch">2010-2019</th>
                <th class="next" style="visibility: visible;"><i class="icon-angle-right"></i></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td colspan="7"><span class="year old disabled">2009</span><span class="year disabled">2010</span><span
                            class="year disabled">2011</span><span class="year active disabled">2012</span><span
                            class="year">2013</span><span class="year">2014</span><span class="year">2015</span><span
                            class="year">2016</span><span class="year">2017</span><span class="year">2018</span><span
                            class="year">2019</span><span class="year old">2020</span></td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th colspan="7" class="today">Today</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="datetimepicker datetimepicker-dropdown-bottom-right dropdown-menu" style="left: 798.25px; z-index: 10;">
    <div class="datetimepicker-minutes" style="display: none;">
        <table class=" table-condensed">
            <thead>
            <tr>
                <th class="prev" style="visibility: visible;"><i class="icon-angle-left"></i></th>
                <th colspan="5" class="switch">21 December 2012</th>
                <th class="next" style="visibility: visible;"><i class="icon-angle-right"></i></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td colspan="7">
                    <fieldset class="minute">
                        <legend>PM</legend>
                        <span class="minute">3:00</span><span class="minute">3:05</span><span class="minute">3:10</span><span
                                class="minute">3:15</span><span class="minute">3:20</span><span class="minute active">3:25</span><span
                                class="minute">3:30</span><span class="minute">3:35</span><span
                                class="minute">3:40</span><span class="minute">3:45</span><span
                                class="minute">3:50</span><span class="minute">3:55</span></fieldset>
                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th colspan="7" class="today">Today</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="datetimepicker-hours" style="display: none;">
        <table class=" table-condensed">
            <thead>
            <tr>
                <th class="prev" style="visibility: visible;"><i class="icon-angle-left"></i></th>
                <th colspan="5" class="switch">21 December 2012</th>
                <th class="next" style="visibility: visible;"><i class="icon-angle-right"></i></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td colspan="7">
                    <fieldset class="hour">
                        <legend>AM</legend>
                        <span class="hour hour_am">12</span><span class="hour hour_am">1</span><span
                                class="hour hour_am">2</span><span class="hour hour_am">3</span><span
                                class="hour hour_am">4</span><span class="hour hour_am">5</span><span
                                class="hour hour_am">6</span><span class="hour hour_am">7</span><span
                                class="hour hour_am">8</span><span class="hour hour_am">9</span><span
                                class="hour hour_am">10</span><span class="hour hour_am">11</span></fieldset>
                    <fieldset class="hour">
                        <legend>PM</legend>
                        <span class="hour hour_pm">12</span><span class="hour hour_pm">1</span><span
                                class="hour hour_pm">2</span><span class="hour active hour_pm">3</span><span
                                class="hour hour_pm">4</span><span class="hour hour_pm">5</span><span
                                class="hour hour_pm">6</span><span class="hour hour_pm">7</span><span
                                class="hour hour_pm">8</span><span class="hour hour_pm">9</span><span
                                class="hour hour_pm">10</span><span class="hour hour_pm">11</span></fieldset>
                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th colspan="7" class="today">Today</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="datetimepicker-days" style="display: block;">
        <table class=" table-condensed">
            <thead>
            <tr>
                <th class="prev" style="visibility: visible;"><i class="icon-angle-left"></i></th>
                <th colspan="5" class="switch">December 2012</th>
                <th class="next" style="visibility: visible;"><i class="icon-angle-right"></i></th>
            </tr>
            <tr>
                <th class="dow">Su</th>
                <th class="dow">Mo</th>
                <th class="dow">Tu</th>
                <th class="dow">We</th>
                <th class="dow">Th</th>
                <th class="dow">Fr</th>
                <th class="dow">Sa</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="day old">25</td>
                <td class="day old">26</td>
                <td class="day old">27</td>
                <td class="day old">28</td>
                <td class="day old">29</td>
                <td class="day old">30</td>
                <td class="day">1</td>
            </tr>
            <tr>
                <td class="day">2</td>
                <td class="day">3</td>
                <td class="day">4</td>
                <td class="day">5</td>
                <td class="day">6</td>
                <td class="day">7</td>
                <td class="day">8</td>
            </tr>
            <tr>
                <td class="day">9</td>
                <td class="day">10</td>
                <td class="day">11</td>
                <td class="day">12</td>
                <td class="day">13</td>
                <td class="day">14</td>
                <td class="day">15</td>
            </tr>
            <tr>
                <td class="day">16</td>
                <td class="day">17</td>
                <td class="day">18</td>
                <td class="day">19</td>
                <td class="day">20</td>
                <td class="day active">21</td>
                <td class="day">22</td>
            </tr>
            <tr>
                <td class="day">23</td>
                <td class="day">24</td>
                <td class="day">25</td>
                <td class="day">26</td>
                <td class="day">27</td>
                <td class="day">28</td>
                <td class="day">29</td>
            </tr>
            <tr>
                <td class="day">30</td>
                <td class="day">31</td>
                <td class="day new">1</td>
                <td class="day new">2</td>
                <td class="day new">3</td>
                <td class="day new">4</td>
                <td class="day new">5</td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th colspan="7" class="today">Today</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="datetimepicker-months" style="display: none;">
        <table class="table-condensed">
            <thead>
            <tr>
                <th class="prev" style="visibility: visible;"><i class="icon-angle-left"></i></th>
                <th colspan="5" class="switch">2012</th>
                <th class="next" style="visibility: visible;"><i class="icon-angle-right"></i></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td colspan="7"><span class="month">Jan</span><span class="month">Feb</span><span
                            class="month">Mar</span><span class="month">Apr</span><span class="month">May</span><span
                            class="month">Jun</span><span class="month">Jul</span><span class="month">Aug</span><span
                            class="month">Sep</span><span class="month">Oct</span><span class="month">Nov</span><span
                            class="month active">Dec</span></td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th colspan="7" class="today">Today</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="datetimepicker-years" style="display: none;">
        <table class="table-condensed">
            <thead>
            <tr>
                <th class="prev" style="visibility: visible;"><i class="icon-angle-left"></i></th>
                <th colspan="5" class="switch">2010-2019</th>
                <th class="next" style="visibility: visible;"><i class="icon-angle-right"></i></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td colspan="7"><span class="year old">2009</span><span class="year">2010</span><span
                            class="year">2011</span><span class="year active">2012</span><span
                            class="year">2013</span><span class="year">2014</span><span class="year">2015</span><span
                            class="year">2016</span><span class="year">2017</span><span class="year">2018</span><span
                            class="year">2019</span><span class="year old">2020</span></td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <th colspan="7" class="today">Today</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
<div class="bootstrap-timepicker dropdown-menu">
    <table class=" show-meridian">
        <tbody>
        <tr>
            <td><a href="#" data-action="incrementHour"><i class="fa fa-angle-up"></i></a></td>
            <td class="separator">&nbsp;</td>
            <td><a href="#" data-action="incrementMinute"><i class="fa fa-angle-up"></i></a></td>
            <td class="separator">&nbsp;</td>
            <td class="meridian-column"><a href="#" data-action="toggleMeridian"><i class="fa fa-angle-up"></i></a></td>
        </tr>
        <tr>
            <td><input type="text" name="hour" class="bootstrap-timepicker-hour" maxlength="2"></td>
            <td class="separator">:</td>
            <td><input type="text" name="minute" class="bootstrap-timepicker-minute" maxlength="2"></td>
            <td class="separator">&nbsp;</td>
            <td><input type="text" name="meridian" class="bootstrap-timepicker-meridian" maxlength="2"></td>
        </tr>
        <tr>
            <td><a href="#" data-action="decrementHour"><i class="fa fa-angle-down"></i></a></td>
            <td class="separator"></td>
            <td><a href="#" data-action="decrementMinute"><i class="fa fa-angle-down"></i></a></td>
            <td class="separator">&nbsp;</td>
            <td><a href="#" data-action="toggleMeridian"><i class="fa fa-angle-down"></i></a></td>
        </tr>
        </tbody>
    </table>
</div>
<div class="bootstrap-timepicker dropdown-menu">
    <table class="show-seconds ">
        <tbody>
        <tr>
            <td><a href="#" data-action="incrementHour"><i class="fa fa-angle-up"></i></a></td>
            <td class="separator">&nbsp;</td>
            <td><a href="#" data-action="incrementMinute"><i class="fa fa-angle-up"></i></a></td>
            <td class="separator">&nbsp;</td>
            <td><a href="#" data-action="incrementSecond"><i class="fa fa-angle-up"></i></a></td>
        </tr>
        <tr>
            <td><input type="text" name="hour" class="bootstrap-timepicker-hour" maxlength="2"></td>
            <td class="separator">:</td>
            <td><input type="text" name="minute" class="bootstrap-timepicker-minute" maxlength="2"></td>
            <td class="separator">:</td>
            <td><input type="text" name="second" class="bootstrap-timepicker-second" maxlength="2"></td>
        </tr>
        <tr>
            <td><a href="#" data-action="decrementHour"><i class="fa fa-angle-down"></i></a></td>
            <td class="separator"></td>
            <td><a href="#" data-action="decrementMinute"><i class="fa fa-angle-down"></i></a></td>
            <td class="separator">&nbsp;</td>
            <td><a href="#" data-action="decrementSecond"><i class="fa fa-angle-down"></i></a></td>
        </tr>
        </tbody>
    </table>
</div>
<div class="colorpicker dropdown-menu">
    <div class="colorpicker-saturation" style="background-color: rgb(143, 255, 0);"><i
                style="left: 100px; top: 0px;"><b></b></i></div>
    <div class="colorpicker-hue"><i style="top: 76.01307189542487px;"></i></div>
    <div class="colorpicker-alpha"><i style="top: 0px;"></i></div>
    <div class="colorpicker-color">
        <div style="background-color: rgb(143, 255, 0);"></div>
    </div>
</div>
<div class="colorpicker dropdown-menu">
    <div class="colorpicker-saturation" style="background-color: rgb(255, 0, 80);"><i
                style="left: 42.74509803921569px; top: 0px;"><b></b></i></div>
    <div class="colorpicker-hue"><i style="top: 5.198776758409929px;"></i></div>
    <div class="colorpicker-alpha"><i style="top: 0px;"></i></div>
    <div class="colorpicker-color" style="display: none;">
        <div></div>
    </div>
</div>
<div class="colorpicker dropdown-menu alpha">
    <div class="colorpicker-saturation" style="background-color: rgb(0, 194, 255);"><i
                style="left: 100px; top: 0px;"><b></b></i></div>
    <div class="colorpicker-hue"><i style="top: 46.01307189542467px;"></i></div>
    <div class="colorpicker-alpha" style="background-color: rgb(0, 194, 255);"><i
                style="top: 21.999999999999996px;"></i></div>
    <div class="colorpicker-color">
        <div style="background-color: rgba(0, 194, 255, 0.780392);"></div>
    </div>
</div>
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


</body>
</html>


</html>