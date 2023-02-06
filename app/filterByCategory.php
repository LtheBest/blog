<?php 
if((isset($_GET['catId']))){
    include("admin/config/database.php");

    $allArticle = $db->prepare("SELECT *FROM article WHERE id_category=?");
    $allArticle->execute(array($_GET['catId']));
}

?>