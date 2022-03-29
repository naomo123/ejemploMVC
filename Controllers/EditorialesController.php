<?php
include_once 'Model/EditorialesModel.php';
include_once 'Controller.php';
require_once 'core/validaciones.php';
class EditorialesController extends Controller
{

    private  $model;
    function __construct()
    {
        $this->model = new EditorialesModel();
    }

    public function index()
    {
        $viewBag = array();
        $viewBag['editoriales'] = $this->model->get();
        // var_dump($this->model->get());
        $this->render('index.php', $viewBag);
    }

    public function details($id)
    {
        var_dump($this->model->get($id));
    }

    public function create()
    {
        $this->render('new.php');
    }

    public function add()
    {
        $errores = array();
        if (isset($_POST["Guardar"])) {

            extract($_POST);


            if (!isset($codigo_editorial) || estaVacio($codigo_editorial)) {
                array_push($errores, "Debes ingresar eel codigo de editorial");
            } else if (!esCodigoEditorial($codigo_editorial)) {
                array_push($errores, "El codigo editorial no cumple con el formato EDI000");
            }

            if (!isset($nombre_editorial) || estaVacio($nombre_editorial)) {
                array_push($errores, "Debes ingresar el nombre del editorial");
            }


            if (!isset($contacto) || estaVacio($contacto)) {
                array_push($errores, "Debes ingresar el contacto");
            } else if (!esText($contacto)) {
                array_push($errores, "El contacto no debe incluir numeros o caracteres especiales");
            }
            if (!isset($telefono) || estaVacio($telefono)) {
                array_push($errores, "Debes ingresar el telefono");
            } else if (!esTel($telefono)) {
                array_push($errores, "Telefono no valido");
            }

            $editorial['nombre_editorial'] = $nombre_editorial;
            $editorial['codigo_editorial'] = $codigo_editorial;
            $editorial['contacto'] = $contacto;
            $editorial['telefono'] = $telefono;
            if (count($errores) > 0) {
                $viewBag = array();
                $viewBag['errores'] = $errores;
                $viewBag['editorial'] = $editorial;
                $viewBag['data_temp'] = $editorial;
                $this->render("new.php", $viewBag);
            } else {
                if ($this->model->create(($editorial)) > 0) {
                    header('location:' . PATH . '/Editoriales/index');
                } else {
                    array_push($errores, "Ya existe un editorial con este codigo");
                    $viewBag['errores'] = $errores;
                    $viewBag['editorial'] = $editorial;
                    $viewBag['data_temp'] = $editorial;
                    $this->render("new.php", $viewBag);
                }
            }
        }
    }
    public function delete($codigo_editorial)
    {




        $this->model->delete($codigo_editorial);

        header('location:' . PATH . '/Editoriales/index');
    }
    public function edit($codigo_editorial)
    {
        if (isset($_POST["Guardar"])) {

            extract($_POST);
            $errores = array();

            if (!isset($codigo_editorial) || estaVacio($codigo_editorial)) {
                array_push($errores, "Debes ingresar el codigo de editorial");
            } else if (!esCodigoeditorial($codigo_editorial)) {
                array_push($errores, "El codigo editorial no cumple con el formato AUT000");
            }

            if (!isset($nombre_editorial) || estaVacio($nombre_editorial)) {
                array_push($errores, "Debes ingresar el nombre del editorial");
            } else if (!esText($nombre_editorial)) {
                array_push($errores, "El nombre del editorial no debe incluir numeros o caracteres especiales");
            }
            if (!isset($contacto) || estaVacio($contacto)) {
                array_push($errores, "Debes ingresar el contacto");
            } else if (!esText($contacto)) {
                array_push($errores, "El contacto no debe incluir numeros o caracteres especiales");
            }
            if (!isset($telefono) || estaVacio($telefono)) {
                array_push($errores, "Debes ingresar el telefono");
            } else if (!esTel($telefono)) {
                array_push($errores, "Telefono no valido");
            }

            $editorial['nombre_editorial'] = $nombre_editorial;
            $editorial['codigo_editorial'] = $codigo_editorial;
            $editorial['contacto'] = $contacto;
            $editorial['telefono'] = $telefono;

            if (count($errores) > 0) {

                $viewBag = array();
                $viewBag['errores'] = $errores;
                $viewBag['editorial'] = $editorial;
                $viewBag["data_temp"] = $editorial;
                $this->render("Edit.php", $viewBag);
            } else {
                if ($this->model->update(($editorial)) > 0) {
                    header('location:' . PATH . '/Editoriales/index');
                }
            }
        } else {
            $editorial = $this->model->get($codigo_editorial)[0];
            $viewBag["data_temp"] = $editorial;
            $this->render('Edit.php', $viewBag);
        }
    }
}
