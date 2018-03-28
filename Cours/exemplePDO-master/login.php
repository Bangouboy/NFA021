<?php
// TODO
?>

<html>
<head>
<title>Formulaire de connexion</title>
<link href="style.css" rel="stylesheet" type="text/css"></link>
</head>
<body>
	<form method="post" action="login.php">
	
		<table>
			<tr>
				<td>Login :</td>
				<td><input type="text" name="login" />
				</td>
			</tr>
			<tr>
				<td>Mot de passe :</td>
				<td><input type="password" name="password" />
				</td>
			</tr>

		</table><br>

		<div class="toto">
			<input type="submit" value="Login" name="submit" /> <input
				type="reset" value="Effacer" /><br> <br> <a href="index.html">Pas
				encore membre ?</a>
		</div>
	</form>
</body>
</html>
