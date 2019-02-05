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
<head>
    <link rel="shortcut icon" href="images/favicon.html">

    <title>Salary Information</title>

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
        }

        thead, td {
            vertical-align: middle;
        }</style>
</head>


<body>
<section id="container">
    <!--header start-->
    <?php
    include('header.php');
    include('sidebar_left.php');
    ?>

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <ul class="nav nav-tabs" id="modTab"
                style="padding-bottom: 15px;margin-bottom:0px;margin-left:5px;border-bottom: none;">
            </ul>
            <section class="panel">
                <div id="editable-sample_wrapper" class="dataTables_wrapper form-inline" role="grid">
                    <div class="row">
                        <div class="col-lg-6"></div>
                        <div class="col-lg-6">
                            <div class="dataTables_filter" id="editable-sample_filter"><label></label></div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered dataTable" id="editable-sample"
                           aria-describedby="editable-sample_info">
                        <thead style="background-color:#00001F; color:white; font-size:16px;">
                        <tr role="row">
                            <th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1"
                                aria-label="First Name" style="width: 188px;">Full Name
                            </th>

                            <th style="text-align:center;" class="sorting" role="columnheader" tabindex="0"
                                aria-controls="editable-sample" rowspan="1" colspan="1"
                                aria-label="Points: activate to sort column ascending" style="width: 118px;">Employee ID
                            </th>
                            <th style="text-align:center;" class="sorting" role="columnheader" tabindex="0"
                                aria-controls="editable-sample" rowspan="1" colspan="1"
                                aria-label="Last Name: activate to sort column ascending" style="width: 184px;">
                                Designation
                            </th>
                            <th style="text-align:center;" class="sorting_disabled" role="columnheader" rowspan="1"
                                colspan="1" aria-label="First Name" style="width: 188px;">Gross Salary
                            </th>
                            <th style="text-align:center;" class="sorting_disabled" role="columnheader" rowspan="1"
                                colspan="1" aria-label="First Name" style="width: 188px;">Tax
                            </th>
                            <th style="text-align:center;" class="sorting_disabled" role="columnheader" rowspan="1"
                                colspan="1" aria-label="First Name" style="width: 188px;">Net Salary
                            </th>
                            <th style="text-align:center;" class="sorting_disabled" role="columnheader" rowspan="1"
                                colspan="1" aria-label="First Name" style="width: 188px;">Profile
                            </th>
                            <th style="text-align:center;" class="sorting_disabled" role="columnheader" rowspan="1"
                                colspan="1" aria-label="First Name" style="width: 188px;">Edit
                            </th>

                        </thead>

                        <tbody role="alert" aria-live="polite" aria-relevant="all"
                               style="font-size:16px; color:black;text-align:center">
                        <?php
                        $conn = connect_db();
                        $sql = "SELECT * FROM personal_information,employee_information where personal_information.person_id=employee_information.person_id ";
                        $result = mysql_query($sql, $conn) or die($sql . "<br/><br/>" . mysql_error());
                        ?>
                        <?php if (mysql_num_rows($result) > 0)
                            $count = 1;
                        while ($row = mysql_fetch_array($result)) {
                            if ($count % 2 == 0)
                                echo '<tr style="background-color:#ECECEC;color:black">';
                            else echo '<tr>';
                            $count++;

                            ?>


                            <td class=" sorting_1"><?php echo $row['full_name']; ?></td>
                            <td><?php echo $row['company_id']; ?></td>
                            <td><?php echo $row['designation']; ?></td>
                            <td><?php echo $row['gross_salary']; ?></td>
                            <td><?php echo $row['tax']; ?></td>

                            <td class="center "><?php echo $row['net_salary']; ?></td>
                            <td class=" sorting_1"><a
                                        href="view_employee.php?id=<?php echo $row['person_id']; ?>">View</a></td>
                            <td class=" "><a class="delete" href="Edit.php?id=<?php echo $row['person_id']; ?>">Edit</a>
                            </td>

                            </tr>

                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- page end-->
            </section>
        </section>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<!--right sidebar start-->


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


</body>
</html>
