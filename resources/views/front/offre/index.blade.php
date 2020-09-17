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
            </div>
            <div class="table-responsive">
              <table class="table" id="table_id">
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
                      <a rel="tooltip" href="{{ route('offre_front_show', $offres) }}" data-original-title="" title="">
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