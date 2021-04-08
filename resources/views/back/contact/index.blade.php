@extends('layouts.templateBack')


@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Toutes les demandes</h4>
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
            <div>
              <a href="">
                <button style='margin-right:10px; float : right ;' type="submit" class="btn btn-danger delete_all" data-url="{{ url('contact-deleteselection') }}">
                  Supprimer la séléction
                </button>
              </a>
            </div>

            <br /> <br />
            <div class="table-responsive">
              <table class="table" id="table_id">
                <thead>
                  <tr class="td-actions text-center">
                    <th>N°</th>
                    <th>Traité</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Téléphone</th>
                    <th>Email</th>
                    <th>Sujet</th>
                    <th>Message</th>
                    <th>Date de création</th>
                    <th>Actions</th>
                    <th><input type="checkbox" id="master"></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($contact as $contacts)
                  <tr class="text-center">
                    <td>{{ $contacts->id }}</td>
                    @if ($contacts->traite == 0)
                    <td class="alert alert-danger">NON</td>
                    @elseif ($contacts->traite == 1)
                    <td class="alert alert-success">OUI</td>
                    @endif
                    <td>{{ $contacts->nom }}</td>
                    <td>{{ $contacts->prenom }}</td>
                    <td>{{ $contacts->telephone }}</td>
                    <td>{{ $contacts->email }}</td>
                    <td>{{ $contacts->sujet }}</td>
                    <td>{{substr($contacts->message, -50)}}</td>
                    <td>{{ $contacts->created_at }}</td>
                    @if ($contacts->traite == 0)
                    <td>
                      <div style="display: inline-flex;">
                        <a rel="tooltip" class="btn btn-linght" href="{{ route('contact.show', $contacts) }}" data-original-title="" title="">
                          <i class="fas fa-eye"></i>
                          <div class="ripple-container"></div>
                        </a>
                        <form action="{{ route('contact.update', $contacts->id) }}" method="post">
                          @csrf
                          @method('POST')
                          <button type="submit" rel="tooltip" class="btn  btn-linght btn-round" onclick="return confirm('Est tu sur de vouloir valider cette demande ?')">
                            <i class="fas fa-check"></i>
                          </button>
                        </form>
                        <form action="{{ route('contact.destroy', $contacts->id) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" rel="tooltip" class="btn  btn-linght btn-round" onclick="return confirm('Est tu sur de vouloir supprimer cette demande ?')">
                            <i class="fas fa-times"></i>
                          </button>
                        </form>
                      </div>
                    </td>
                    @elseif ($contacts->traite == 1)
                    <td>
                      <div style="display: inline-flex;">
                        <a rel="tooltip" class="btn btn-linght" href="{{ route('contact.show', $contacts) }}" data-original-title="" title="">
                          <i class="fas fa-eye"></i>
                          <div class="ripple-container"></div>
                        </a>
                        <form action="{{ route('contact.destroy', $contacts->id) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" rel="tooltip" class="btn  btn-linght btn-round" onclick="return confirm('Est tu sur de vouloir supprimer cette demande ?')">
                            <i class="fas fa-times"></i>
                          </button>
                        </form>
                      </div>
                    </td>
                    @endif
                    <td>
                      <input type="checkbox" class="sub_chk" data-id="{{$contacts->id}}">
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
@endsection