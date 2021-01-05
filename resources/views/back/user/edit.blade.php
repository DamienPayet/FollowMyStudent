@extends('layouts.templateBack')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <text style='margin-left:10px;color:red;'>* Champs obligatoires</text>
                <br>
                <div class="card ">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-12 ">
                                <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary "><i class="fas fa-arrow-left"></i> Retour</a>
                            </div>
                        </div>
                        <br>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <form style='margin-left:10px;' method="POST" action="{{route('users.update', $user->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nom">Nom *</label>
                                <input type="text" class="form-control" id="nom" name="nom" placeholder="Entrer le nom" value="@if ($user->statut == 'eleve'){{ $user->eleve->nom }}@elseif ($user->statut == 'admin'){{ $user->admin->nom }}@endif">
                            </div>
                            <div class="form-group">
                                <label for="nom">Prénom *</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Entrer le prénom" value="@if ($user->statut == 'eleve'){{ $user->eleve->prenom }}@elseif ($user->statut == 'admin'){{ $user->admin->prenom }}@endif">
                            </div>
                            <div class="form-group">
                                <label for="email">Email *</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Entrer l'email" value="{{$user->email}}">
                            </div>
                            <div class="form-group">
                                <label for="statut">Statut *</label>
                                <select class="form-control" id="statut" name="statut">
                                    @if ($user->statut == "eleve")
                                    <option value="eleve">Élève</option>
                                    @elseif ($user->statut == "admin")
                                    <option value="admin">Administrateur</option>
                                    @endif
                                    <option value="eleve">Élève</option>
                                    <option value="admin">Administrateur</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <img src="{{url($user->image_profil)}}" id="img_preview" class="img-rounded" style="height : 150px; border: solid 1px ">
                            </div>
                            <div class="form-group">
                                <label for="statut">Avatar</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="selector" name="image_profil">
                                    <label class="custom-file-label" id="filename" for="validatedCustomFile">{{substr($user->image_profil , 32)}}</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Mot de passe</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Entrer le mot de passe" value="">
                            </div>
                            <div class="form-group">
                                <label for="email">Confirmation mot de passe</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Entrer le mot de passe de confirmation" value="">
                            </div>
                            <div class="card-footer ml-auto mr-auto text-center )">
                                <button type="submit" class="btn btn-success">Modifier</button>
                            </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    const fileSelector = document.getElementById('selector');
    fileSelector.addEventListener('change', (event) => {
        const fileList = event.target.files;
        document.getElementById('filename').innerHTML = fileList[0].name;
        event.target.files
        var file = event.target.files[0];
        if (file) {
            var reader = new FileReader();

            reader.onload = function() {
                $("#img_preview").attr("src", reader.result);
            }
            reader.readAsDataURL(file);
        }
    });
</script>

@endsection