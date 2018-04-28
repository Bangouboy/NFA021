<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<?php
include_once 'PDOConnection.php';
if(isset($_POST['testEnvoi'])){
    if ((isset($_POST['nom']) && !empty($_POST['nom']))
        && (isset($_POST['prenom']) && !empty($_POST['prenom']))
        && (isset($_POST['email']) && !empty($_POST['email']))
        && (isset($_POST['passworda']) && !empty($_POST['passworda']))
        && (isset($_POST['passwordb']) && !empty($_POST['passwordb']))){
            extract($_POST);
            
            if($passworda != $passwordb){
                echo "Les mots de passe doivent être identiques";
            } else {
                
                try{
                    $bdd=PDOConnection::getInstance();
                    $req=$bdd->prepare("select * from utilisateur where email = ?");
                    $req->execute(array($email));
                    if($req->rowCount() !=0 ){
                        echo "Cette adresse email existe déjà dans la base !!";
                    }else {
                        $passworda = sha1($passworda);
                        $reponse = $bdd->prepare("INSERT INTO utilisateur VALUES(default,?,?,?,?)")or exit(print_r($bdd->errorInfo()));
                        $reponse->execute(array($nom, $prenom, $email, $passworda));
                        header("Location:bienvenue.php");
                    }
                    
                }catch (PDOException $e){
                    die('Erreur : ' .$e->getMessage());
                }             
            }
    }
}
?>
</head>
</html>