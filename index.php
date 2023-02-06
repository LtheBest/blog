<?php 
require_once('admin/app/fonctions.php');
getHeader();
//require_once('templates/partials/header.php')


if(!isset($_GET['page'])){
    
    //require_once('admin/config/database.php');
    getTemplateApp('home','home');
    
}elseif($_GET['page']=='BlogArticle'){

    getTemplateApp('BlogArticle','BlogArticle');

}elseif($_GET['page']=='filter'){
    getTemplateApp('filterByCategory','filterByCategory');
}




getFooter();
//require_once('templates/partials/footer.php')
?>