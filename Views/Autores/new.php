<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo autor</title>
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
                <h3>Nuevo autor</h3>
            </div>
            <div class="row">
                <div class=" col-md-7">
                    <?php
                    
                    if(isset($errores)){
                        if(count($errores)>0)
                        {
                            echo "<div class='alert alert-danger'><ul>";
                            foreach($errores as $error)
                            {
                                echo "<li>$error</li>";
                            }
                                echo "</ul></div>";
                        }
                    }
                    ?>
                   
                    <form role="form" action="<?=PATH?>/Autores/add"   method="POST">
                        <input type="hidden" name="op" value="insertar"/>
                        <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Campos requeridos</strong></div>
                        <div class="form-group">
                            <label for="codigo">Codigo del autor:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="codigo_autor" id="codigo_autor" value="<?=isset($autor)?$autor['codigo_autor']:''?>" placeholder="Ingresa el codigo del autor" >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre del autor:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="nombre_autor" id="nombre_autor" value="<?=isset($autor)?$autor['nombre_autor']:''?>" placeholder="Ingresa el nombre del autor" >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nacionalidad">Nacionalidad:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" value="<?=isset($autor)?$autor['nacionalidad']:''?>"  placeholder="Ingresa la nacionalidad">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                       
                        <input type="submit" class="btn btn-info" value="Guardar" name="Guardar">
                        <a class="btn btn-danger" href="<?=PATH?>/Autores/Index">Cancelar</a>
                    </form>
                </div>
            </div>  
        </div>

</body>
</html>
        