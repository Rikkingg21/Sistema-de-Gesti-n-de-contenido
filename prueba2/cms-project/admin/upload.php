<?php
$targetDir = "../media/";
$allowedTypes = array('jpg', 'jpeg', 'png', 'mp4');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fileName = basename($_FILES["fileToUpload"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if (in_array(strtolower($fileType), $allowedTypes)) {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFilePath)) {
            echo "El archivo " . htmlspecialchars($fileName) . " ha sido subido exitosamente.";
        } else {
            echo "Lo siento, hubo un error al subir su archivo.";
        }
    } else {
        echo "Lo siento, solo se permiten archivos JPG, JPEG, PNG y MP4.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Subir Archivos</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Subir Archivos</h1>
        <form action="" method="post" enctype="multipart/form-data" class="mb-3">
            <div class="mb-3">
                <input class="form-control" type="file" name="fileToUpload" accept=".jpg, .jpeg, .png, .mp4" required>
            </div>
            <button class="btn btn-danger" type="submit">Subir Archivo</button>
        </form>
        <a href="index.php" class="btn btn-secondary">Volver al Panel de Administración</a>
    </div>
</body>
</html>