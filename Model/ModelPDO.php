<?php
abstract class ModelPDO{
private $db_host="localhost";
private $db_user="root";
private $db_pass="";
private $db_name="inventario_libros";
protected $conn;
 function __construct()
 {
     
 }
protected function db_open(){
    try{
    $this->conn=new PDO("mysql:host=$this->db_host; dbname=$this->db_name; charset=utf8", $this->db_user,$this->db_pass);
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
 }
 protected function db_close(){
      $this->conn=null;
}
//metodo para ejecutar consultas de actualizacion
protected function set_query($query,$params=array())
{
    try{
$this->db_open();
$stmt=$this->conn->prepare($query);
$stmt->execute($params);
$rowsAffected=$stmt->rowCount();
$this->db_close();
return $rowsAffected;
}
catch(exception $e){
    return 0;
}

}
//metodo para ejecutar consultas de seleccion
protected function get_query($query, $params=array())
{
   
$this->db_open();
$stmt= $this->conn->prepare($query);
$stmt->execute($params);
while($rows[] = $stmt->fetch(PDO::FETCH_ASSOC));
$this->db_close();
array_pop($rows);//agregamos para quitar el null
return $rows;
}

 abstract function get();
 abstract function create();
 abstract function delete();
 abstract function update();


}