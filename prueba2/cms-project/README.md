# Sistema de Gestión de Contenido

Este proyecto es un sistema de gestión de contenido simple que permite a los usuarios subir archivos de imagen (JPG, JPEG, PNG) y video (MP4) a un servidor. Los archivos se almacenan en una carpeta llamada "media". El sistema incluye un panel de administración donde los usuarios pueden subir nuevos archivos y ver una lista de los archivos existentes, con la opción de eliminarlos.

## Estructura del Proyecto

```
cms-project
├── admin
│   ├── index.php          # Página principal del panel de administración
│   ├── upload.php         # Lógica para subir archivos
│   ├── delete.php         # Lógica para eliminar archivos
│   └── assets
│       ├── css
│       │   └── styles.css # Estilos CSS para el panel de administración
│       └── js
│           └── scripts.js  # Código JavaScript para interacciones
├── media                  # Carpeta donde se almacenan los archivos subidos
├── index.php              # Página de inicio del sistema
└── README.md              # Documentación del proyecto
```

## Requisitos

- PHP 7.0 o superior
- Un servidor web (como Apache o Nginx)
- Permisos de escritura en la carpeta "media"

## Instalación

1. Clona este repositorio en tu servidor local.
2. Asegúrate de que la carpeta `media` tenga permisos de escritura.
3. Accede a `index.php` en tu navegador para ver la página de inicio.
4. Dirígete a `admin/index.php` para acceder al panel de administración.

## Uso

- En el panel de administración, puedes subir archivos seleccionando el archivo y haciendo clic en "Subir".
- Los archivos subidos se mostrarán en una tabla donde podrás eliminarlos si lo deseas.

## Contribuciones

Las contribuciones son bienvenidas. Si deseas mejorar este proyecto, por favor abre un issue o envía un pull request.