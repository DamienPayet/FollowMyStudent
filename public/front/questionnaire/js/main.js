var fieldlist = document.querySelectorAll(".field");
for(var i = 0 ; i < fieldlist.length ; i ++){
    fieldlist[i].style.display = "none";
}
setview(fieldlist[0]);
function setview(field){
    field.style.display = "block";
    var id = field.getAttribute("id");
    $(".quest_" + id).validate({
        submitHandler: function(form) {

            console.log(form);
        }
    });

}

function todb(){
    console.log("jt'envopie ça bg");
}
