<?php

$db_host = 'nazmulshuvo03.github.io';
$db_user = 'nazmulshuvo03';
$db_password = '123abc';
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