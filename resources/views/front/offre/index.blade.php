@extends('layouts.templateFront')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="timeline">
      <br>
      @php
      $i = 0;
      @endphp

      @foreach ($offres as $offre)
      @php
      $test = false;
      if (!auth()->guest()) {
      }
      @endphp

      @if ($i == 0)
      <div class="time-label">
        @if (date("d-m-Y" , strtotime($offre->date_inline)) == date("d-m-Y"))
        <span class="bg-red">Aujourd'hui</span>
        @else
        <span class="bg-red">{{date("d-m-Y" , strtotime($offre->date_inline))}}</span>
        @endif
      </div>
      @else
      @if (date("d-m-Y", strtotime($offres[$i-1]->date_inline)) != date("d-m-Y" , strtotime($offre->date_inline)))
      <div class="time-label">
        <span class="bg-red">{{date("d-m-Y" , strtotime($offre->date_inline))}}</span>
      </div>
      @endif
      @endif
      <div>
        <div class="timeline-item">
          <span class="time"><i class="fas fa-clock"></i>{{$offre->date_inline}}</span>

          <div class="timeline-body">
            {{$offre->description}}
          </div>
          <div class="timeline-footer">
            <a href="{{route('offre_front_show', $offre)}}" class="btn btn-primary btn-sm">Afficher plus</a>
          </div>
        </div>
      </div>
      @php
      $i++;
      @endphp
      @endforeach
      <div>
        <i class="fas fa-clock bg-gray"></i>
      </div>
    </div>
  </div>
</div>
@endsection