@extends('layouts.templateErr')
@section('content')
<div class="section">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <br><br>
                    <div class=" text-center">
                        <img style="width : 300px" src="{{url('front/images/v2.png')}}">
                        <p class="display-5" style="font-size: 2.5em;">Attention, votre session a expirée. Veuillez vous reconnecter.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection