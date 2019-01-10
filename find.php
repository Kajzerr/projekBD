<?php
include_once 'dbh_inc.php';
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
	<link rel="stylesheet" href="style2.css" type="text/css" />

    <style>
        h1
        {
            padding-top: 50px;
        }
        label
        {
            width: 15%;
            font-size: 22px;
            padding: 10px;
        }
        select
        {
            width: 15%;
        }
        input
        {
            width: 15%;
        }
        button
        {
            width: 5%;
        }
    </style>
</head>

<body>
	<div id="container">
			<div id="nawigacja">
                <a href="main_page.php"><div class="odnosniki" style="width:400px; ">Powrót do strony głównej</div></a>
            </div>
					
			<div id="srodek">
                <h1>Znajdź użytkownika Użytkownika</h1>
                <h3>Wypełnij co najmniej jedno z poniższych pól</h3>
                <form  action="find.php" method="POST" enctype="multipart/form-data">
                    <label>Last Name</label><input type="text" name="fname" >
                    <label>Last Name</label><input type="text" name="flast_name" >
                    <label>Phone Number</label><input type="text" name="fphone" > <br>
                    <button class="btn-primary btn" type="submit" name="submit">
                        Send
                    </button>
                </form>
            </div>
            <?php

                if ( isset($_POST['fname']) || isset($_POST['flast_name']) || isset($_POST['fphone']) ) {
                    $fname = '%'.$_POST['fname'].'%';
                    $flast_name = '%'.$_POST['flast_name'].'%';
                    $fphone = '%'.$_POST['fphone'].'%';
                    $res = pg_query($conn, "select u.name,u.last_name,u.phone,u.email,u.position,l.country,l.city,l.street 
                    from users u,location l where l.lid=u.lid and u.name like '$fname'and u.last_name like '$flast_name' 
                    and u.phone like '$fphone';");
                    if (pg_num_rows($res) > 0) {
                        while ($row = pg_fetch_row($res)) {
                            $data[] = $row;
                        }
                    }

                    echo '<table class="table table-striped table-bordered" style="margin-top: 40px;background-color: white;text-align: center;">
                    <thead>                                 <!-- naglowek tablicy-->
                    <tr>                                    <!-- linijka naglowka tablicy (table row) -->
                        <th>Imie</th>                         <!-- naglowek 1 kolumny, naglowek 2, naglowek 3.... -->
                        <th>Nazwisko</th>
                        <th>Telefon</th>
                        <th>e-mail</th>
                        <th>Stanowisko</th>
                        <th>Lokalizacja</th>
                    </tr>
                    </thead>
                    <tbody> ';


                  foreach ($data as $d) {
                      echo "<tr>
                        <td>$d[0]</td><td>$d[1]</td><td>$d[2]</td><td>$d[3]</td><td>$d[4]</td><td>$d[5],$d[6],$d[7]</td>
                        </tr>";
                  }
                  echo '</tbody>
                    </table>\';';
                    $data[] = '';

                }
                    ?>



    </div>
	
</body>
</html>