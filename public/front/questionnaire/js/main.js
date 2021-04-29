var fieldlist = document.querySelectorAll(".field");
for (var i = 0; i < fieldlist.length; i++) {
    fieldlist[i].style.display = "none";
}
//Where i am
// Recupere les reponse et le question pour l'utilisateur X
$.ajax({
    type: 'get',
    url: '/front/get_info_quest',
    success: function (data) {
console.log(data);
        setview(fieldlist[data.start_to]);
    },
    error: function (data) {

        setview(fieldlist[0]);
    }
});


function setview(field) {
    field.style.display = "block";
    window.scrollTo(0, 0);
    var id = field.getAttribute("id");
    $(".quest_" + id).validate({
        lang: 'fr',
        submitHandler: function (form) {
            todb(form)
            if (fieldlist[form.getAttribute("id")]) {
                field.style.display = "none";
                setview(fieldlist[form.getAttribute("id")]);
            } else {
                field.style.display = "none";
                window.location.href = "/"
            }
        }
    });
}

function todb(form) {
    var data = new Map();
    var inputs = document.querySelectorAll(".question_" + form.getAttribute("id"));
    for (var i = 0; i < inputs.length; i++) {
        data[inputs[i].name] = inputs[i].value;
    }
    console.log(data);
    $.ajax({
        type: 'get',
        url: "/front/response_store",
        data: {
            df: data,
            part: document.getElementById("info_" + form.getAttribute("id")).value
        },
        success: function (response) {
            console.log(response);
        },
        error: function (data) {
            console.log(data);
        }
    });
}


