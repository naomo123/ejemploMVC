<?php
require_once 'Model.php';
class AutoresModel extends Model{
    public function get($id='')
    {
        $query='';
if($id==''){
    //retorna todos los Autores
    $query="SELECT * FROM Autores";

}
else
{
    //retornar un autor por sus llaves primarias
    $query="SELECT * FROM Autores WHERE codigo_autor=?";
}
$rows=[];
$this->db_open();
$stmt=$this->conn->prepare($query);

if($id!='')
{
    $stmt->bind_param("s",$id);
}
$stmt->execute();
$result= $stmt->get_result();
while($rows[]=$result->fetch_assoc());
$result->close();
$stmt->close();
$this->db_close();
array_pop($rows);//agregamos para quitar el null
return $rows;


    }
    public function create($autor=array())
    {
        extract($autor);
        $query="INSERT INTO Autores(codigo_autor,nombre_autor,nacionalidad) VALUES (?, ?, ?)";
        try{
            $this->db_open();
            $stmt=$this->conn->prepare($query);
            $this->conn->query($query);
            $stmt->bind_param("sss",$codigo_autor,$nombre_autor,$nacionalidad);
            $stmt->execute();
            $rowsAffect=$stmt->affected_rows; //agregamos
            $stmt->close();
            $this->db_close();  
            return $rowsAffect;
            }
            catch(exception $e){
                return 0;
            }
        
    }
    public function delete($id = '')
    {
        

        $query = "DELETE FROM Autores WHERE codigo_autor=?";
        try{
            $this->db_open();
            $stmt=$this->conn->prepare($query);
            $this->conn->query($query);
            $stmt->bind_param("s",$id);
            $stmt->execute();
            $rowsAffect=$stmt->affected_rows; //agregamos
            $stmt->close();
            $this->db_close();  
            return $rowsAffect;
            }
            catch(exception $e){
                return 0;
            }

    }
    public function update($autor=array())
    {
        extract($autor);

        $query = "UPDATE Autores SET nombre_autor=?, nacionalidad=? WHERE codigo_autor=?";
        try{
            $this->db_open();
            $stmt=$this->conn->prepare($query);
            $this->conn->query($query);
            $stmt->bind_param("sss", $nombre_autor, $nacionalidad, $codigo_autor);
            $stmt->execute();
            $rowsAffect=$stmt->affected_rows; //agregamos
            $stmt->close();
            $this->db_close();  
            return $rowsAffect;
            }
            catch(exception $e){
                return 0;
            }
    }
    
}