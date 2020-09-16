@extends('layouts.templateFront')


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
                    <i class="material-icons">close</i>
                  </button>
                  <span>{{ session('status') }}</span>
                </div>
              </div>
            </div>
            @endif
            <div class="row">
              <div class="col-12 text-right">
                <a href="{{ route('offre.create') }}" class="btn btn-sm btn-primary">{{ __('Ajouter une offre') }}</a>
              </div>
            </div>
            <div class="row">
              <div class="col-12 text-right">
                <button style="margin-bottom: 10px" class="btn btn-sm btn-primary delete_all" data-url="{{ url('offres-deleteselection') }}">Supprimer la séléction</button>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table" id="table_idd">
                <thead class=" text-primary">
                  <tr>
                    <th>
                      {{ __('Titre') }}
                    </th>
                    <th>
                      {{ __('Description') }}
                    </th>
                    <th>
                      {{ __('Niveau') }}
                    </th>
                    <th>
                      {{ __('PDF') }}
                    </th>
                    <th>
                      {{ __('Date de création') }}
                    </th>
                    <th class="text-right">
                      {{ __('Actions') }}
                    </th>
                    <th width="50px"><input type="checkbox" id="master">
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($offre as $offres)
                  <tr>
                    <td>
                      {{ $offres->titre }}
                    </td>
                    <td>

                      {{ \Illuminate\Support\Str::limit($offres->description, 150, $end='...') }}
                      <a rel="tooltip" href="{{ route('offre.show', $offres) }}" data-original-title="" title="">
                        {{ 'Afficher plus' }}
                      </a>

                    </td>
                    <td>
                      {{ $offres->niveau }}
                    </td>
                    <td>
                      <!-- Création d'un lien vers le pdf -->
                      <div class="card shadow">
                        <div class="card-body">
                          <a href="{{ asset($offres->pdf) }}" target="_blank">PDF</a>
                        </div>
                      </div>
                      <!-- -->
                    </td>
                    <td>
                      {{ $offres->created_at }}
                    </td>
                    <td class="td-actions text-right">
                      <form action="{{ route('offre.destroy', $offres) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('offre.edit', $offres) }}" data-original-title="" title="">
                          <i class="material-icons">edit</i>
                          <div class="ripple-container"></div>
                        </a>

                        <button type="submit" class="btn btn-danger btn-link" data-original-title="" title="" onclick="">
                          <i >close</i>
                          <div class="ripple-container"></div>
                        </button>
                      </form>
                    </td>
                    <td>
                      <input type="checkbox" class="sub_chk" data-id="{{$offres->id}}">
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection