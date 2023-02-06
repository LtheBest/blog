<?php

function alertMessage($alert)
{
    if(isset($alert))
    {
        $result= '<div class=' .$alert[0]. '>' .$alert[1]. '</div>';
        return $result;
    }
}

function getTemplate($template){

    require_once('templates/'.$template.'.php');
}
function getApp($app){

    require_once('app/'.$app.'php');
}
function getTemplateApp($template,$app){

    require_once('app/'.$app.'.php');
    require_once('templates/'.$template.'.php');
}
function getHeader(){
    
    require_once('templates/partials/header.php');
}

function getAdmin(){
    return $_SESSION['admin'];
}

function getFooter(){

    require_once('templates/partials/footer.php');
}
// fonction pour rendre plus compréhensible url a l'utilisateur

function slug($text){
    $text = preg_replace('~[^\pL\d]+~u', '-', $text); 
    $text = iconv('utf-8','us-ascii//TRANSLIT', $text);
    $text = preg_replace('~[^-\w]+~','', $text);
    $text = trim($text,'-');
    $text = preg_replace('~-+~','-', $text);
    $text = strtolower($text);

    if(empty($text)){
        return 'n-a';
    }else{
        return $text;
    }

}
?>