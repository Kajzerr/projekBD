<?php
include_once 'dbh_inc.php';
$name = pg_escape_string($_POST['name']);
$last_name = pg_escape_string($_POST['last_name']);
$phone = pg_escape_string($_POST['phone']);
$email = pg_escape_string($_POST['email']);
$position = pg_escape_string($_POST['position']);
$age = pg_escape_string($_POST['age']);
$location = pg_escape_string($_POST['location']);
$sector = pg_escape_string($_POST['sector']);

$lid_array = explode(",",$location);
$sid_array = explode(",",$sector);

$file = $_FILES['photo'];
$file_name = $_FILES['photo']['name'];
$file_tmp_name = $_FILES['photo']['tmp_name'];
$file_size = $_FILES['photo']['size'];
$file_type = $_FILES['photo']['type'];
$file_error = $_FILES['photo']['error'];

$file_ext = end(explode('.',$file_name)); // bierzemy rozszerzenie pliku
$allowed = array('png','jpg','jpeg');

if(in_array($file_ext,$allowed)){
    if($file_error === 0){





    }
    else{
        echo "Error of uplouddd in the file";
    }
}
else {
    echo "Bad file extension";
}
?>