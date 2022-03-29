<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de editoriales</title>
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
            <h3>Lista de editoriales</h3>
        </div>
        <div class="row">
            <div class="col-md-10">
                <a type="button" class="btn btn-primary btn-md" href="<?= PATH ?>/Editoriales/create"> Nuevo editorial</a>
                <br><br>
                <table class="table table-striped table-bordered table-hover" id="tabla">
                    <thead>
                        <tr>
                            <th>Codigo del editorial</th>
                            <th>Nombre del editorial</th>
                            <th>Contacto</th>
                            <th>Telefono</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($editoriales as $editorial) {


                        ?>
                            <tr>
                                <td><?= $editorial['codigo_editorial'] ?></td>
                                <td><?= $editorial['nombre_editorial'] ?></td>
                                <td><?= $editorial['contacto'] ?></td>
                                <td><?= $editorial['telefono'] ?></td>
                                <td>
                                    <a type="button" class="btn btn-danger btn-m" href="<?= PATH ?>/Editoriales/delete/<?= $editorial['codigo_editorial'] ?>" name="Eliminar"> <span class="glyphicon glyphicon-trash"> </span> Eliminar</a>
                                    <a type="button" class="btn btn-success btn-m " href="<?= PATH ?>/Editoriales/edit/<?= $editorial['codigo_editorial'] ?>" name="Editar"> <span class="glyphicon glyphicon-edit"></span> Editar</a>
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
        $("#tabla").DataTable();
    </script>
</body>

</html>