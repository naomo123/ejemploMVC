<?php
abstract class Controller{

//view nombre de la vista q desean abrir

public function render($view, $viewBag=array()){
//formando la ruta del doc
$file="Views/".static::class ."/".$view;
$file=str_replace("Controller","",$file);
if(is_file($file)){
    extract($viewBag);
    ob_start();
    //abrimos el buffer
    require($file);
    $content=ob_get_contents();
    //leyendo el contenido del buffer
    ob_end_clean();
    echo $content;

}

else{

    echo"<h1>   NO EXISSTE ESTE ARCHIVO </h1>";
}
}

}