
function previewAvatar() {
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("avatar").files[0]);

    oFReader.onload = function (oFREvent) {
        document.querySelector(".avatar-image").src = oFREvent.target.result;
    };
}
