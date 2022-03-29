<?php
require_once 'ModelPDO.php';
class GenerosModel extends ModelPDO{
    public function get($id='')
    {
        $query='';
        if ($id  == '') {
            $query = 'SELECT * FROM generos';
            $result = $this->get_query($query);
        } else {
            $query = "SELECT * FROM generos WHERE id_genero = :id_genero";
            $result = $this->get_query($query, [":id_genero" => $id]);
        }
        return $result;



    }
    public function create($generos=array())
    {
        extract($generos);
        $query = "INSERT INTO autores(codigo_autor, nombre_autor, nacionalidad)
            VALUES(?,?,?)";
        return $this->set_query($query, 'sss', array($codigo_autor, $nombre_autor, $nacionalidad));
    }
    public function delete($id='')
    {
        $query="DELETE FROM Generos  WHERE codigo_Genero=:codigo_Genero";
        return $this->set_query($query, [":codigo_Genero"=>$id]);
    }
    public function update($Genero=array())
    {
      
        $query="UPDATE Generos SET nombre_Genero-:nombre_Genero,existencias=:existencias, precio=:precio,codigo_autor=:codigo_autor,codio_editorial=:codigo_editorial, id_genero=:id_genero, descripcion=:descripcion
          WHERE codigo_Genero=:codigo_Genero";
     
        return $this->set_query($query, $Genero);
    }
    
}