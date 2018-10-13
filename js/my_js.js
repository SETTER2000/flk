// var fileInput = document.querySelector('input[type="file"]');
//
// function read(callback) {
//     var file = fileInput.files.item(0);
//     var reader = new FileReader();
//
//     reader.onload = function() {
//         callback(reader.result);
//     }
//
//     console.log( reader.readAsText(file));
// }

// function onChange(event) {
//     var file = event.target.files[0];
//     var reader = new FileReader();
//     reader.onload = function(event) {
//         // The file's text will be printed here
//         console.log(event.target.result)
//     };
//
//     reader.readAsText(file);
// }

function previewFile() {
    var preview = document.querySelector('#myimg');
    var preview2 = document.querySelector('#myimg2');
    var file = document.querySelector('input[type=file]').files[0];
    var reader = new FileReader();
    var reader2 = new FileReader();

    reader.addEventListener("load", function () {
        preview.src = reader.result;
    }, false);

    if (file) {
        reader.readAsDataURL(file);
    }
    reader2.addEventListener("load", function () {
        preview2.src = reader2.result;
    }, false);

    if (file) {
        reader2.readAsDataURL(file);
    }
}