<?php 
include('admin/config/database.php');

if(($_GET['page']=='BlogArticle') and isset($_GET['id'])){

    $singleArticle = $db->prepare("SELECT *FROM article WHERE id=? ");
    $singleArticle->execute(array($_GET['id']));

    $response = $singleArticle->fetch(PDO::FETCH_OBJ);
}

?>