document.addEventListener('DOMContentLoaded', function() {
    const deleteButtons = document.querySelectorAll('.delete-button');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            const fileName = this.getAttribute('data-filename');
            const confirmDelete = confirm(`¿Estás seguro de que deseas eliminar el archivo ${fileName}?`);

            if (confirmDelete) {
                window.location.href = `delete.php?file=${fileName}`;
            }
        });
    });
});