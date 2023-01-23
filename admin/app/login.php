<?php 
if( isset($_POST['submit']) and isset($_POST['password']) and isset($_POST['username']) )
{
    extract($_POST);
    if(!empty($password) and !empty($username)){
        
        //connexion a la base de donnee
        require_once('config/database.php');

        $req = $db->prepare(" SELECT *FROM admin WHERE user=? ");
        $req->execute(array($username));

        $responses = $req->fetch(PDO::FETCH_OBJ);
        
        if(isset($responses->user)){

            $userAdmin = $responses->user;
            $passAdmin = $responses->password;

            // VERIFICATION DU MOT DE PASSE
            if(password_verify($password, $passAdmin)){

                session_start();

                $_SESSION['admin'] = $username;

                //REDIRECTION A LA PAGE ADMIN
                header('location:admin.php?page=home');

            }else{
                $alert = array('alert-error', 'error password');
            }

        }else{
            $alert = array('alert-error', 'user name or password is incorrect');
        }

    }else{
        $alert = array('alert-error', 'error! empty fields');
    }
  
}










?>