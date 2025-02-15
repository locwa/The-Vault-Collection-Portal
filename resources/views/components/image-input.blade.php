<label for="imageInput" class="button hover:cursor-pointer inline-flex items-center px-4 py-4 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
    Upload Photos
</label>
<input type="file" id="imageInput" name="imageInput[]" alt="photo upload" accept="image/*" class="mt-2 opacity-0 hover:file:cursor-pointer file:inline-flex file:items-center file:px-4 file:py-2 file:bg-gray-800 dark:file:bg-gray-200 file:border file:border-transparent file:rounded-md file:font-semibold file:text-xs file:text-white dark:file:text-gray-800 file:uppercase file:tracking-widest hover:file:bg-gray-700 dark:hover:file:bg-white focus:file:bg-gray-700 dark:file:focus:bg-white active:file:bg-gray-900 dark:file:active:bg-gray-300 focus:file:outline-none focus:file:ring-2 focus:file:ring-indigo-500 focus:file:ring-offset-2 dark:focus:file:ring-offset-gray-800 file:transition file:ease-in-out file:duration-150" multiple>
<div id="preview" class="py-2 w-full flex flex-wrap justify-center"></div>
<script>
    document.getElementById('imageInput').addEventListener('change', function(event) {
        let files = event.target.files;
        let preview = document.getElementById('preview');

        console.log(files)

        // Clear any existing content
        preview.innerHTML = '';

        // Loop through all selected files
        for (let i = 0; i < files.length; i++) {
            let file = files[i];

            // Only process image files
            if (!file.type.match('image.*')) {
                continue;
            }

            let img = document.createElement('img');
            img.src = URL.createObjectURL(file);
            img.classList.add("h-56", "p-2")

            // Append the container to the preview div
            preview.appendChild(img);
        }
    });
</script>
