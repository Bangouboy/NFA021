<?php
session_start();
if(isset($_SESSION['nom'])){
    echo "Bonjour ".$_SESSION['nom'];
    ?>
<?php 
}else header('Location:login.php')

?>