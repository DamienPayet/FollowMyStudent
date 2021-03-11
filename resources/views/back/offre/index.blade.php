@extends('layouts.templateBack')


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Toutes les offres</h4>
          </div>
          <div class="card-body">
            @if (session('status'))
            <div class="row">
              <div class="col-sm-12">
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                    <i class="fas fa-times"></i>
                    </span>
                  </button>
                  <span>{{ session('status') }}</span>
                </div>
              </div>
            </div>
            @endif
            @if(session()->has('errors'))
            <div class="alert alert-danger" role="alert">
              @foreach($errors->all() as $error)
              {{$error}}
              <br>
              @endforeach
            </div>
            @endif
            <div>
              <a href="{{route('offre.create')}}">
                <button style='margin-left:10px;' type="submit" class="btn btn-primary">
                  Ajouter une offre
                </button>
              </a>
              <button style='margin-right:10px; float : right ;' type="submit" class="btn btn-danger delete_all" data-url="{{ url('offres-deleteselection') }}">
                Supprimer la séléction
              </button>
            </div>
            <br /> <br />
            <table class="table" id="table_id">
              <thead>
                <tr class="td-actions text-center">
                  <th>Titre</th>
                  <th>Description</th>
                  <th>Niveau</th>
                  <th>PDF</th>
                  <th>Vues</th>
                  <th>Validée</th>
                  <th>Date de création</th>
                  <th>Actions</th>
                  <th><input type="checkbox" id="master"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($offre as $offres)
                @if ($offres->valide == 1 )
                <tr class="text-center">
                  <td>{{ $offres->titre }}</td>
                  <td>{{substr($offres->description, -50)}}</td>
                  <td>{{ $offres->niveau }}</td>
                  <td>
                    @if (isset($offres->pdf))
                    <a href="{{url($offres->pdf)}}" target="_blank">
                      <img style="width : 30px" src="{{url('back/images/pdf.png')}}">
                    </a>
                    @else
                    <a>
                      <img style="width : 30px" src="{{url('back/images/no-pdf.jpg')}}">
                    </a>
                    @endif
                  </td>
                  <td>{{$offres->nb_vue}}</td>
                  @if ($offres->valide == 1 )
                  <td><span class="badge badge-success">Oui</span></td>
                  @elseif ($offres->valide == 0 )
                  <td><span class="badge badge-danger">Non</span></td>
                  @endif
                  <td>{{ $offres->created_at }}</td>
                  <td>
                    <div style="display: inline-flex;">
                      <a rel="tooltip" class="btn btn-linght" href="{{ route('offre_front_show', $offres) }}" data-original-title="" title="">
                        <i class="fas fa-eye"></i>
                        <div class="ripple-container"></div>
                      </a>
                      <a rel="tooltip" class="btn btn-linght" href="{{ route('offre.edit', $offres) }}" data-original-title="" title="">
                        <i class="fas fa-edit"></i>
                        <div class="ripple-container"></div>
                      </a>
                      <form action="{{route('offre.destroy', $offres->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" rel="tooltip" class="btn  btn-linght btn-round" onclick="return confirm('Est tu sur de vouloir supprimer cette offre ?')">
                          <i class="fas fa-times"></i>
                        </button>
                      </form>
                    </div>
                  </td>
                  <td>
                    <input type="checkbox" class="sub_chk" data-id="{{$offres->id}}">
                  </td>
                </tr>
                @endif
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Offres à valider</h4>
          </div>
          <div class="card-body">
            @if (session('status'))
            <div class="row">
              <div class="col-sm-12">
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">
                    <i class="fas fa-times"></i>
                    </span>
                  </button>
                  <span>{{ session('status') }}</span>
                </div>
              </div>
            </div>
            @endif
            @if($nonval_offres <= 0)

            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                </span>
              </button>
              <span><center>{{ __('Bonne nouvelle ! Il n\'y a aucune offre a valider.') }}</center></span>
            </div>
            @elseif($offres->valide == 0 )
            <div>
              <a>
                <button style='margin-right:10px; float : left ;' type="submit" class="btn btn-success validate_all" data-url="{{ url('offres-validateselection') }}">
                  Valider la séléction
                </button>
              </a>
              <button style='margin-right:10px; float : right ;' type="submit" class="btn btn-danger delete_all" data-url="{{ url('offres-deleteselection') }}">
                Supprimer la séléction
              </button>
            </div>
            <br /> <br />
            <table class="table" id="table_id">
              <thead>
                <tr class="td-actions text-center">
                  <th>Titre</th>
                  <th>Description</th>
                  <th>Niveau</th>
                  <th>PDF</th>
                  <th>Vues</th>
                  <th>Validée</th>
                  <th>Date de création</th>
                  <th>Actions</th>
                  <th><input type="checkbox" id="master1"></th>
                </tr>
              </thead>
              <tbody>
                @foreach($offre as $offres)
                @if($offres->valide == 0)
                <tr class="text-center">
                  <td>{{ $offres->titre }}</td>
                  <td>{{substr($offres->description, -50)}}</td>
                  <td>{{ $offres->niveau }}</td>
                  <td>
                    @if (isset($offres->pdf))
                    <a href="{{url($offres->pdf)}}" target="_blank">
                      <img style="width : 30px" src="{{url('back/images/pdf.png')}}">
                    </a>
                    @else
                    <a>
                      <img style="width : 30px" src="{{url('back/images/no-pdf.jpg')}}">
                    </a>
                    @endif
                  </td>
                  <td>{{$offres->nb_vue}}</td>
                  @if ($offres->valide == 1 )
                  <td><span class="badge badge-success">Oui</span></td>
                  @elseif ($offres->valide == 0 )
                  <td><span class="badge badge-danger">Non</span></td>
                  @endif
                  <td>{{ $offres->created_at }}</td>
                  <td>
                    <div style="display: inline-flex;">
                      <a rel="tooltip" class="btn btn-linght" href="{{ route('offre_front_show', $offres) }}" data-original-title="" title="">
                        <i class="fas fa-eye"></i>
                        <div class="ripple-container"></div>
                      </a>
                      <a rel="tooltip" class="btn btn-linght" href="{{ route('offre.edit', $offres) }}" data-original-title="" title="">
                        <i class="fas fa-edit"></i>
                        <div class="ripple-container"></div>
                      </a>
                      <form action="{{ route('offre.validation', $offres) }}" method="post">
                        @csrf
                        @method('POST')
                        <button type="submit" rel="tooltip" class="btn  btn-linght btn-round" onclick="return confirm('Est tu sur de vouloir valider cette offre ?')">
                          <i class="fas fa-check"></i>
                        </button>
                      </form>
                      <form action="{{route('offre.destroy', $offres->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" rel="tooltip" class="btn  btn-linght btn-round" onclick="return confirm('Est tu sur de vouloir supprimer cette offre ?')">
                          <i class="fas fa-times"></i>
                        </button>
                      </form>
                    </div>
                  </td>
                  <td>
                    <input type="checkbox" class="sub_chk1" data-id="{{$offres->id}}">
                  </td>
                </tr>
                @endif
                @endforeach
              </tbody>
            </table>
            @endif

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection