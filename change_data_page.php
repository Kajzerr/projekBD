<?php
include_once 'dbh_inc.php';
$data_location=array();
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
                <h1>Zmiana Danych Użytkownika</h1>
                <h3>Wypełnij pola danych które chcesz zmienić</h3>
                <form  action="change_data.php" method="POST" enctype="multipart/form-data"> <!-- enc zeby mozna bylo dodawac zdjecia-->
                    <label>Last Name</label><input type="text" name="chlast_name" > <br>
                    <label>Phone Number</label><input type="text" name="chphone" > <br>
                    <label>E-mail</label><input type="text" name="chemail" >   <br>
                    <label>Position</label><input type="text" name="chposition"><br>
                    <label>Age</label><input type="number" name="chage">    <br>
                    <label>Location</label><select name="chlocation">
                        <?php
                        foreach ($data_location as $d)
                            echo "<option>$d[0],$d[1],$d[2]</option>"
                        ?>
                    </select><br>
                    <button class="btn-primary btn" type="submit" name="submit">
                        Send
                    </button>
                </form>
	        </div>
    </div>
	
</body>
</html>