<?php
    include_once 'dbh_inc.php';

        $res = pg_query($conn , "select photo_path from users where uid=10");
        $photo = pg_fetch_row($res);

        if(isset($_GET['login'])){
      //       echo $_GET['login'];
            $uid = $_GET['login'];
            $uid = (int)$uid;
            $res = pg_query($conn , "select * from users where uid=$uid");
            $row = pg_fetch_row($res);

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
						
			<div id="narzedzia">xxd</div>
					
			<div id="srodek">
					
				<div id="zdjecie_i_zmiana">
							
					<?php
                    echo "<div id='zdjecie' > <img src='$row[9]' height='320' width='270'></div>"

                    ?>
					<div id="zdjecie" style="min-height:50px;text-align:center;">Zmień swoje dane</div>
					<div > 
						<div class="dane2">
							<input disabled type="text" value="Zmień" style="width: 160px;margin-top:20px;">
						</div>
						
						<div class="dane2">
							<input disabled type="text" value="Pokój"  style="width: 200px;margin-top:20px;">		
						</div>
						
						<div style="clear:both;">  </div>
					</div>
				</div>
				
				<div id="prawe_dane">
					<div class="dane">
						<!--<input disabled type="text" value="Imię i Nazwisko">-->
                        <?php echo "<label>$row[1]</label>"?>
						<input disabled type="text" value="Stanowisko">
						<input disabled type="text" value="Iasfdasdfxd">
						<input disabled type="text" value="Sasfdassadfxd">
					</div>
					<div class="dane">
						<input disabled type="text" value="Lokalizacja">
						<input disabled type="text" value="Pokój">
						<input disabled type="text" value="Poasdfsdaasj">
						<input disabled type="text" value="Stasadfasdfxd">
					</div>
					<div class="dane">
						<input disabled type="text" value="Telefon">
						<input disabled type="text" value="E-mail">
						<input disabled type="text" value="sfadsdfsad">
						<input disabled type="text" value="Stanowiskoxd">
					</div>
				</div>
				
		</div>	
		
		<div  id="dol" style="clear:both;"></div>
	</div>

	
</body>
</html>