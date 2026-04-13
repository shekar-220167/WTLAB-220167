document.addEventListener("DOMContentLoaded", () => {
    // File upload preview logic
    const fileInput = document.querySelector('.file-upload-wrapper input[type="file"]');
    const fileNamePreview = document.querySelector('.file-name-preview');
    const uploadWrapper = document.querySelector('.file-upload-wrapper');

    if (fileInput && fileNamePreview && uploadWrapper) {
        // Drag and drop styles
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            uploadWrapper.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            uploadWrapper.addEventListener(eventName, () => {
                uploadWrapper.classList.add('dragover');
            }, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            uploadWrapper.addEventListener(eventName, () => {
                uploadWrapper.classList.remove('dragover');
            }, false);
        });

        // Handle dropped files
        uploadWrapper.addEventListener('drop', (e) => {
            let dt = e.dataTransfer;
            let files = dt.files;
            if(files.length > 0) {
                fileInput.files = files;
                updateFileName(files[0].name);
            }
        }, false);

        // Handle file browse
        fileInput.addEventListener('change', function(e) {
            if (this.files && this.files.length > 0) {
                updateFileName(this.files[0].name);
            }
        });

        function updateFileName(name) {
            fileNamePreview.textContent = "Selected: " + name;
        }
    }

    // Auto slideshow logic (simple smooth scrolling)
    const slideshow = document.querySelector('.slideshow');
    if (slideshow) {
        let maxScroll = slideshow.scrollWidth - slideshow.clientWidth;
        let direction = 1;

        // Auto-scroll the slider every 3 seconds
        setInterval(() => {
            if (!maxScroll) {
                maxScroll = slideshow.scrollWidth - slideshow.clientWidth;
                if(!maxScroll) return;
            }
            let currentScroll = slideshow.scrollLeft;
            
            if (currentScroll >= maxScroll - 5 && direction === 1) {
                direction = -1;
            } else if (currentScroll <= 5 && direction === -1) {
                direction = 1;
            }

            slideshow.scrollBy({
                left: slideshow.clientWidth * direction,
                behavior: 'smooth'
            });
        }, 3500);
    }
});
