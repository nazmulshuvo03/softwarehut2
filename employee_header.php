<?php
//session_start();
include('config.php');
$conn = connect_db();
$sql = "SELECT * FROM company";
$result = mysql_query($sql, $conn) or die($sql . "<br/><br/>" . mysql_error());
$row = mysql_fetch_array($result);

?>


<!--header start-->
<header class="header fixed-top clearfix">
    <!--logo start-->
    <div class="brand">

        <a href="index-2.html" class="logo">
        </a>
    </div>
    <!--logo end-->

    <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <!--  notification end -->
    </div>
    <?php

    $conn = connect_db();
    $person_id = $_SESSION['person_id'];
    $sql = "SELECT * FROM personal_information,authentication where personal_information.person_id=authentication.person_id and
		personal_information.person_id='$person_id'";
    $result = mysql_query($sql, $conn) or die($sql . "<br/><br/>" . mysql_error());
    $row = mysql_fetch_array($result);


    ?>
    <div class="top-nav clearfix">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">
            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <img alt="" src="images/admin.jpg">
                    <span class="username">Employee</span> <!--admin or employee -->
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <li><a href="employee_change_password.php?id=<?php echo $row['person_id']; ?>"><i
                                    class=" fa fa-suitcase"></i>Change password</a></li>
                    <li><a href="employee_edit.php?id=<?php echo $row['person_id']; ?>"><i class=" fa fa-suitcase"></i>Edit
                            profile</a></li>
                    <li><a href="logout.php"><i class="fa fa-key"></i> Log Out</a></li>

                </ul>
            </li>
            <!-- user login dropdown end -->

        </ul>
        <!--search & user info end-->
    </div>
</header>
<!--header end-->
