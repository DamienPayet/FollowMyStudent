@extends('layouts.templateFront')


@section('content')
<link rel="stylesheet" href="{{url('back/plugins/fontawesome-free/css/all.min.css')}}">

<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<br>

<div class="section">
  <div class="col-md-12 col-lg-12">
    <div class="row">
      <div class="col-md-3">
        <div class="row  overlay-600">
          <div class="col-md-12">
            @foreach ($user->conversation as $conv)
            <div class="row" onclick="viewconv({{$conv}})">
              <div class="info-box ">
                @foreach ($conv->users as $otheru)
                @if ($user->id != $otheru->id)
                @if ( $otheru->statut == "dev")
                <span class="info-box-icon timeline-logoentreprise"><img src="{{url($otheru->developpeur->photo)}}"> </span>
                @elseif ($otheru->statut == "entreprise")
                <span class="info-box-icon timeline-logoentreprise"><img src="{{url($user->entreprise->logo)}}"> </span>
                @elseif ($otheru->statut == "admin")
                <span class="info-box-icon timeline-logoentreprise"><img src="{{url('/images/admin.png')}}"> </span>
                @endif
                <div class="info-box-content">
                  <span class="info-box-name">{{$otheru->name}}</span>
                  <span class="info-box-statut  ">{{$otheru->statut}}</span>
                  <!--  <span title="3 New Messages" class="badge bg-warning">3 Nouveau message</span>-->
                </div>
                @endif
                @endforeach
              </div>

            </div>
            @endforeach
            <div class="info-box ">
              <span class="info-box-icon timeline-logoentreprise"><img src="http://project1/seed/images/lacoste.png"> </span>
              <div class="info-box-content">
                <span class="info-box-number">entreprise</span>
                <span class="info-box-text ">entreprise</span>
                <!--  <span title="3 New Messages" class="badge bg-warning">3 Nouveau message</span>-->
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-prirary cardutline direct-chat direct-chat-primary">
              <div class="card-header">
                <h3 class="card-title" id="header">Direct Chat</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div id="chat-div" class="direct-chat-messages">
                </div>
              </div>
              <div class="card-footer">
                <div class="input-group">
                  <input id="msg" onKeyPress="if (event.keyCode == 13) send()" type="text" name="message" placeholder="Type Message ..." class="form-control">
                  <span class="input-group-append">
                    <button id="btn" class="btn btn-success" onclick="send()">Envoyer</button>
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  actualisation()



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
          console.log(response);
          viewmessage(response);
        },
        error: function() {
          console.log('Erreur');
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
        console.log('Erreur de sync');
      }
    });
    return "ok";
  }
  //Fonction ajax de affichage des messages
  function viewmessage(response) {
    var usr = <?php echo json_encode($user); ?>;
    var conversation = response.conversation;
    var conversation_user = response.conversation_user;
    var messages = response.messages;
    var username = '';


    //Affichage du nom du destinataire
    for (let i = 0; i < 2; i++) {
      if (usr.id != conversation_user[i].id) {
        header.innerHTML = conversation_user[i].name;
        $username = conversation_user[i].name;
      }
    }
    //affichage des message;
    var div = '';
    for (var i = 0; i < messages.length; i++) {
      //Mise en forme de la date et heure :

      var datetimes = messages[i].created_at.split("T");
      var date = datetimes[0];
      var heure = datetimes[1].split('.')[0];

      if (messages[i].sender == usr.id) {
        div += '<div class="direct-chat-msg right">';
        div += '<div class="direct-chat-infos clearfix">';
        //  div +=      '<span class="direct-chat-name float-right">'+messages[i].id+'</span>';
        div += '  <span class="direct-chat-timestamp float-left">' + date + ' ' + heure + '</span>';
        div += '</div>';
        div += '<img class="direct-chat-img" src="../dist/img/user1-128x128.jpg" alt="Message User Image">';
        div += '    <div class="direct-chat-text">';
        div += messages[i].message;
        div += '</div>';
        div += '</div>';
      } else {
        div += '<div class="direct-chat-msg">';
        div += '<div class="direct-chat-infos clearfix">';
        //div +=   '<span class="direct-chat-name float-left">'+$username+'</span>';
        div += '<span class="direct-chat-timestamp float-right">' + date + ' ' + heure + '</span>';
        div += '</div>';
        div += '<img class="direct-chat-img" src="../dist/img/user1-128x128.jpg" alt="Message User Image">';
        div += '<div class="direct-chat-text">';
        div += messages[i].message;
        div += '  </div>';
        div += '  </div>';
      }
    }
    document.getElementById("chat-div").innerHTML = div;
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
        viewmessage(response);
        document.getElementById('msg').value = '';
      },
      error: function() {
        console.log('Erreur');
      }
    });
  }
</script>
@endsection
