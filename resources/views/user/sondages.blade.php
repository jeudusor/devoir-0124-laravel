@extends('base')

@section('title')
    Liste des sondages
@endsection

@section('content')

    @if($request->session()->get('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row row-cols-2 row-cols-md-1 g-3 w-50 p-3 h-50 d-block mx-auto" style="margin-top: 10%">
        @foreach($sondages as $sondage)
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card card-header card-text col-5"> {{ $sondage->felling_title }} </h2>
                        <p class="card-text">{{$sondage->content}}</p>
                        @if($sondage->felling === "interrested")
                            <p class="card-text text-success">j'aime</p>
                        @else
                            <p class="card-text text-danger">je n'aime pas</p>
                        @endif
                    </div>
                    <div class="card-footer align-content-center">

                            <button class="btn btn-secondary disabled ps-3 pe-3"> Sondage de {{$sondage->user->first_name}}  {{ $sondage->user->last_name }}</button>

                            <button class="btn btn-warning text-lg-end ps-2 pe-2">{{ $sondage->program->title}} </button>
                            <button class="btn  text-lg-end ps-2 pe-2">de {{ $sondage->program->user->first_name . " " . $sondage->program->user->last_name }}</button>


                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
