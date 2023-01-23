<?php

$database = array(
    'DB_HOST' => 'localhost',
    'DB_USER' => 'root',
    'DB_PASSWORD' => 'root',
    'DB_NAME' => 'blog',
    'DB_SHARSET' => 'utf8'
);

try{
    $db = new PDO("mysql:host=".$database['DB_HOST']."; 
                        dbname=".$database['DB_NAME']."; 
                        charset=".$database['DB_SHARSET'], 
                                    $database['DB_USER'],
                                    $database['DB_PASSWORD']);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_CASE, PDO::CASE_LOWER);

}catch(PDOException $e){
    $alert = array('alert-error', "database connexion error"

    //pour afficher a quellle niveau se trouve l'erreur
    // .$e->getMessage()
);
    
}

?>