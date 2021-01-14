@extends('layouts.templateBack')


@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('categorie.update',$categorie->id) }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
                    @csrf
                    @method('post')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Modification categorie</h4>
                            <p class="card-category"></p>
                        </div>
                        <!-- Retour -->
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <a href="{{ route('forum.index') }}" class="btn btn-sm btn-secondary "><i class="fas fa-arrow-left"></i> Retour</a>
                                </div>
                            </div>
                            <br>
                            <!-- nom  -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Nom de la catégorie :</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('nom') ? ' is-invalid' : '' }}" name="nom" id="input-nom" type="text" placeholder="Catégorie" value="{{$categorie->nom}}" required="true" aria-required="true" />
                                        @if ($errors->has('name'))
                                        <span id="nom-error" class="error text-danger" for="input-nom">{{ $errors->first('nom') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!-- Image -->
                            <label class="col-sm-2 col-form-label">{{ __('Image') }}</label>
                            <div class="col-sm-7 custom-file">
                                <div class="form-group">
                                    <input type="file" class="custom-file-input" id="selector" name="image">
                                    <label class="custom-file-label" id="filename" for="validatedCustomFile">{{$categorie->image }}</label>
                                </div>
                            </div>

                            <!-- Preview Image -->
                            <div class="form-group">
                                <label class="col-sm-2 col-form-label">{{ __('Prévisulisation Image') }}</label>
                                <center>
                                    <img src="{{url($categorie->image)}}" id="img_preview" class="img-rounded" style="height : 150px; border: solid 1px ">
                                </center>
                            </div>
                            <div class="card-footer ml-auto mr-auto text-center">
                                <button type="submit" class="btn btn-success">Modifier</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    const fileSelector = document.getElementById('image');
    fileSelector.addEventListener('change', (event) => {
        const fileList = event.target.files;
        document.getElementById('image_upload').innerHTML = fileList[0].name;
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