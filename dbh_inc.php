<?php
session_start();
$data_users=array();
$conn = pg_connect("host=localhost dbname=pawel user=postgres password=postgres") or die("Connection error");
$res = pg_query($conn,'select * from users');
if (pg_num_rows($res)>0){
    while ($row=pg_fetch_assoc($res)) {
        $data_users[]=$row;
    }

}
/*foreach ($data_users as $d ){
    echo $d['name']." ".$d['last_name'];

}*/
