<?php
if (isset($_GET['file'])) {
    $file = basename($_GET['file']);
    $filePath = '../media/' . $file;

    if (file_exists($filePath)) {
        unlink($filePath);
        header("Location: index.php?message=Archivo eliminado con éxito");
        exit;
    } else {
        header("Location: index.php?error=Archivo no encontrado");
        exit;
    }
} else {
    header("Location: index.php?error=No se especificó ningún archivo");
    exit;
}
?>