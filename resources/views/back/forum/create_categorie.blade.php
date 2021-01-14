@extends('layouts.templateBack')


@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{ route('categorie.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
                    @csrf
                    @method('post')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Ajouter une catégorie</h4>
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
                            <!-- section  -->
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Nom de la catégorie :</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('nom') ? ' is-invalid' : '' }}" name="nom" id="input-nom" type="text" placeholder="Categorie" value="" required="true" aria-required="true" />
                                        @if ($errors->has('name'))
                                        <span id="nom-error" class="error text-danger" for="input-nom">{{ $errors->first('nom') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">Image :</label>
                                <div class="col-sm-7">
                                    <div class="custom-file">
                                        <input type="file" id="image" name="image" class="{{ $errors->has('image') ? ' is-invalid ' : '' }}custom-file-input">
                                        <label class="custom-file-label" id="image_upload" for="image">Choisir une image</label>
                                        @if ($errors->has('image'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('image') }}
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div> <br>
                            <!-- Preview Image -->
                            <div class="form-group">
                                <center>
                                    <img src="" id="img_preview" class="img-rounded" style="height : 150px; border: solid 1px ">
                                </center>
                            </div>
                            <br>
                            <div class="card-footer ml-auto mr-auto text-center">
                                <button name="id_section" value="{{$section->id}}" type="submit" class="btn btn-success">Ajouter</button>
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