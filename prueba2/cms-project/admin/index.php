<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
        <h1 class="text-center">Panel de Administración</h1>
        
        <section class="my-4">
            <h2>Subir Archivos</h2>
            <form action="upload.php" method="post" enctype="multipart/form-data" class="mb-3">
                <div class="mb-3">
                    <input class="form-control" type="file" name="fileToUpload" accept=".jpg, .jpeg, .png, .mp4" required>
                </div>
                <button class="btn btn-danger" type="submit">Subir</button>
            </form>
        </section>

        <section>
            <h2>Archivos Subidos</h2>
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre del Archivo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $files = scandir('../media');
                    foreach ($files as $file) {
                        if ($file !== '.' && $file !== '..') {
                            echo "<tr>
                                    <td>$file</td>
                                    <td><a href='delete.php?file=$file' class='btn btn-danger btn-sm'>Eliminar</a></td>
                                  </tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </div>
    <script src="assets/js/scripts.js"></script>
</body>
</html>