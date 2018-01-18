<?php if ($_POST) {
    $ds          = DIRECTORY_SEPARATOR;
    $result = false;
    $storeFolder = $_POST['ruta'];

    // Verificar si carpeta existe, si no, crearlo
    // if (!file_exists($storeFolder . $ds)) {
    //     mkdir($storeFolder . $ds, 0777, true);
    // }

    if (!empty($_FILES)) {

        $tempFile = $_FILES['file']['tmp_name'];

        $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;

        $targetFile =  $targetPath. $_FILES['file']['name'];

        $result = move_uploaded_file($tempFile,$targetFile);

    }
} ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.css">
<style media="screen">
    .espacio {
        position: absolute;
        width: 100%;
        top: 200px;
        padding: 0 15px;
        margin-left: -34px;
    }
    h1 {
        margin-top: 30px;
    }
    .col-sm-8 {
        margin: 20px auto;
    }
</style>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.2.0/min/dropzone.min.js"></script>

<h1 class="text-center">Subir archivos</h1>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <form action="cuploader.php" method="POST" class="dropzone" enctype="multipart/form-data">
            <div class="espacio">
                <div class="form-group">
                    <input type="text" class="form-control" name="ruta" placeholder='Ingresa la ruta a subir. No escribir "/" al final.' <?php if($POST && $_POST['ruta']) echo 'value="'.$_POST['ruta'].'"' ?>>
                </div>
                <input type="submit" class="btn btn-primary btn-block" value="Subir archivos">
            </div>
        </form>
    </div>
</div>
