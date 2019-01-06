<?php
include_once 'dbh_inc.php';
$query ='select lid from location order by lid desc limit 1';
$res = pg_query($conn,$query);
$current_max_id = pg_fetch_row($res);

$country = pg_escape_string($_POST['country']);
$city = pg_escape_string($_POST['city']);
$postal = pg_escape_string($_POST['postal']);
$street = pg_escape_string($_POST['street']);
$st_number = pg_escape_string($_POST['st_number']);

$insert = "insert into location(country,city,postal,street,street_number) 
        values ('$country' , '$city' , '$postal' , '$street' , '$st_number')";

        if(pg_query($conn,$insert)) {
        }
        else{
            pg_query($conn , "select setval('user_sec' , $current_max_id[0])");     // jezeli wpisanie nie powiedzie sie ustaw sekwencje z powrotem
            echo "eeeror ";
        }
?>