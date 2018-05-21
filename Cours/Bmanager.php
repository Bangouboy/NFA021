<?php
include_once 'PDOConnection.php';

Class Bmanager{
    
    private $db;
    
    public function _construct($db){
        $this->db=$db;
    }
    public function login($nom, $passworda){
        try{
            $passworda=sha1($password);
            $req->execute($nom, $passworda);
            if ($req->rowCount()==1){
                $_SESSION['nom']=$nom;
                $_SESSION['password']=$passworda;
            }
        }
    }
}
