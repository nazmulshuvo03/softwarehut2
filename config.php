<?php

$db_host = 'localhost';
$db_user = 'baru6alictprojec';
$db_password = 'Ph{E2k49jXB0';
$db_name = 'softwarehut';
//session_start();

function connect_db()
{
    global $db_host, $db_user, $db_password, $db_name;

    $link = mysql_connect($db_host, $db_user, $db_password);
    if (!$link) {
        die('Not Connected' . mysql_error());
    }

    $db_selected = mysql_select_db($db_name, $link);

    if (!$db_selected) {
        die('Error :' . mysql_error());
    }

    return $link;
}
?>