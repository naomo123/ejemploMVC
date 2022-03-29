<?php
require_once 'Model/EditorialesModel.php';
$model=new EditorialesModel();
$editorial=[
    'codigo_editorial' =>  'EDI659',
      'nombre_editorial' => 'pruebaphp modificad',
      'contacto' => 'Francisco Merin',
      'telefono' => '2333-3333'
];

echo "MODIFICADO ". $model->update($editorial);
echo "eliminado ". $model->delete('EDI722');
var_dump($model->get());