function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#img_preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#av_image").change(function() {
    readURL(this);
});
$('#modal_button').click(function() {
    var value = document.querySelector('input[name="new_avatar"]:checked').value;
    console.log(value);
    $('#imagechoisie').val(value);
    $('#myModal').modal('hide');
    document.getElementById("input-image_profil").src = "/front/images/avatars/" + value;
});
