<?php
include_once 'dbh_inc.php';

if(isset($_GET['login'])){
    $uid = $_GET['login'];
    $chlast_name = pg_escape_string($_POST['chlast_name']);
    $chphone = pg_escape_string($_POST['chphone']);
    $chemail = pg_escape_string($_POST['chemail']);
    $chposition = pg_escape_string($_POST['chposition']);
    $chage = pg_escape_string($_POST['chage']);
    $chlocation = pg_escape_string($_POST['chlocation']);

    if ($chlast_name != ""){
        $res = pg_query($conn,"update users set last_name=$chlast_name where uid=$uid; ");
    }
    if ($chphone != ""){
        echo "NULL";
    }
    if ($chemail != ""){
        echo "NULL";
    }
    if ($chposition != ""){
        echo "NULL";
    }
    if ($chage != ""){
        echo "NULL";
    }
    if ($chlocation != ""){
        echo "NULL";
    }
}
else{
    echo "error";
}


?>