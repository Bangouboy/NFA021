<?php
if(isset($_POST['testEnvoi'])){
	if ((isset($_POST['nom']) && !empty($_POST['nom']))
				&& (isset($_POST['prenom'])) && !empty($_POST['prenom'])
	            && (isset($_POST['birthday']) && !empty($_POST['birthday'])
	            && (isset($_POST['email']) && !empty($_POST['email'])
	            && (isset($_POST['password']) && !empty($_POST['password'])
	                )))){
		extract($_POST);

			try{
				$bdd=new PDO('mysql:host=localhost;dbname=ateliernfa021', 'root', '');
				$reponse = $bdd->query("INSERT INTO utilisateur VALUES(default,'$nom','$prenom','$birthday','$email','$password')")or exit(print_r($bdd->errorInfo()));
				echo "Inscription OK";
				}
				
			catch (PDOException $e){
				die('Erreur : ' .$e->getMessage());
			}
			

		}
	}


?>