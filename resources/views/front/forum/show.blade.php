@extends('layouts.templateFront')


@section('content')
  <div class="section card">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="button-container">
            <a href="{{ url()->previous() }}" class="btn btn-primary btn-round btn-lg">
              Retour
            </a>
          </div>
        </div>

        <div class="col-md-8 ml-auto mr-auto">
          <h3 class="title" style="font-size: 2.2em;">{{$sujet->titre}}</h3>
          <br>
          <p>{{$sujet->description}}</p>
          <br> <br>
          <br>

        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="row">
            <div class="col-md-6">
              <div class="blog-tags">
                Posté par
                @if ($sujet->user->statut == "eleve")
                  <span class="label label-primary" style="text-align:left;">
                    {{$sujet->user->eleve->prenom}} {{ $sujet->user->eleve->nom }}
                  </span>
                @elseif ($sujet->user->statut == "admin")
                  <span class="label label-primary" style="text-align:left;">
                    {{$sujet->user->admin->prenom}} {{ $sujet->user->admin->nom }}
                  </span>
                @endif
              </div>
            </div>
            <div class="col-md-6" style="text-align:right;">
              <div class="blog-tags">
                <span>Le {{ \Carbon\Carbon::parse($sujet->created_at)->format('d/m/Y h:m')}} </span>
              </div>
            </div>
          </div>
          <hr>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="media-area">
            <h3 class="title text-center">{{$nbReponse}} Commentaires</h3><br>

            @if (isset($reponses))
              @foreach ($reponses as $r)
                <div class="media">
                  <a class="pull-left" href="#pablo">
                    <div class="avatar">
                      <img class="rounded-circle img-raised" src="{{url($r->user->image_profil)}}" alt="..." style="width: 80px; height: 80px;">
                    </div>
                  </a>
                  <div class="media-body card" style="padding:2%;">

                    <b>
                      @if ($r->user->statut == "eleve")
                        {{ $r->user->eleve->prenom }}
                      @elseif ($r->user->statut == "admin")
                        {{ $r->user->admin->prenom }}
                      @endif

                      @if ($r->user->statut == "eleve")
                        {{ $r->user->eleve->nom }}
                      @elseif ($r->user->statut == "admin")
                        {{ $r->user->admin->nom }}
                      @endif
                    </b>
                    <div style="margin-top:1%;">
                      <p style="text-align:justify;"> {{ $r->reponse }} </p>
                    </div>
                    <div class="media-footer">
                      <p style="font-style: italic;" class="btn btn-danger btn-neutral pull-left">{{ \Carbon\Carbon::parse($r->created_at)->format('d/m/Y H:i') }} </p>
                      <a onclick="like({{$r->id}});" class="btn btn-danger btn-neutral pull-right">
                        <i class="now-ui-icons ui-2_favourite-28"></i> <input type="number" id="inputLike" value="{{ $r->like }}">
                      </a>
                    </div>
                  </div>
                </div>
              @endforeach
            @endif

            @if(session()->has('errors'))
            <div class="alert alert-danger" role="alert">
              @foreach($errors->all() as $error)
              {{$error}}
              <br>
              @endforeach
            </div>
            @endif

            <h3 class="title text-center">Poster un commentaire</h3>
            <form action="{{route('sujet.reponse.store', $sujet->id)}}" method="post">
              @csrf
              @method('GET')
            <div class="media media-post">
              {{-- <a class="pull-left author" href="#pablo"> --}}
                <div class="avatar">
                  <img class="rounded-circle img-raised" alt="64x64" src="{{url(auth()->user()->image_profil)}}" style="width: 80px; height: 80px;">
                </div>
              {{-- </a> --}}
              <div class="media-body card">
                {{-- <lt-mirror style="display: none;">
                <lt-highlighter contenteditable="false" style="display: none;">
                <lt-div spellcheck="false" class="lt-highlighter__wrapper" style="width: 401px !important; height: 79px !important; transform: none !important; transform-origin: 200.5px 40px !important; zoom: 1 !important; margin-top: 0px !important; margin-left: 0px !important;">
                <lt-div class="lt-highlighter__scrollElement" style="top: 0px !important; left: 0px !important; width: 401px !important; height: 79px !important;"></lt-div>
              </lt-div>
            </lt-highlighter>
            <lt-div spellcheck="false" class="lt-mirror__wrapper notranslate" data-lt-scroll-top="0" data-lt-scroll-left="0" data-lt-scroll-top-scaled="0" data-lt-scroll-left-scaled="0" data-lt-scroll-top-scaled-and-zoomed="0" data-lt-scroll-left-scaled-and-zoomed="0" style="border-radius: 0px !important; border-width: 0px 0px 1px !important; border-style: none none solid !important; direction: ltr !important; font: 400 11.9994px / 23.9988px Montserrat, &quot;Helvetica Neue&quot;, Arial, sans-serif !important; font-feature-settings: normal !important; font-kerning: auto !important; hyphens: manual !important; letter-spacing: normal !important; line-break: auto !important; margin: 0px 0px 20px !important; padding: 10px 10px 0px 0px !important; text-align: start !important; text-decoration: none solid rgb(44, 44, 44) !important; text-indent: 0px !important; text-rendering: auto !important; text-transform: none !important; transform: none !important; transform-origin: 200.5px 40px !important; unicode-bidi: normal !important; white-space: pre-wrap !important; word-spacing: 0px !important; overflow-wrap: break-word !important; writing-mode: horizontal-tb !important; zoom: 1 !important; -webkit-locale: &quot;en&quot; !important; -webkit-rtl-ordering: logical !important; width: 391px !important; height: 69px !important;">
            <lt-div class="lt-mirror__canvas" style="margin-top: 0px !important; margin-left: 0px !important; width: 391px !important; height: 69px !important;"></lt-div>
          </lt-div>
        </lt-mirror> --}}
        <textarea class="form-control" name="reponse" placeholder="Ecrire un commentaire..." rows="4" spellcheck="false" data-gramm="false"></textarea>
        <div class="media-footer">
          <button type="submit" rel="tooltip" class="btn btn-primary pull-right">
            <i class="now-ui-icons ui-1_send"></i> Envoyer
          </button>
        </div>
      </div>
    </div> <!-- end media-post -->
    </form>
  </div>
</div>
</div>
</div>
<script>
// ---- LIKE ----
function like(id){
    console.log(id);
    // lesReponses = JSON.parse();
    // console.log(lesReponses);

  //   var user = JSON.parse();
  //   console.log(user);
  //
  // let likeBtn = document.getElementById('inputLike');
  // likeBtn.value = parseInt(likeBtn.value) + 1;

}
</script>

@endsection
