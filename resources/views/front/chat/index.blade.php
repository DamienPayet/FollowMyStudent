@extends('layouts.templateFront')


@section('content')

<meta name="viewport" content="width=device-width, initial-scale=1" xmlns="http://www.w3.org/1999/html">
<link rel="stylesheet" href="{{url('front/css/perso.css')}}">
<div class="section section-pagination">
    <div class="container">
        <h3 class="title text-center">Chat instantané</h3>
        <!-- <img src="../assets/img/shape-s.png" class="path path3"> -->
        <div class="row flex-row">
            <div id="leftbar" class="leftbar col-lg-4">
                <div class="card card-plain">

                    <div class="input-group">
                        <input id="finder" onKeyPress="if(event.keyCode == 13) finder()" type="text" class="form-control" placeholder="Rechercher un contact...">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="tim-icons icon-zoom-split"></i></span>
                        </div>
                    </div>

                    <div id="chatuserlist" class=" list-group list-group-chat list-group-flush">
                        @php($counter = 0 )
                        @foreach ($users as $utilisateur)
                        @if ($utilisateur->id != $user->id)
                        @php($counter++)
                        <a onclick="testconv({{$utilisateur}})" id="item_conv_usr_{{$utilisateur->id}}" class="list-group-item chatuserlist">
                            <div class="media">
                                <img alt="Image" src="{{url($utilisateur->image_profil)}}" class="avatar">
                                <div class="media-body ml-2">
                                    <div class="justify-content-between align-items-center">
                                        @if($utilisateur->statut == "eleve")
                                        <h6 class="mb-0">{{$utilisateur->eleve->nom}} {{$utilisateur->eleve->prenom}}</h6>
                                        @else
                                        <h6 class="mb-0">{{$utilisateur->admin->nom}} {{$utilisateur->admin->prenom}}</h6>
                                        @endif
                                        <!--Ici nombre de message nom lu -->
                                        <span class="badge badge-danger" id="nb-message_{{$utilisateur->id}}"></span>
                                        <div>
                                            <small id="info_msg_{{$utilisateur->id}}"></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div id="mywindow" style="display: none" class="card card-plain">
                    <div class="card-header d-inline-block">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="media align-items-center">
                                    <img alt="Image" id="pic_profil" src="../assets/img/p10.jpg" class="avatar">
                                    <div class="media-body">
                                        <h6 id="header" class="mb-0 d-block"></h6>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="chat-div" class=" card-chat card-body">
                    </div>
                    <div class="card-footer d-block">
                        <div class="row justify-content-center">
                            <div id="txtdiv" class="col-lg-10">
                                <textarea id="msg" class="form-control form-control-lg" placeholder="Votre message..."></textarea>
                            </div>
                            <div class=col-lg-1">
                                <button id="btn" onclick="send()" class="">
                                    <i class="far fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{url('front/js/chatresolver.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript">

