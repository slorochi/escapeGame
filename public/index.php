<?php
require_once "../vendor/autoload.php";
$route = new AltoRouter();
$page_content ="";

// Construction des routes
$route->map('GET','/','accueil','accueil');
/* $route->map('GET','/contact','contact','contact'); */
/* $route->map('GET','/[*]-[i:id]',function($id){
    ob_start();
    if(file_exists('views/article-'.$id.'.php')){
        require "views/article-".$id.".php";
    }
    else{
        require_once "views/404.php";
    }
    return ob_get_clean();
}); */

// Récupère une route si match sinon false
$match = $route->match();
if($match){
    if(is_callable($match['target'])){
        $page_content = call_user_func_array($match['target'],$match['params']);
    }
    else{
        ob_start();
        require "views/{$match['target']}.php";
        $page_content = ob_get_clean();
    }
}
else{
    ob_start();
    require "views/404.php";
    $page_content = ob_get_clean();
}

require "views/layout.php"

?>