<?php
abstract class Model{
private $db_host="localhost";
private $db_user="root";
private $db_pass="";
private $db_name="inventario_libros";
protected $conn;
 function __construct()
 {
     
 }
protected function db_open(){
    $this->conn=new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);

 }
 protected function db_close(){
      $this->conn->close();
}
//metodo para ejecutar consultas de actualizacion
protected function set_query($query)
{
    try{
$this->db_open();
$this->conn->query($query);
$rowsAffect=$this->conn->affected_rows; //agregamos
$this->db_close();
return $rowsAffect;
}
catch(exception $e){
    return 0;
}

}
//metodo para ejecutar consultas de seleccion
protected function get_query($query)
{
    $rows=[];
$this->db_open();
$result= $this->conn->query($query);
while($rows[]=$result->fetch_assoc());
$result->close();
$this->db_close();
array_pop($rows);//agregamos para quitar el null
return $rows;
}

 abstract function get();
 abstract function create();
 abstract function delete();
 abstract function update();


}