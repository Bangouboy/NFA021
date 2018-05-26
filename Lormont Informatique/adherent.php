<?php
session_start();
if(isset($_SESSION['name'])){
	echo "Bonjour ".$_SESSION['name'];
	?>
<?php 
}else header('Location:connexion.php')

?>
