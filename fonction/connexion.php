<?php

   // fonction verifiant si le visiteur est connecté
   function bd(){
            try{
                $db = new PDO('mysql:host=localhost;dbname=gestioncompte','root','',array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8' ));
            }catch(PDOException $excep){
                    die("Erreur ! : ".$excep->getMessage());
            }
            return $db;
        }
        
     //permet de recuperer l'avatar poster par le visiteur
   function photo_client($avatar){
            $extension_upload = strtolower(substr(strrchr($avatar['name'],'.') ,1));
            $name = time();
            $nomavatar = str_replace(' ','',$name).".".$extension_upload;
            $name = "image/".str_replace('','',$name).".".$extension_upload;
            move_uploaded_file($avatar['tmp_name'],$name);
           return $nomavatar;
         }

    function counter(){
        $bd = bd();
        $req = $bd->query(" SELECT COUNT(*) FROM compte WHERE 1 ");
        return $req->fetch()[0];
    }
    
    function numero_compte(){
        $mot = 'CIB';
        $count = counter() + 1;
        $mot_pass = $mot.'-'.$count;
        // Affichage de quelque chose comme : Monday 8th of August 2005 03:12:46 PM

        echo $mot_pass;
    }

?>