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

?>