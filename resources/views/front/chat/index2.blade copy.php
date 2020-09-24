@extends('layouts.templateFront')


@section('content')
<div id="acceuil" class="section section-notifications">
	<link rel="stylesheet" href="{{url('front/css/perso.css')}}">
	<div class="container">
		<div class="section">
			<div class="content">
				<div class="row">
					<!-- Affichage de la liste des conversations -->
					@foreach ($user->conversation as $conv)
					@foreach ($conv->users as $otheru)
					@if ($user->id != $otheru->id)
					<div class="row">
						<div class="col-sm-3">
							<div class="card" onclick="viewconv({{$conv}})">
								<div class="card-block">
									<center>
										<div class="col-md-5">
											<img class="pic_card_msg" src="{{url('front/images/init.jpg')}}">
										</div>
									</center>
									<div class="col-md-9 box-content">
										<div class="row">
											<span align="center" class="text_header_msg"> {{$otheru->name}}</span>
										</div>
										<center>
											<div class="col-md-3">
												<span class="badge badge-info text_body_msg"> {{$otheru->statut}}</span>
											</div>
										</center>

									</div>
								</div>
							</div>
						</div>
					</div>
					@endif
					@endforeach
					@endforeach
					<!-- Fin Affichage de la liste des conversations -->

					<!-- Affichage des messages -->
					<div class="col-sm-8">
						<div class="card box-message">

							<div class="card-header mt-2  chatheader">
								<h3 id="header"> Message :</h3>
							</div>
							<div id="chat-div" class="card-body messageplace">
							</div>
							<div class="card-footer ">
								<div class="input-group mb-3">
									<input type="text" id="msg" onKeyPress="if (event.keyCode == 13) send()" class="form-control" placeholder="Message">
									<div class="input-group-append">
										<span id="btn" class="input-group-text" onclick="send()">Envoyer</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Fin Affichage des messages -->
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
		var div = '<ul class="list-group list-group-flush">';
		for (var i = 0; i < messages.length; i++) {
			//Mise en forme de la date et heure :

			var datetimes = messages[i].created_at.split("T");
			var date = datetimes[0];
			var heure = datetimes[1].split('.')[0];


			if (messages[i].sender == usr.id) {
				div += '<li class="message-item ">';
				div += '<span class="speech-bubble-send">' + messages[i].message + '</span>';
				div += '</li>';
			} else {
				div += '<li class="message-item ">';
				div += '<img class="imgchat" src="https://cdn.radiofrance.fr/s3/cruiser-production/2020/08/6fffee03-9634-4a89-9789-816fe9146c0f/870x489_koh_lanta_savoyard.jpg"></img>';
				div += '	<span class="speech-bubble-receipt">' + messages[i].message + '</span>';
				div += '	</li>';
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