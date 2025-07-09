// resources/js/SubirPelicula.js
document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('imagen');
    const imageLabel = document.querySelector('label[for="imagen"]');
    const removeImageBtn = document.getElementById('remove-image'); // Botón "Eliminar Imagen"
    
    console.log('Botón eliminar encontrado:', removeImageBtn); // Debug
    const videoInput = document.getElementById('pelicula');
    const videoLabel = document.querySelector('label[for="pelicula"]');
    
    let selectedImageFile = null;
    let selectedVideoFile = null;

    // Funcionalidad para la vista previa de imagen
    imageInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        
        if (file) {
            // Validar que sea una imagen
            if (!file.type.startsWith('image/')) {
                alert('Por favor, selecciona un archivo de imagen válido.');
                imageInput.value = '';
                return;
            }
            
            selectedImageFile = file;
            
            // Crear URL para la vista previa
            const reader = new FileReader();
            reader.onload = function(e) {
                // Cambiar el contenido del label para mostrar la vista previa
                imageLabel.innerHTML = `
                    <img src="${e.target.result}" alt="Vista previa" class="w-24 h-24 object-cover rounded-lg">
                `;
                imageLabel.classList.remove('bg-black');
                imageLabel.classList.add('bg-transparent');
            };
            reader.readAsDataURL(file);
        } else {
            resetImagePreview();
        }
    });

    // Funcionalidad para eliminar imagen
    if (removeImageBtn) {
        removeImageBtn.addEventListener('click', function(e) {
            e.preventDefault(); // Prevenir cualquier comportamiento por defecto
            console.log('Botón eliminar clickeado'); // Debug
            imageInput.value = '';
            selectedImageFile = null;
            resetImagePreview();
        });
    } else {
        console.error('No se encontró el botón eliminar imagen');
    }

    // Función para resetear la vista previa
    function resetImagePreview() {
        imageLabel.innerHTML = `
            <div class="text-center text-white">
                <svg class="w-8 h-8 mx-auto" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                </svg>
            </div>
        `;
        imageLabel.classList.add('bg-black');
        imageLabel.classList.remove('bg-transparent');
    }

    // Mostrar nombre del archivo de video seleccionado
    videoInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            selectedVideoFile = file;
            
            // Crear o actualizar el elemento que muestra el archivo seleccionado
            let fileInfo = document.getElementById('selected-file');
            if (!fileInfo) {
                fileInfo = document.createElement('p');
                fileInfo.id = 'selected-file';
                fileInfo.className = 'text-xs text-gray-600 mt-2';
                videoLabel.parentNode.appendChild(fileInfo);
            }
            
            fileInfo.textContent = `Archivo seleccionado: ${file.name}`;
            fileInfo.classList.remove('hidden');
        } else {
            selectedVideoFile = null;
            const fileInfo = document.getElementById('selected-file');
            if (fileInfo) {
                fileInfo.classList.add('hidden');
            }
        }
    });

    // Validaciones adicionales en el envío del formulario
    document.querySelector('form').addEventListener('submit', function(e) {
        const imageFile = imageInput.files[0];
        const videoFile = videoInput.files[0];

        // Validar tamaño de imagen (máximo 5MB)
        if (imageFile && imageFile.size > 5 * 1024 * 1024) {
            e.preventDefault();
            alert('La imagen no puede ser mayor a 5MB');
            return;
        }

        // Validar tamaño de video (máximo 100MB)
        if (videoFile && videoFile.size > 100 * 1024 * 1024) {
            e.preventDefault();
            alert('El video no puede ser mayor a 100MB');
            return;
        }

        // Validar que se haya seleccionado una imagen
        if (!imageFile) {
            e.preventDefault();
            alert('Por favor, selecciona una imagen para la película');
            return;
        }

        // Validar que se haya seleccionado un video
        if (!videoFile) {
            e.preventDefault();
            alert('Por favor, selecciona un archivo de video');
            return;
        }
    });
});