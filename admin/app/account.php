<?php
if ($_GET['action']){

    //DECONNEXION
    if($_GET['action']=='logout'){

        // ACTIVATION DES SESSIONS 
       session_start();

       // SUPPRESSION DES SESSIONS 

       session_destroy();
       // REDIRECTION A LA PAGE D'ACCUEIL APRES LA DECONNEXION 
       header('location:index.php');

       //MISE AJOUR DU COMPTE 
    }elseif($_GET['action']=='updateAccount'){
        if(isset($_POST['submit'])){
            extract($_POST);
            if(!empty($username) and !empty($oldpassword) and !empty($newpassword) and !empty($confirmnewpassword)){

                if($newpassword==$confirmnewpassword){
                    $uppercase= preg_match("@[A-Z]@",$newpassword);
                    $lowercase= preg_match("@[a-z]@",$newpassword);
                    $number= preg_match("@[0-9]@",$newpassword);

                    if(!$lowercase || !$uppercase || !$number || (strlen($newpassword)<8)){
                        
                        $alert = array('alert-error', 'the new password must be composed of an upper case, a lower case and must be contain more than eight characters ');

                    }else{
                        require_once('config/database.php');

                        $req = $db->prepare(" SELECT *FROM admin WHERE user=? ");
                        $req->execute(array(getAdmin()));

                        $responses = $req->fetch(PDO::FETCH_OBJ);
                        
                        if(isset($responses->user)){

                            $passAdmin = $responses->password;

                            // VERIFICATION DU MOT DE PASSE
                            if(password_verify($oldpassword, $passAdmin)){

                                $newPasswordHash= password_hash($newpassword, PASSWORD_BCRYPT);
                                
                                $updateAccount = $db->prepare("UPDATE admin set user=?,password=? WHERE user=?");
                                $updateAccount->execute(array($username,$newPasswordHash,getAdmin() ));
                                

                                // DECONNEXION DE L'UTILISATEUR
                                header('location:admin.php?page=account&action=logout');
                                
                            }else{
                                $alert = array('alert-error', 'old password incorrect');
                            }

                        }else{
                            $alert = array('alert-error', "error this account doesn't exist");
                        }
                    
                    }
                }else{
                    $alert = array('alert-error', 'the new password and confirmation password are different');
                }

            }else{
                $alert = array('alert-error', 'no fields should be empty');
            }

        }
    }
    
    else{
        getTemplate('pages-error-404');
    }
}else{
    getTemplate('pages-error-404');
}

?>