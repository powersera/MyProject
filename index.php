<?php
/**
 * Created by PhpStorm.
 * User: Serhii
 * Date: 08.11.2017
 * Time: 22:54
 */

require_once 'core/library/mainLib.php';
require_once 'core/library/dataBase.php';
require_once 'core/library/Validator.php';





$url = $_GET['url'];
$urlSegments = explode('/', $_GET['url']);


$contrName = (empty($urlSegments[0])) ? 'main' : $urlSegments[0];

$actionName = (empty($urlSegments[1])) ? 'action_index' : 'action_'.$urlSegments[1];


//var_dump($contrName);
//var_dump($actionName);

if (file_exists("core/controllers/".$contrName.'.php')){
    require_once "core/controllers/".$contrName.'.php';
    if(function_exists($actionName)){
        $actionName();

}else{
    // todo show 404 page
    echo "Ther is no such a FUNCTION $actionName";


}
}else {
    //todo show 404 page
    echo "There is no such a FILE $contrName";
}


