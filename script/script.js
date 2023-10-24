document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('#upload').addEventListener('change', function () {
        if (this.files && this.files[0]) {
            var img = document.querySelector('#img');
            img.onload = function () {
                URL.revokeObjectURL(img.src);
            };
            img.src = URL.createObjectURL(this.files[0]);
        }
    });
});