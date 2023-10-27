
$(document).ready(function () {
    $('input[name=logo]').on('change', function () {
        let selectedFile = this.files[0];
        const reader = new FileReader();

        reader.onload = function (event) {
            const img = new Image();
            img.onload = function () {
                const width = this.width;
                const height = this.height;
                const minWidth = 520;
                const minHeight = 400;

                if (width < minWidth || height < minHeight) {
                    $("input[name='logo']").val('');
                    alert('The Logo Image Must Be Greater Than 520x400.');
                    $('.image-preview__text-default').css({ 'display': 'block', });
                    $('.image-preview__image').css({ 'display': 'none', });
                } else {
                    $('.image-preview__text-default').css({ 'display': 'none', });
                    $('.image-preview__image').css({ 'display': 'block', });
                    $('.image-preview__image').attr('src', reader.result);
                }

            };

            img.src = event.target.result;
        };
        reader.readAsDataURL(selectedFile);
    });



    $('input[name=masterplan]').on('change', function () {

        const selectedFile = this.files[0];
        const reader = new FileReader();

        reader.onload = function (event) {
            const img = new Image();

            img.onload = function () {
                const width = this.width;
                const height = this.height;
                const minWidth = 1000;
                const minHeight = 750;

                if (width < minWidth || height < minHeight) {
                    alert('The Master plan Image Must Be Greater Than 1000x750.');
                    $("input[name='masterplan']").val('');
                    $('.masterplan-preview__text-default').css({ 'display': 'block', });
                    $('.masterplan-preview__masterplan').css({ 'display': 'none', });
                } else {
                    $('.masterplan-preview__text-default').css({ 'display': 'none', });
                    $('.masterplan-preview__masterplan').css({ 'display': 'block', });
                    $('.masterplan-preview__masterplan').attr('src', reader.result);
                }
            };

            img.src = event.target.result;
        };

        reader.readAsDataURL(selectedFile);
    });


    $('input[name=layouts]').on('change', function () {
        const selectedFile = this.files[0];
        const reader = new FileReader();

        reader.onload = function (event) {
            const img = new Image();

            img.onload = function () {
                const width = this.width;
                const height = this.height;
                const minWidth = 1000;
                const minHeight = 750;

                if (width < minWidth || height < minHeight) {
                    $("input[name='layouts']").val('');
                    alert('The Layout Image Must Be Greater Than 1000x750.');
                    $('.photo-preview__text-default').css({ 'display': 'block', });
                    $('.photo-preview__photo').css({ 'display': 'none', });
                } else {
                    $('.photo-preview__text-default').css({ 'display': 'none', });
                    $('.photo-preview__photo').css({ 'display': 'block', });
                    $('.photo-preview__photo').attr('src', reader.result);
                }
            };

            img.src = event.target.result;
        };

        reader.readAsDataURL(selectedFile);
    });

});






$("input[name='gallary[]']").on('change', function () {

    const selectedFiles = this.files;
    const validFiles = [];
    const allowedTypes = ['image/jpeg', 'image/gif', 'image/png', 'image/webp', 'image/jpg'];
    $('.Gallary-preview__colom').remove();
    let countselectedFiles = selectedFiles.length;

    new Promise((resolve, reject) => {
        for (let i = 0; i < selectedFiles.length; i++) {
            const selectedFile = selectedFiles[i];
            const reader = new FileReader();

            reader.onload = function (event) {
                const img = new Image();

                img.onload = function () {
                    const width = this.width;
                    const height = this.height;
                    const minWidth = 1000;
                    const minHeight = 750;

                    if (width < minWidth || height < minHeight || !allowedTypes.includes(selectedFile.type)) {
                        alert('The Galleries Images Must Be Greater Than 1000x750.and Only JPEG, GIF, PNG,JPG and WebP files are allowed.');
                        removefromfilelistgallary(selectedFile)
                        countselectedFiles = countselectedFiles - 1
                        // reject('Invalid files found');
                    } else {
                        validFiles.push(selectedFile); // add file to validFiles
                    }
                };

                img.src = event.target.result;
            };

            reader.readAsDataURL(selectedFile);
        }
        resolve(validFiles);
    }).then((validFiles) => {
        setTimeout(() => {
            console.log("Number of valid images: " + validFiles.length);
            $('.Gallary-preview__text-default').css({ 'display': 'none', });
            for (let j = 0; j < validFiles.length; j++) {
                const img = $('<div class="Gallary-preview__colom"> </div>')
                    .append($('<img class="Gallary-preview__Gallary" alt="Gallary-preview">').attr('src', URL.createObjectURL(validFiles[j])))
                    .append($('<span class="xdelete">x</span>').on('click', function () {
                        removefromfilelistgallary(validFiles[j]);
                        $(this).parent().remove();
                    }));
                // img.draggable();
                $('.Gallary-preview').append(img)
                // update input files with validFiles
                        const dt = new DataTransfer();
                        for (let j = 0; j < validFiles.length; j++) {
                            dt.items.add(validFiles[j]);
                        }
                        const input = document.getElementById('file-gallary__roi')
                        input.files = dt.files;
               
            }
        }, 1000
        );
    });

});



function removefromfilelistgallary(x) {
    const dt = new DataTransfer();
    const input = document.getElementById('file-gallary__roi')
    const { files } = input;
    if (files.length > 0) {
        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            if (file !== x) {
                dt.items.add(file);
            }
        }
        input.files = dt.files;
    }
}


