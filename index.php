<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>NETITCOM</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="stylesheet" href="style.css" type="text/css" />
	
</head>

<body>
	<div id="title"> NETITCOM </div>
	<div id="container">
		<form action="login_validate.php" method="POST">
			
			<input type="text" placeholder="username" name="username" onfocus="this.placeholder=''" onblur="this.placeholder='login'" >
			
			<input type="password" placeholder="password" name="password" onfocus="this.placeholder=''" onblur="this.placeholder='hasło'" >
			
			<input type="submit" value="Log In" name="submit">
			
		</form>
	</div>
	
</body>
</html>