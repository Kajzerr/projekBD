<?php
include_once 'dbh_inc.php';
$data_location=array();
$data_sector=array();
$res = pg_query($conn,'select * from sector');
if (pg_num_rows($res)>0){
    while ($row=pg_fetch_row($res)) {
        $data_sector[]=$row;
    }
}
$res = pg_query($conn,'select * from location');
if (pg_num_rows($res)>0){
    while ($row=pg_fetch_row($res)) {
        $data_location[]=$row;
    }
}
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <title>NETITCOM</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="bootstrap-3.3.7/dist/css/bootstrap-theme.css" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <style>
        .jumbotron
        {
            text-align: center;
        }
        label
        {
            width: 15%;
        }
        select
        {
            width: 20%;
        }
        input
        {
            width: 20%;
        }
    </style>

</head>


<body>
<div class="container-fluid">
    <section class="jumbotron row">
        <h1>Adminitrator Page</h1>
    </section>
    <section>
        <div>
            <h3>Add User</h3>
            <form  action="add_user.php" method="POST" enctype="multipart/form-data"> <!-- enc zeby mozna bylo dodawac zdjecia-->
           <label>Name</label><input type="text" name="name" required>
           <label>Last Name</label><input type="text" name="last_name" required> <br>
           <label>Phone Number</label><input type="text" name="phone" required>
           <label>E-mail</label><input type="text" name="email" required>   <br>
           <label>Position</label><input type="text" name="position" required>
           <label>Age</label><input type="number" name="age">    <br>
           <label>Location</label><select name="location">
                    <?php
                        foreach ($data_location as $d)
                            echo "<option>$d[0],$d[1],$d[2]</option>"
                    ?>
                </select>
           <label>Sector</label><select name="sector">
                    <?php
                    foreach ($data_sector as $d)
                        echo "<option>$d[0],$d[1]</option>"
                    ?>
                </select><br>
            <label>Photo</label><input type="file" name="photo">
                <button class="btn-primary btn" type="submit" name="submit">
                    Send
                </button>
            </form>
        </div>


    </section>
</div>

</body>
</html>

