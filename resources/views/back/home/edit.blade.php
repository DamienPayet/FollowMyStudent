@extends('layouts.templateBack')


@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{ route('home.update', $post->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">Editer un post</h4>
                                <p class="card-category"></p>
                            </div>
                            <!-- Retour -->
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <a href="{{ route('home.index') }}" class="btn btn-sm btn-secondary "><i
                                                class="fas fa-arrow-left"></i> Retour</a>
                                    </div>
                                </div>
                                <br>
                                <!-- Titre  -->
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">Titre :</label>
                                    <div class="form-group">
                                        <input
                                            class="form-control"
                                            name="titre" id="input-titre" type="text" placeholder="titre "
                                            value="{{$post->titre}}" required="true" aria-required="true"/>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{$post->description}}" onchange="set()"  id="ctxtbo">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Text
                                    </label>
                                    <div class="form-group">
                                        <textarea name="txtbo"  disabled id="txtbo" style="width: 100%" rows="5">{{$post->description}}</textarea>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" onchange="set()" id="clink">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Lien
                                    </label>
                                    <div class="form-group">
                                        <input class="form-control"
                                               style="color : #009fff ; text-decoration: underline;" disabled name="link" id="link" type="text" placeholder="Lien"
                                               value="{{$post->lien}}"  aria-required="true"/>{{$post->lien}}
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{$post->image}}" onchange="set()" id="cpic">
                                    <label class="form-check-label" for="defaultCheck1">
                                        Image
                                    </label>
                                    <div class="custom-file">
                                        <input disabled type="file" name="pic" class="custom-file-input" id="pic">
                                        <label id="filename" class="custom-file-label" name="pic" for="validatedCustomFile">Choose
                                            picture ...</label>
                                        <div class="invalid-feedback">Example invalid custom file feedback</div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <img src="" id="img_preview"  class="rounded mx-auto d-block"
                                             style="height : 200px;" >
                                    </div>
                                </div>

                                <div class="card-footer ml-auto mr-auto text-center )">
                                    <button type="submit"
                                            class="btn btn-success">Modifier le poste
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function set(){
            var txtbo = document.getElementById("txtbo");
            var link = document.getElementById("link");
            var pic = document.getElementById("pic");
            var ctxtbo = document.getElementById("ctxtbo");
            var clink = document.getElementById("clink");
            var cpic = document.getElementById("cpic");
            if(ctxtbo.checked == true){
                txtbo.disabled = false;
            }else{
                txtbo.disabled = true;
                txtbo.value = "";
            }
            if(clink.checked == true){
                link.disabled = false;
            }else{
                link.disabled = true;
                link.value = "";
            }
            if(cpic.checked == true){
                pic.disabled = false;
            }else{
                pic.disabled = true;
                pic.value = "";
            }
        }
        const fileSelector = document.getElementById('pic');
        fileSelector.addEventListener('change', (event) => {
            const fileList = event.target.files;
            document.getElementById('filename').innerHTML = fileList[0].name;
            event.target.files
            var file = event.target.files[0];
            if(file){
                var reader = new FileReader();

                reader.onload = function(){
                    $("#img_preview").attr("src", reader.result);
                }
                reader.readAsDataURL(file);
            }
        });
        function verif() {
            ckbox = document.getElementById('ck1');
            div = document.getElementById('selector');
            if (ckbox.checked == false) {
                div.style = "display : none";
                document.getElementById('select').options[0].selected = true;
            } else {
                div.style = "display : flex";
            }
        }
    </script>
@endsection
