<?php
    include_once 'dbh_inc.php';

    $login = pg_escape_string($conn,$_POST['username']);
    $password = pg_escape_string($conn,$_POST['password']);

    $sql ="select * from login where username='$login'";
    $res =pg_query($conn,$sql);
    $res_login_check = pg_num_rows($res);
    echo $res_login_check;
    echo $login;


    if($res_login_check==1){
        $login_result = pg_fetch_assoc($res);
        if($password==$login_result['password']){
            $_SESSION['username']=$login;
            $_SESSION['password']=$password;
            $_SESSION['uid']=$login_result['uid'];
            $xd = $login_result['uid'];
            header("Location:main_page.php?login=$xd");
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