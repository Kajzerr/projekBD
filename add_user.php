<?php
include_once 'dbh_inc.php';
$query ='select uid from users order by uid desc limit 1';
$res = pg_query($conn,$query);
$current_max_id = pg_fetch_row($res);
echo $current_max_id[0].'<br>';

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

$xd = explode('.',$file_name); // bierzemy rozszerzenie pliku
$file_ext = end($xd);
$allowed = array('png','jpg','jpeg');

if(in_array($file_ext,$allowed)){
    if($file_error === 0){
        $new_uid = (string)((int)$current_max_id[0] + 1);
        $file_new_name = $new_uid."_photo.".$file_ext;
        echo $file_new_name;

       /* $path = 'uploads';
        $all_files = scandir($path);
        foreach ( $all_files as $a) {
            echo $a;
            $pp = explode('_' , (string)$a);
            if($pp[0] == $new_uid){
                if(unlink('uploads/'.(string)$a)){
                    echo 'success';
                }
            }
        }*/
       $file_destination = 'uploads/'.$file_new_name;
       move_uploaded_file($file_tmp_name,$file_destination);

       $insert = "insert into users(name,last_name,phone,email,position,age,lid,sid,photo_path) 
        values ('$name' , '$last_name' , '$phone' , '$email' , '$position' , $age , $lid_array[0] , $sid_array[0] , '$file_destination')";
        if(pg_query($conn,$insert)){
            echo "OK";
            $new_uid_int = (int)$new_uid;
            $login = $last_name.$name[0];
            $passwd = bin2hex(random_bytes(5));
            $insert ="insert into login values('$new_uid_int','$login','$passwd')";
            if(pg_query($conn,$insert)){
                echo "OK";
            }
            else{
                echo "eeeror";
            }
        }
        else{
            pg_query($conn , "select setval('user_sec' , $current_max_id[0])");
            echo "eeeror ";
        }


    }
    else{
        echo "Error of uplouddd in the file";
    }
}
else {
    echo "Bad file extension";
}

?>