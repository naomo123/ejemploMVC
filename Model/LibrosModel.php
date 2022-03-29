<?php
require_once 'ModelPDO.php';
class LibrosModel extends ModelPDO{
    public function get($id='')
    {
        $query='';
if($id==''){
    //retorna todos los libros
    $query = 'SELECT codigo_libro, nombre_libro, existencias, precio, a.nombre_autor, e.nombre_editorial, g.nombre_genero, l.descripcion
    FROM Libros l
    INNER JOIN Autores a ON a.codigo_autor = l.codigo_autor
    INNER JOIN Generos g ON g.id_genero = l.id_genero
    INNER JOIN Editoriales e ON e.codigo_editorial = l.codigo_editorial';
    return $this->get_query($query);
}
else
{
    //retornar un_libro por sus llaves primarias
    $query="SELECT *
    FROM Libros l
    INNER JOIN Autores a ON a.codigo_autor = l.codigo_autor
    INNER JOIN Generos g ON g.id_genero = l.id_genero
    INNER JOIN Editoriales e ON e.codigo_editorial = l.codigo_editorial WHERE codigo_libro=:codigo_libro";
    return $this->get_query($query, [":codigo_libro"=>$id]);
}



    }
    public function create($libro=array())
    {
      
        $query="INSERT INTO Libros(codigo_libro, codigo_editorial, nombre_libro, existencias, precio, codigo_autor, id_genero, descripcion)
         VALUES (:codigo_libro, :codigo_editorial, :nombre_libro, :existencias, :precio, :codigo_autor, :id_genero, :descripcion)";
        return $this->set_query($query, $libro);
    }
    public function delete($id='')
    {
        $query="DELETE FROM Libros  WHERE codigo_libro=:codigo_libro";
        return $this->set_query($query, [":codigo_libro"=>$id]);
    }
    public function update($libro=array())
    {
      
        $query="UPDATE Libros 
        SET nombre_libro=:nombre_libro,
            existencias=:existencias,
            precio=:precio,
            codigo_editorial=:codigo_editorial,
            codigo_autor=:codigo_autor,
            id_genero=:id_genero,
            descripcion=:descripcion
            
         WHERE codigo_libro=:codigo_libro";
     
        return $this->set_query($query, $libro);
    }
    
}