<?php
    include_once 'dbh_inc.php';
        $res = pg_query($conn , "select photo_path from users where uid=10");
        $photo = pg_fetch_row($res);

        if(isset($_SESSION['uid'])){
            $id = $_SESSION['uid'];
            $res = pg_query($conn , "select * from users where uid='$id'");
            $row = pg_fetch_row($res);
            $res_lok = pg_query($conn , "select l.lid,country,city from location l,users u where l.lid=u.lid and uid=$id");
            $row_lok = pg_fetch_row($res_lok);
        }
        ?>


<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>NETITCOM</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="stylesheet" href="style2.css" type="text/css" />
</head>

<body>
	<div id="container">
	
			<div id="gora" >
				<div id="logo"> NETITCOM </div>
				<div id="Who"> Jesteś zalogowany jako: </div>
				<div style="clear:both;">  </div>
			</div>
						
			<div id="nawigacja">
                <a href="change_data_page.php"> <div class="odnosniki">Zmień Swoje Dane</div></a>
                <a href="find.php"><div class="odnosniki">Wyszukaj Pracownika</div></a>
                <?php if($row[10]) {
                    echo '<a href="admin.php"> <div class="odnosniki">Panel Administracyjny</div></a>';
                    }
                 ?>
                <div style="clear:both;">  </div>
            </div>
					
			<div id="srodek">
				<div id="zdjecie">
					<?php
                    echo "<img src='$row[9]' height='390' width='300'>"
                    ?>
				</div>
				
				<div id="prawe_dane">
                    <div class="dane">
                        <div class="dane_podzial"><?php echo "<h3>Imie i Nazwisko: </h3> <h2>$row[1] $row[2]"?></div>
                        <div class="dane_podzial"><?php echo "</h2><h3>Stanowisko: </h3><h2>$row[5]</h2>"?></div>
                        <div style="clear:both;">  </div>
					</div>
					<div class="dane">
                        <div class="dane_podzial"><?php echo "<h3>Telefon:</h3> <h2>$row[3]</h2>"?></div>
                        <div class="dane_podzial"><?php echo "<h3>E-mail:</h3> <h2>$row[4]</h2>"?></div>
                        <div style="clear:both;">  </div>
					</div>
					<div class="dane">
                        <div class="dane_podzial"><?php echo "<h3>Sektor:</h3> <h2>$row[8]</h2>"?></div>
                        <div class="dane_podzial"><?php echo "<h3>Lokalizacja:</h3> <h2>$row_lok[1],$row_lok[2]</h2>"?></div>
                        <div style="clear:both;">  </div>
					</div>
				</div>
                <div  id="dol"></div>
		    </div>
	</div>

	
</body>
</html>