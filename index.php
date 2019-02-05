<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
session_start();

include('config.php');
$conn = connect_db();
$sql = "select * from company";
$result = mysql_query($sql, $conn) or die($sql . "<br/><br/>" . mysql_error());
$row = mysql_fetch_array($result);

?>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--  my css and js -->
    <link rel="stylesheet" href="css/homepage.css">

    <!--  bootstrap css  -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!--  bootstrap js  -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
            integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
            crossorigin="anonymous"></script>

    <!--  jquery  -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
    </script>

    <!--  fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css"
          integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

    <title>Software Hut</title>
</head>
<body>

<!--************************ Header *****************************-->

<header class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <img id="icon" src="img/icon.png">
        </div>
        <div class="col-md-7">
            <h1 id="header"><?php echo $row['company_name']; ?></h1>
            <h2 id="title"><?php echo $row['company_title']; ?></h2>
        </div>
        <div class="col-md-2 align-self-end">
            <div class="search_area">
                <input id="search_box" type="text" name="search" placeholder="Search...">
                <button id="search_button" onclick="location.href='search_page.php';">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </button>
            </div>
            <div class="row">
                <button type="button" class="col-sm-6 btn btn-block" id="login_button"
                        onclick="location.href='#';">
                    Login Here
                </button>
            </div>
        </div>
    </div>
</header>

<!--************************ Navigation *****************************-->

<div class="navbar">
    <ul>
        <li><a href="index.php" class="active">Home</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Our Work</a></li>
        <li class="dropdown">
            <a href="#">
                Jobs <i class="fa fa-caret-down" aria-hidden="true"></i>
            </a>
            <div class="dropdown-content">
                <a href="#">Web Developer</a>
                <a href="#">Android Developer</a>
                <a href="#">IOS Developer</a>
                <a href="#">Security Analyst</a>
                <a href="#">Data Analyst</a>
            </div>
        </li>
    </ul>
</div>

<!--************************ We do *****************************-->

<div class="middle_area">
    <div class="row">
        <div class="col-md-6">
            <img src="img/middle-image.png" id="middle-img">
        </div>
        <div class="col-md-6">
            <div id="middle-text">
                <h3>We Are : </h3>
                <p>
                    This is a site for online resume and job applications. Every graduate from all sectors of the
                    country can join here and find there suitable jobs.
                </p>
                <br>
                <h3>We Do : </h3>
                <p>
                    Here we also offer some technical courses, what will increase your skills and you will be able
                    to apply more jobs and enlighten your potential.
                </p>
            </div>
        </div>
    </div>
</div>

<!--************************ Contact form *****************************-->

<div class="form">
    <h2>
        <i class="fas fa-envelope"></i> 
        Contact directly with us : 
    </h2>
    <form action="message.php" method="POST">
        <label>Name :</label> <br>
        <input name="name" type="text" placeholder="Enter your full name here"><br>
        <label>Email :</label> <br>
        <input name="email" type="email" placeholder="example@email.com"><br>
        <label>Message :</label> <br>
        <textarea name="message"></textarea>
        <br>
        <button id="submit_button"><i class="fa fa-paper-plane" aria-hidden="true"></i> Submit</button>
    </form>
</div>
<div class="footer">
    <div id="footer-left">
        <h3><?php echo $row['company_name']; ?></h3>
        <h6><?php echo $row['company_address']; ?></h6>
        <h6><?php echo $row['company_email']; ?></h6>
        <h6><?php echo $row['company_mobile']; ?></h6>
    </div>
    <p id="footer-right">
        Copyright &copy 2018 <br>
        Software Hut Bangladesh Limited <br>
        All rights reserved.
    </p>
</div>
</body>
</html>