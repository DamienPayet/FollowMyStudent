@extends('layouts.templateFront')


@section('content')
    <link rel="stylesheet" href="{{url('front/css/perso.css')}}">
    <div class="section section-pagination">
        <div class="container">
            <h3 class="title">FollowMyStudent</h3>
            <!-- <img src="../assets/img/shape-s.png" class="path path3"> -->
            <div class="row flex-row">
                <div id="leftbar" class="leftbar col-lg-4">
                    <div class="card card-plain">
                        <form class="card-header mb-3">
                            <div class="input-group">
                                <input id="finder" onKeyPress="if(event.keyCode == 13) finder()" type="text" class="form-control" placeholder="Search contact">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="tim-icons icon-zoom-split"></i></span>
                                </div>
                            </div>
                        </form>
                        <div class="list-group list-group-chat list-group-flush">
                            @foreach ($users as $utilisateur)
                                @if ($utilisateur->id != $user->id)
                                    <a onclick="testconv({{$utilisateur}})" class="list-group-item ">
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
                                                    <span class="badge badge-success"></span>
                                                    <div>
                                                        <small></small>
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
                            <div class="align-items-center">
                                <div class="input-group d-flex">
                                    <div class="input-group-prepend d-flex">
                                        <span class="input-group-text"><i class="tim-icons icon-pencil"></i></span>
                                    </div>
                                    <input type="text" id="msg" onKeyPress="if (event.keyCode == 13) send()"
                                           class="form-control form-control-lg" placeholder="Your message">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <script type="text/javascript">

        setview();
        actualisation();


        function finder(){
            var texct = document.getElementById("finder");
            if (textct != ""){
                $.ajax({
                    type : "post",
                    url : ""

                })
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
            console.log(utilisateur.id);
            $.ajax({
                type: 'POST',
                url: "{{ route('ajaxRequest.testconv') }}",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'JSON',
                success: function (response) {
                    viewconv(response.conv);
                },
                error: function () {
                    console.log('Erreur');
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
                    success: function (response) {
                        console.log(response);
                        viewmessage(response);
                    },
                    error: function () {
                        console.log('Erreur');
                    }
                });
            }
            setTimeout(actualisation, 3000);
        }

        //Fonction ajax de recuperation des messages
        function viewconv(conv) {
            console.log("ma conv");
            console.log(conv.id);
            console.log("ma conv");
            $.ajax({
                type: 'post',
                url: "{{ route('ajaxRequest.sync') }}",
                data: {
                    id: conv.id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'JSON',
                success: function (response) {
                    document.getElementById('btn').value = conv.id,

                        viewmessage(response);
                    console.log("ma reponse : ");
                    console.log(response);
                },
                error: function () {
                    console.log('Erreur de sync');
                }
            });
            return "ok";
        }

        //Fonction ajax de affichage des messages
        function viewmessage(response) {
            var usr = <?php echo json_encode($user); ?>;
            console.log(response);
            var conversation = response.conversation;
            var conversation_user = response.conversation_user;
            var messages = response.messages;
            var username = response.destinataire;


            header.innerHTML = username.nom + " " + username.prenom;
            document.getElementById("pic_profil").src=conversation_user[1].image_profil;
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
                    div += '	<small class="opacity-60">'+ heure +'</small>';
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
                    div += '<div><small class="opacity-60"><i class="far fa-clock"></i>'+heure+'</small>';
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
                success: function (response) {
                    viewmessage(response);
                    document.getElementById('msg').value = '';
                },
                error: function () {
                    console.log('Erreur');
                }
            });
        }
    </script>
@endsection
