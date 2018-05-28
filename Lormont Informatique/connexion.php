<?php
session_start();
include_once 'PDOConnection.php';
if (isset($_POST['submit'])){
    $mail=$_POST['mail'];
    $passworda=$_POST['passworda'];
    if(empty($mail)){
        echo"<div class='erreur'> Veuillez saisir votre email</div>";
    } else if (empty($passworda)){
        echo "<div class='erreur'> Veuillez saisir votre mot de passe</div>";
    }
    else {
        
        try{
            $bdd=PDOConnection::getInstance();
            $password=sha1($passworda);
            $reponse = $bdd->prepare("SELECT * FROM adherent WHERE mail= :login AND passworda= :password")or exit(print_r($bdd->errorInfo()));
            $reponse->bindParam(':mail', $mail, PDO::PARAM_STR);
            $reponse->bindParam(':passworda', $passworda, PDO::PARAM_STR);
            $reponse->execute();
            
        }catch (Exception $e){
            die('Erreur : ' .$e->getMessage());
        }
        if ($reponse->rowCount()==1){
            $_SESSION['name']=$mail;
            $_SESSION['mdp']=$passworda;
            header('Location:adherent.php');
            
        }else {
            echo utf8_encode("<div class='erreur'> Mail ou mot de passe erroné !!</div>");
        }
    }
}
?>

<!-- connexion.php est la page de connexion pour les adhérents de l'association -->

<html>
	<head>
	
	<!-- Nom dans l'onglet -->
		
		<meta charset="utf-8"/>
		<link href="connexion.css" type="text/css" rel="stylesheet"/>
		<link href="https://fonts.googleapis.com/css?family=Hind+Vadodara|Indie+Flower" rel="stylesheet">
		<title>Lormont Informatique</title>
	</head>
	<style>
	a:link {
		color: #f0f9f4;
		text-decoration: none;
	}
	a:visited {
		color: #f0f9f4;
		font-style: italic;
	}
	a:hover {
		color: #cf3333;
		text-decoration: none;
	}
	a:active {
		background-color: transparent;
		text-decoration: underline;
	}
	</style>
	<body>
	
	<!-- En-tête avec logo -->
	
	<header>
		<table class="tableHead">
			<tr>
				<td id="tdLogo"><a href="index.html"><img id="logo" src="content\uploads\charte_graphique\logo\logo_lia.png" width=50%></a></td>
				<td id="tdLIAHead"><a href="index.html"><p><span id="vert_clair">Lormont </span><span id="bleu">Informatique </span><span id="vert_clair">Association</span></p></a></td>
				<td id="retouraccueil"><a href="index.html">Accueil</a></td>
				<td id="pageprecedente"><a href="#" onClick="history.back()">Retour</a></td>
			</tr>
		</table>
		<table class="tabledep">
			<tr>
				<td id="tdblankdep1">
				<a href="connexion.php"><img id="connexion" src="content\uploads\charte_graphique\icones\connexion2.png"></a>
				</td>
				<td id="tddep"><p id="sousTitre">< J'ai un compte ></p></td>
				<td id="tdblankdep2"></td>
			</tr>
		</table>
	</header>
							
						<!--<td class="retouraccueil"><a href="index.html">Accueil</a></td>
	
	<!-- Formulaire de connexion -->
	
	<form method="post" action="login.php">
	
		<table>
			<tr>
				<td>Mail :</td>
				<td><input type="text" name="mail" /></td>
			</tr>
			<tr>
				<td>Mot de passe :</td>
				<td><input type="password" name="passworda" /></td>
			</tr>

		</table><br>

		<div>
			<input type="submit" value="Connexion" name="submit" /> <input type="reset" value="Effacer" /><br> <br>
			<a href="index.html">Pas encore membre ?</a>
		</div>
	</form>
	
	
	<!-- Bas-de-page -->
	
		<footer>
			<table class="tableFootborder">
				<tr>
				</tr>
			</table>
			<table class="tableFoot">
				<td class="tdFooter" id="tdFooter1">© Site créé par Nicolas Hérole</td>
				<td class="tdFooter" id="tdFooter2">
				<a href="https://www.facebook.com/Lormontinformatique/"><img id="FBfooter" src="content\uploads\image\logos\facebook.png" width=100%></a>
				</td>
				<td class="tdFooter" id="tdFooter2">
					<p><strong>Pour nous contacter :</strong></p>
					<p>Tel : 06.38.86.15.56</p>
					<p>Mail : contact@lormont-informatique.fr</p>
					<p>Formulaire de contact (<em>Bientôt disponible !</em>)</a></p>
					<!--<p><a href="contact.html">Formulaire de contact (cliquez !)</a></p>-->
				</td>
			</table>
		</footer>		
	</body>
<html/>