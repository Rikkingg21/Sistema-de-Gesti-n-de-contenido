<?php
// Obtiene la lista de archivos de la carpeta "media"
$media_files = glob('../media/*.{jpg,jpeg,png,mp4}', GLOB_BRACE); // Admite imágenes y videos
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slider Automático</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            overflow: hidden;
            background-color: #000;
        }
        .media-container {
            height: 100vh; /* Altura máxima del dispositivo */
            display: flex;
            align-items: center;
            justify-content: center;
        }
        img, video {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain;
        }
        .audio-btn {
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 1000;
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="media-container">
        <!-- Contenedor donde se mostrará el contenido multimedia -->
        <div id="media"></div>
    </div>

    <!-- Botón para habilitar audio manualmente si está bloqueado -->
    <button class="audio-btn" id="unmuteButton" style="display: none;">Activar Audio</button>

    <script>
        // Lista de archivos obtenidos de PHP
        const mediaFiles = <?= json_encode($media_files); ?>;
        let currentIndex = 0;

        // Función para cargar y mostrar un archivo
        function loadMedia() {
            const mediaContainer = document.getElementById('media');
            mediaContainer.innerHTML = ''; // Limpia el contenedor

            if (currentIndex >= mediaFiles.length) {
                // Refresca la página al terminar la lista
                location.reload();
                return;
            }

            const file = mediaFiles[currentIndex];
            const fileType = file.split('.').pop().toLowerCase();

            if (['jpg', 'jpeg', 'png'].includes(fileType)) {
                // Muestra una imagen por 3 segundos
                const img = document.createElement('img');
                img.src = file;
                mediaContainer.appendChild(img);
                setTimeout(() => {
                    currentIndex++;
                    loadMedia();
                }, 3000);
            } else if (fileType === 'mp4') {
                // Reproduce un video con audio
                const video = document.createElement('video');
                video.src = file;
                video.autoplay = true;
                video.muted = false; // Intenta reproducir con audio
                video.controls = false; // Oculta controles
                video.loop = false; // No se repite
                video.onended = () => {
                    currentIndex++;
                    loadMedia();
                };
                mediaContainer.appendChild(video);

                // Si ocurre un error al reproducir el video, muestra el botón para activar el audio
                video.play().catch(error => {
                    console.warn('Reproducción automática bloqueada. Mostrando botón para activar audio.');
                    document.getElementById('unmuteButton').style.display = 'block';
                });
            }
        }

        // Evento para habilitar el audio manualmente
        document.getElementById('unmuteButton').addEventListener('click', () => {
            const videos = document.querySelectorAll('video');
            videos.forEach(video => video.muted = false);
            document.getElementById('unmuteButton').style.display = 'none'; // Oculta el botón
        });

        // Inicia el ciclo
        loadMedia();
    </script>
</body>
</html>
