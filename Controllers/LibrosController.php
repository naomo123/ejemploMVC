<?php
include_once 'Model/LibrosModel.php';
include_once 'Model/EditorialesModel.php';
include_once 'Model/AutoresModel.php';
include_once 'Model/GenerosModel.php';
include_once 'Controller.php';
require_once 'core/validaciones.php';
class LibrosController extends Controller
{

    private $model;
    private $modelA;
    private $modelE;
    private $modelG;
    function __construct()
    {
        $this->model = new LibrosModel();
        $this->modelA = new AutoresModel();
        $this->modelE = new EditorialesModel();
        $this->modelG = new GenerosModel();
    }

    public function index()
    {
        $viewBag = array();
        $viewBag['libros'] = $this->model->get();
        $this->render('index.php', $viewBag);
    }

    public function details($id)
    {
       // var_dump($this->model->get($id));
     echo  json_encode($this->model->get($id)[0]);

    }

    public function create()
    {
        
        $viewBag = array();
        $viewBag["autores"] = $this->modelA->get();
        $viewBag["editoriales"] = $this->modelE->get();
        $viewBag["generos"] = $this->modelG->get();
        $this->render('new.php', $viewBag);
    }

    public function add()

    {
        $viewBag = array();
        $viewBag["autores"] = $this->modelA->get();
        $viewBag["editoriales"] = $this->modelE->get();
        $viewBag["generos"] = $this->modelG->get();
        extract($_POST);
        if (isset($_POST["Guardar"])) {
            $errores = $this->Validate($_POST);
           
            $libro['codigo_libro']=$codigo_libro;
            $libro['nombre_libro']=$nombre_libro;
            $libro['existencias']=$existencias;
            $libro['precio']=$precio;
            $libro['codigo_autor']=$codigo_autor;
            $libro['codigo_editorial']=$codigo_editorial;
            $libro['id_genero']=$id_genero;
            $libro['descripcion']=$descripcion;

            if (count($errores) > 0) {

                $viewBag=array();
                $viewBag['errores']=$errores;
                $viewBag['libro']=$libro;
                $this->render("new.php",$viewBag);
    
            }
            else{
                if($this->model->create(($libro))>0)
                {
                 header('location:'.PATH.'/Libros/index');
             }
             else{
                 array_push($errores, "Ya existe un libro con este codigo");
                 $viewBag['errores']=$errores;
                 $viewBag['libro']=$libro;
                 $this->render("new.php",$viewBag);
             }
             }
        } 
    }
    public function delete($id){
        $this->model->delete($id);
        header('location:' . PATH . '/Libros/index');
    }
    public function edit($codigo_libro){

        $viewBag = array();
        $viewBag["autores"] = $this->modelA->get();
        $viewBag["editoriales"] = $this->modelE->get();
        $viewBag["generos"] = $this->modelG->get();

        extract($_POST);

        if (isset($_POST["Guardar"])) {

            $errores = $this->Validate($_POST);
            
            $libro['codigo_libro']=$codigo_libro;
            $libro['nombre_libro']=$nombre_libro;
            $libro['existencias']=$existencias;
            $libro['precio']=$precio;
            $libro['codigo_autor']=$codigo_autor;
            $libro['codigo_editorial']=$codigo_editorial;
            $libro['id_genero']=$id_genero;
            $libro['descripcion']=$descripcion;

            if (count($errores) > 0) {

                $viewBag=array();
                $viewBag["autores"] = $this->modelA->get();
                $viewBag["editoriales"] = $this->modelE->get();
                $viewBag["generos"] = $this->modelG->get();
                $viewBag['errores']=$errores;
                $viewBag['data_temp'] = $_POST;
                $this->render("Edit.php",$viewBag);
    
            }
            else{
                if($this->model->update(($libro))>0)
                {
                 header('location:'.PATH.'/Libros/index');
             }
             
             }

        }
        else {
            $libro = $this->model->get($codigo_libro)[0];
            $viewBag["data_temp"] = $libro;
            $this->render('Edit.php', $viewBag);
        }
    
 
    
    }
    private function Validate($data)
    {
        $errores=array(); 
            
        extract($data);
        if(!isset($codigo_libro) || estaVacio($codigo_libro))
        {
        array_push($errores, "Debes ingresar el codigo de libro");
        }
        else if(!esCodigoLibro($codigo_libro))
        {
            array_push($errores, "El codigo libro no cumple con el formato LIB000001");
        }

        if(!isset($nombre_libro) || estaVacio($nombre_libro))
        {
        array_push($errores, "Debes ingresar el nombre del libro");
        }

        else if(!esText($nombre_libro))
        {
            array_push($errores, "El nombre del libro no debe incluir numeros o caracteres especiales");
        }
         if(!isset($existencias) || estaVacio($existencias))
        {
        array_push($errores, "Debes ingresar las existencias");
        }
        else if(!esNumero($existencias))
        {
            array_push($errores, "La existencias no debe incluir texto o caracteres especiales");
        }
        if(!isset($precio) || estaVacio($precio))
        {
        array_push($errores, "Debes ingresar el precio del libro");
        }
        else if(!esNumero($precio))
        {
            array_push($errores, "El precio no debe incluir texto o caracteres especiales, solo numeros");
        }
        if (!isset($codigo_autor) || estaVacio($codigo_autor))
           { 
            array_push($errores, "Debes ingresar el autor");
           }
        if (!isset($codigo_editorial) || estaVacio($codigo_editorial))
        { 
            array_push($errores, "Debes ingresar la editorial");
        }
        if (!isset($id_genero) || estaVacio($id_genero))
        { 
            
            array_push($errores, "Debes ingresar el genero");
            
        }
        if(!isset($descripcion) || estaVacio($descripcion))
        {
        array_push($errores, "Debes ingresar una descripcion del libro");
        }

        else if(!esText($descripcion))
        {
            array_push($errores, "La descripcion no debe incluir numeros o caracteres especiales");
        }
        return $errores;
    }
}