</script>
<script type="text/javascript">
    $(document).ready(function() {
        emoji();
    });
    setview();
    actualisation();

    function emoji() {
        $("#msg").emojioneArea({
            inline: true
        });
        //console.log(document.getElementsByClassName("emojionearea-editor").length);
    }

    function finder() {
        var texct = document.getElementById("finder");
        var listItens = document.querySelectorAll('.chatuserlist');
        for (var i = 0; i < listItens.length; i++) {
            var txt1 = listItens[i].innerText.toUpperCase();
            var txt2 = texct.value.toUpperCase();
            if (txt1.includes(txt2) == false) {
                document.getElementById(listItens[i].id).style.display = "none";
            } else {
                document.getElementById(listItens[i].id).style.display = "block";
            }
        }
    }

    function setview() {
        var larg = (document.body.clientWidth);
        var haut = (document.body.clientHeight);
        haut = haut / 2;
        var hauteur = haut + "px";
        var mafenetre = document.getElementById("chat-div");
        mafenetre.style.height = hauteur;


    }

    function testconv(utilisateur) {
        document.getElementById("mywindow").style = "display : flex";
        var id = utilisateur.id;
        document.getElementById("item_conv_usr_" + id).style.backgroundColor = "white";
        document.getElementById("nb-message_" + id).innerHTML = "";
        $.ajax({
            type: 'POST',
            url: "{{ route('ajaxRequest.testconv') }}",
            data: {
                id: id,
                _token: '{{csrf_token()}}'
            },
            dataType: 'JSON',
            success: function(response) {
                viewconv(response.conv);
            },
            error: function() {
                //console.log('Erreur');
            }
        });
    }

    //fonction ajax actualisation automatique
    function actualisation() {
        if (document.getElementById('btn').value != '') {
            var id = document.getElementById('btn').value;

            $.ajax({
                type: 'POST',
                url: "{{ route('ajaxRequest.sync') }}",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'JSON',
                success: function(response) {
                    viewmessage(response);
                },
                error: function() {
                    //  console.log('Erreur');
                }
            });
        }
        setTimeout(actualisation, 3000);
    }

    //Fonction ajax de recuperation des messages
    function viewconv(conv) {

        $.ajax({
            type: 'post',
            url: "{{ route('ajaxRequest.sync') }}",
            data: {
                id: conv.id,
                _token: '{{csrf_token()}}'
            },
            dataType: 'JSON',
            success: function(response) {
                document.getElementById('btn').value = conv.id,

                    viewmessage(response);
            },
            error: function() {
                // console.log('Erreur de sync');
            }
        });
        emoji();
    }

    //Fonction ajax de affichage des messages
    function viewmessage(response) {
        var usr = <?php echo json_encode($user); ?>;
        var conversation = response.conversation;
        var conversation_user = response.conversation_user;
        var messages = response.messages;
        var username = response.destinataire;


        header.innerHTML = username.nom + " " + username.prenom;
        document.getElementById("pic_profil").src = conversation_user[1].image_profil;
        //affichage des message;
        var div = '';
        for (var i = 0; i < messages.length; i++) {
            //Mise en forme de la date et heure :
            var datetimes = messages[i].created_at.split("T");
            var date = datetimes[0];
            var heure = datetimes[1].split('.')[0];


            if (messages[i].sender == usr.id) {
                div += '	<div class="row justify-content-end text-right">';
                div += '	<div class="col-auto">';
                div += '	<div class="card bg-primary text-white">';
                div += '	<div class="card-body p-2">';
                div += '	<p class="mb-1">' + messages[i].message + '<br></p>';
                div += '	<div>';
                div += '	<small class="opacity-60">' + heure + '</small>';
                div += '	<i class="tim-icons icon-check-2"></i>';
                div += '	</div>';
                div += '	</div>';
                div += '	</div>';
                div += '	</div>';
                div += '	</div>';
            } else {
                div += '<div class="row justify-content-start">';
                div += '<div class="col-auto">';
                div += '<div class="card ">';
                div += '<div class="card-body p-2">';
                div += '<p class="mb-1">' + messages[i].message + '</p>';
                div += '<div><small class="opacity-60"><i class="far fa-clock"></i>' + heure + '</small>';
                div += '</div>';
                div += '</div>';
                div += '</div>';
                div += '</div>';
                div += '</div>';
            }
        }
        div += '</ul>';
        document.getElementById("chat-div").innerHTML = div;
        document.getElementById("chat-div").scrollTo(0, document.getElementById("chat-div").scrollHeight);
    }

    //Fonction envoie de message;
    function send() {

        var message = document.getElementById('msg').value;
        var conversation_id = document.getElementById('btn').value;

        $.ajax({
            type: 'post',
            url: "{{ route('ajaxRequest.post') }}",
            data: {
                message: message,
                conversation_id: conversation_id,
                _token: '{{csrf_token()}}'
            },
            dataType: 'JSON',
            success: function(response) {
                document.getElementById("msg").value = "";
                document.getElementsByClassName('emojionearea-editor')[0].innerText = "";
                document.getElementsByClassName('emojionearea-editor')[0].innerHTML = "";
                viewmessage(response);

            },
            error: function() {
                // console.log('Erreur');
            }
        });

    }
</script>
@endsection