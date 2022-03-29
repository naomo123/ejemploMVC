<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Editorial</title>
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
            <h3>Editar Editorial</h3>
        </div>
        <div class="row">
            <div class=" col-md-7">
                <?php

                if (isset($errores)) {
                    if (count($errores) > 0) {
                        echo "<div class='alert alert-danger'><ul>";
                        foreach ($errores as $error) {
                            echo "<li>$error</li>";
                        }
                        echo "</ul></div>";
                    }
                }
                ?>

                <form role="form" action="<?= PATH ?>/Editoriales/edit" method="POST">
                    <input type="hidden" name="op" value="insertar" />
                    <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Campos requeridos</strong></div>
                    <div class="form-group">
                        <label for="codigo">Codigo del Editorial:</label>
                        <div class="input-group">
                            <input type="text" value="<?= isset($data_temp['codigo_editorial']) ? $data_temp['codigo_editorial'] : '' ?>" class="form-control" name="codigo_editorial" id="codigo" placeholder="Ingresa el codigo del Editorial" readonly>
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre del Editorial:</label>
                        <div class="input-group">
                            <input type="text" value="<?= isset($data_temp['nombre_editorial']) ? $data_temp['nombre_editorial'] : '' ?>" class="form-control" name="nombre_editorial" id="nombre" placeholder="Ingresa el nombre del Editorial">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="contacto">Contacto:</label>
                        <div class="input-group">
                            <input type="text" value="<?= isset($data_temp['contacto']) ? $data_temp['contacto'] : '' ?>" class="form-control" id="Contacto" name="contacto" placeholder="Ingresa la Contacto">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono:</label>
                        <div class="input-group">
                            <input type="text" value="<?= isset($data_temp['telefono']) ? $data_temp['telefono'] : '' ?>" class="form-control" id="telefono" name="telefono" placeholder="Ingresa la Contacto">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>

                    </div>
                    <input type="submit" class="btn btn-info" value="Guardar" name="Guardar">
                    <a class="btn btn-danger" href="<?= PATH ?>/Editoriales/index">Cancelar</a>
                </form>
            </div>
        </div>
    </div>

</body>

</html>