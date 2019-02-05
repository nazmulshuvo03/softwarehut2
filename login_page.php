<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
session_start();
?>
<?php
include('config.php');
$conn = connect_db();
$sql = "select * from company";
$result = mysql_query($sql, $conn) or die($sql . "<br/><br/>" . mysql_error());
$row = mysql_fetch_array($result);

?>
<html>
<head>
    <title>Log In</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="description" content="Expand, contract, animate forms with jQuery wihtout leaving the page"/>
    <meta name="keywords" content="expand, form, css3, jquery, animate, width, height, adapt, unobtrusive javascript"/>

    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" type="text/css" href="css/style1.css"/>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css"
          integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">


    <script src="js/cufon-yui.js" type="text/javascript"></script>
    <script src="js/ChunkFive_400.font.js" type="text/javascript"></script>
    <script src="jquery-1.9.1.js"></script>
</head>
<body>
<div class="wrapper">
    <h1 style="text-align: center"><?php echo $row['company_name']; ?></h1>
    <h2 style="text-align: center"><?php echo $row['company_title']; ?></h2>
    <div class="content">
        <div id="form_wrapper" class="form_wrapper">
            <form class="login active" action="login.php" method="post">
                <h3>Login Here</h3>
                <div>
                    <label>Email:</label>
                    <input type="text" name="username"/>
                    <span class="error">This is an error</span>
                </div>
                <div>
                    <label>Password: </label>
                    <input type="password" name="password"/>
                    <span class="error">This is an error</span>
                </div>
                <div class="bottom">
                    <input type="submit" value="Login"></input>
                    <div class="clear"></div>
                </div>
            </form>

        </div>
        <div class="clear">
            <?php
            if (isset($_SESSION['failed'])) {
                echo '<br/><h2 style="text-align:center; font-size:22px; color:red;">Incorrect Email or Password</h2>';
                unset($_SESSION['failed']);
            }
            ?></div>
    </div>
</div>

</body>
</html>