<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar libro</title>
    <?php
    include_once './Views/cabecera.php';
    ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</head>

<body>
    <?php
    include_once './Views/menu.php';
    ?>
    <div class="container">
        <div class="row">
            <h3>Editar libro</h3>
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
                <form role="form" action="<?= PATH ?>/libros/edit" method="POST">
                    <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Campos requeridos</strong></div>
                    <div class="form-group col-md-6">
                        <label for="codigo">Codigo del libro:</label>
                        <div class="input-group">
                            <input value="<?= isset($data_temp['codigo_libro']) ? $data_temp['codigo_libro'] : '' ?>"  type="text" class="form-control" name="codigo_libro" id="codigo_libro" placeholder="Ingresa el codigo del libro" readonly>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                     
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nombre">Nombre del libro:</label>
                        <div class="input-group">
                            <input value="<?= isset($data_temp['nombre_libro']) ? $data_temp['nombre_libro'] : '' ?>" type="text" class="form-control" name="nombre_libro" id="nombre_libro" placeholder="Ingresa el nombre del libro">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                       
                    </div>
                    <div class="form-group col-md-6">
                        <label for="existencias">Existencias:</label>
                        <div class="input-group">
                            <input value="<?= isset($data_temp['existencias']) ? $data_temp['existencias'] : '' ?>" type="number" class="form-control" id="existencias" name="existencias" placeholder="Ingresa las existencias del libro">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                     
                    </div>
                    <div class="form-group col-md-6">
                        <label for="precio">Precio:</label>
                        <div class="input-group">
                            <input value="<?= isset($data_temp['precio']) ? $data_temp['precio'] : '' ?>" type="number" step="0.01" class="form-control" id="precio" name="precio" placeholder="Ingresa el precio del libro">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span>
                        </div>
                       
                    </div>
                    <div class="form-group col-md-6">
                        <label for="autor">Autor:</label>
                        <div class="input-group">
                            <select id="autor" name="codigo_autor" class="form-control">
                                <option value="">Seleccione...</option>
                                <?php
                                foreach ($autores as $autor) {
                                ?>
                                    <option value="<?= $autor['codigo_autor'] ?>"><?= $autor['nombre_autor'] ?></option>
                                <?php } ?>
                            </select>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                        
                    </div>
                    <div class="form-group col-md-6">
                        <label for="editorial">Editorial:</label>
                        <div class="input-group">
                            <select id="editorial" name="codigo_editorial" class="form-control">
                                <option value="">Seleccione...</option>
                                <?php
                                foreach ($editoriales as $editorial) {
                                ?>
                                    <option value="<?= $editorial['codigo_editorial'] ?>"><?= $editorial['nombre_editorial'] ?></option>
                                <?php } ?>
                            </select>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    
                        
                    </div>
                    <div class="form-group col-md-6">
                        <label for="genero">Genero:</label>
                        <div class="input-group">
                            <select id="genero" name="id_genero" class="form-control">
                                <option value="">Seleccione...</option>
                                <?php
                                foreach ($generos as $genero) {
                                ?>
                                    <option value="<?= $genero['id_genero'] ?>"><?= $genero['nombre_genero'] ?></option>
                                <?php } ?>
                            </select>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                     
                    </div>
                    <div class="form-group col-md-6">
                        <label for="descripcion">Descripcion:</label>
                        <div class="input-group col-md-12">
                            <textarea class="form-control" name="descripcion"><?= isset($data_temp['descripcion']) ? $data_temp['descripcion'] : '' ?></textarea>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-info" value="Guardar" name="Guardar">
                    <a class="btn btn-danger" href="<?= PATH ?>/libros/index">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
    <script>
        $('#autor').select2();
        $('#editorial').select2();
        $('#genero').select2();
    </script>
    <?php
    if (isset($data_temp['codigo_autor'])) {
    ?>
        <script>
            $('#autor').val('<?= $data_temp['codigo_autor'] ?>').trigger('change');
        </script>
    <?php
    }
    if (isset($data_temp['codigo_editorial'])) {
        ?>
            <script>
                $('#editorial').val('<?= $data_temp['codigo_editorial'] ?>').trigger('change');
            </script>
        <?php
    }
    if (isset($data_temp['id_genero'])) {
        ?>
            <script>
                $('#genero').val('<?= $data_temp['id_genero'] ?>').trigger('change');
            </script>
        <?php
    }
    ?>
</body>

</html>