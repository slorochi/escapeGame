<?php

ini_set("display_errors",1); 

require_once "../vendor/autoload.php";

require_once "../src/core/rooter.php";


// Construction des routes
/* $route->map('GET','/','accueil','accueil');
$route->map('GET','/catalogue','catalogue','catalogue'); 
$route->map('GET','/contact','contact','contact'); 
$route->map('GET','/connexion','connexion','connexion'); 
$route->map('GET','/leaderboard','leaderboard','leaderboard');  */


// Récupère une route si match sinon false
/* $match = $route->match();
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
} */

/* appel le controller pour test logique
 *//* require "controller/layout.php"; */
require "views/layout.php";

?>