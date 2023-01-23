<?php 
session_start();

if(isset($_SESSION['admin'])){

    require_once('app/fonctions.php');

    if(isset($_GET['page'])){
        

        switch ($_GET['page']){
            case 'home';
                getTemplate('homepage');
                break;
            case 'account';
                getTemplateApp('account','account');
                break;
            case 'category';
                getTemplateApp('category','category');
                break;
            default:
                getTemplate('pages-error-404');
                break;
        }

    }else{
        getTemplate('pages-error-404');
    }

}else{
    header('location:index.php');
}

?>