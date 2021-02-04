readed();
function readed() {
    $.ajax({
        type: 'GET',
        url: "/ajaxRequest/readed",
        data: {
            _token: '{{csrf_token()}}'
        },
        dataType: 'JSON',
        success: function (response) {
            setView(response);
        },
        error: function () {
            console.log('Erreur');
        }
    });

    setTimeout(readed, 3000);
}

function setView(conversation) {
    var counter = 0;
    var conv = conversation.conv;
    var dest = conversation.dest;
    for (var i = 0; i < conv.length; i++) {
        if (conv[i].is_open == false) {
            counter++;
        }
    }
    document.getElementById("envelope").innerHTML = conversation.nb_message;
    for (var i = 0; i < dest.length; i++) {
        if (document.getElementById("item_conv_usr_" + dest[i].id)) {
            document.getElementById("item_conv_usr_" + dest[i].id).style.backgroundColor = "#8fc742";
            document.getElementById("nb-message_" + dest[i].id).innerHTML = dest[i].nb_msg + " Message non lu ";
        }
    }
}
