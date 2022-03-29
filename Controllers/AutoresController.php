<?php
include_once 'Model/AutoresModel.php';
include_once 'Controller.php';
require_once 'core/validaciones.php';
class AutoresController extends Controller
{

    private  $model;
    function __construct()
    {
        $this->model=new AutoresModel();
    }

    public function index()
    {
        $viewBag=array();
        $viewBag['autores']=$this->model->get();
       //var_dump($viewBag);
       $this->render('index.php', $viewBag);
    }

    public function details($id){
        var_dump($this ->model->get($id));
    }

    public function create(){
        $this->render('new.php');

    }

    public function add()
    {       
         extract($_POST);
        $errores=array(); 
    if (isset($_POST["Guardar"])) {
       
     
        if(!isset($codigo_autor) || estaVacio($codigo_autor))
        {
        array_push($errores, "Debes ingresar el codigo de autor");
        }
        else if(!esCodigoAutor($codigo_autor))
        {
            array_push($errores, "El codigo autor no cumple con el formato AUT000");
        }

        if(!isset($nombre_autor) || estaVacio($nombre_autor))
        {
        array_push($errores, "Debes ingresar el nombre del autor");
        }

        else if(!esText($nombre_autor))
        {
            array_push($errores, "El nombre del autor no debe incluir numeros o caracteres especiales");
        }
         if(!isset($nacionalidad) || estaVacio($nacionalidad))
        {
        array_push($errores, "Debes ingresar la nacionalidad");
        }
        else if(!esText($nacionalidad))
        {
            array_push($errores, "La nacionalidad no debe incluir numeros o caracteres especiales");
        }
        $autor['codigo_autor']=$codigo_autor;
            $autor['nombre_autor']=$nombre_autor;
            $autor['nacionalidad']=$nacionalidad;

        if (count($errores) > 0) {

            $viewBag=array();
            $viewBag['errores']=$errores;
            $viewBag['autor']=$autor;
            $this->render("new.php",$viewBag);

        }
        else{
            if($this->model->create(($autor))>0)
            {
             header('location:'.PATH.'/Autores/index');
         }
         else{
             array_push($errores, "Ya existe un autor con este codigo");
             $viewBag['errores']=$errores;
             $viewBag['autor']=$autor;
             $this->render("new.php",$viewBag);
         }
         }

    } 


    }
    public function delete($codigo_autor)
    {
       $this->model->delete($codigo_autor);
       
       header('location:' . PATH . '/Autores/index');
    
    }
    
    public function edit($codigo_autor)
    {
    if (isset($_POST["Guardar"])) {
       
        extract($_POST);
        
        $errores=array(); 
     
        if(!isset($codigo_autor) || estaVacio($codigo_autor))
        {
        array_push($errores, "Debes ingresar el codigo de autor");
        }
        else if(!esCodigoAutor($codigo_autor))
        {
            array_push($errores, "El codigo autor no cumple con el formato AUT000");
        }

        if(!isset($nombre_autor) || estaVacio($nombre_autor))
        {
        array_push($errores, "Debes ingresar el nombre del autor");
        }

        else if(!esText($nombre_autor))
        {
            array_push($errores, "El nombre del autor no debe incluir numeros o caracteres especiales");
        }
         if(!isset($nacionalidad) || estaVacio($nacionalidad))
        {
        array_push($errores, "Debes ingresar la nacionalidad");
        }
        else if(!esText($nacionalidad))
        {
            array_push($errores, "La nacionalidad no debe incluir numeros o caracteres especiales");
        }
        $autor['codigo_autor']=$codigo_autor;
        $autor['nombre_autor']=$nombre_autor;
        $autor['nacionalidad']=$nacionalidad;


        if (count($errores) > 0) {

            $viewBag=array();
            $viewBag['errores']=$errores;
            $viewBag['autor']=$autor;
            $viewBag["data_temp"] = $autor;
            $this->render("Edit.php",$viewBag);

        }
        else{
            if($this->model->update(($autor))>0)
            {
             header('location:'.PATH.'/Autores/index');
         }
         
         }
    }
 
    else {
        $autor = $this->model->get($codigo_autor)[0];
        $viewBag["data_temp"] = $autor;
        $this->render('Edit.php', $viewBag);
    }

    }


}
