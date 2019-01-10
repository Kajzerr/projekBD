<?php
    include_once 'dbh_inc.php';

    $login = pg_escape_string($conn,$_POST['username']);
    $password = pg_escape_string($conn,$_POST['password']);

    $sql ="select * from login where username='$login'";
    $res =pg_query($conn,$sql);
    $res_login_check = pg_num_rows($res);                       // liczba zwroconych wierszy

    if($res_login_check==1){
        $login_result = pg_fetch_assoc($res);
        if($password==$login_result['password']){
            $xd = $login_result['uid'];
            $sql ="select * from users where uid=$xd";
            $res =pg_query($conn,$sql);
            $result = pg_fetch_assoc($res);
            $xd = $result['safe_id'];
                session_start();
                $_SESSION['safe_id']=$result['safe_id'];
            header("Location:main_page.php?id=$xd");
            exit();
        }
        else{
            echo "Invalid password";
        }
    }
    else{
        header('Location:index.php?login=error');
        exit();
    }
?>