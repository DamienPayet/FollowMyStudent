$(document).ready(function() {
    // the body of this function is in assets/js/now-ui-kit.js
    nowuiKit.initSliders();
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#preview-img').attr('src', e.target.result);
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

function GetUserDetailsContact() {
    var getNom = document.getElementById('user_name').getAttribute('data-user_name');
    var getPrenom = document.getElementById('user_surname').getAttribute('data-user_surname');
    var getEmail = document.getElementById('user_email').getAttribute('data-user_email');
    $('#nom').val(getNom);
    $('#prenom').val(getPrenom);
    $('#email').val(getEmail);

}