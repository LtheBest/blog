<?php 
include('admin/config/database.php');
$allArticle = $db->prepare("SELECT *FROM article");
$allArticle->execute();

?>