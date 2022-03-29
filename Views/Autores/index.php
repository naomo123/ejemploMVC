<!DOCTYPE html>
<html lang="en">
<head>
    <meta  charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Autores</title>
    <?php
        include './Views/cabecera.php';
    ?>
</head>
<body>
<?php
        include './Views/menu.php';
    ?>

<div class="container">
            <div class="row">
                <h3>Lista de autores</h3>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <a type="button" class="btn btn-primary btn-md" href="<?=PATH?>/Autores/create"> Nuevo autor</a>
                <br><br>
                <table class="table table-striped table-bordered table-hover" id="tabla">
                    <thead>
                        <tr>
                            <th>Codigo del autor</th>
                            <th>Nombre del autor</th>
                            <th>Nacionalidad</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($autores as $autor)
                    {

                    
                    ?>
                    <tr>
                    <td><?=$autor['codigo_autor']?></td>
                    <td><?=$autor['nombre_autor']?></td>
                    <td><?=$autor['nacionalidad']?></td>

                    <td>
                    <a type="button"   class="btn btn-danger btn-m"  href="<?=PATH?>/Autores/delete/<?= $autor['codigo_autor']?>" name="Eliminar"> <span class="glyphicon glyphicon-trash"> </span> Eliminar</a>
                     <a  type="button"  class="btn btn-success btn-m " href="<?=PATH?>/Autores/edit/<?= $autor['codigo_autor']?>" name="Editar" > <span class="glyphicon glyphicon-edit"></span> Editar</a>
                    </td>
                
                
                    </tr>
                        
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
                </div> 
            </div>                    
        </div> 
        <script>
            $("#tabla").DataTable(

                {
                    
                }
            );
 
            </script>
                </body>

    </html>