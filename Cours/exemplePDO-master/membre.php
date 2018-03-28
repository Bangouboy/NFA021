<?php
session_start();
if(isset($_SESSION['username'])){
	echo "Bonjour ".$_SESSION['username'];
	?>
<?php 
}else header('Location:login.php')

?>
