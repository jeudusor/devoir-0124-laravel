@extends('base')

@section('title')
    administration
@endsection


@section('content')
    <div class="position-absolute bottom-0 end-0">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div class="container card row-cols-1 col-6 mt-5">

        <div class="card-header pt-5    ">
            <h1> Ajouter un programme politique</h1>
        </div>
        <form action="{{route('user.candidat.create')}}" method="POST">
            @csrf
            <div class="form-row">
                @error('title')
                <div class=""><span class="text-bg-warning alert">{{ $message }}</span></div>
                @enderror
                <div class="form-group col-md-6 mt-5">
                    <label for="inputEmail4">Titre</label>
                    <input type="text"  name="title" class="form-control" id="inputEmail4" placeholder="Un quelque choses" value="{{ old('title') }}">
                </div>
                @error('content')
                <div class=""><span class="text-bg-warning alert">{{ $message }}</span></div>
                @enderror
                <div class="form-group col-md-6 my-2">
                    <label for="inputPassword4">Contenue</label>
                    <input type="text"  name="content" class="form-control" id="inputPassword4" value="{{ old('content') }}" placeholder="Dites au gens ce que vous voulez qu'ils entendent">
                </div>
            </div>
            <div class="form-row">
                @error('secteur_id')
                <div class=""><span class="text-bg-warning alert">{{ $message }}</span></div>
                @enderror
                <div class="form-group col-md-4">
                    <label for="inputState">Secteur concerné</label>
                    <select id="inputState" name="secteur_id" class="form-control">
                        @foreach($secteurs as $secteur)
                            <option value="{{$secteur->id}}">{{ $secteur->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            @error('isApprove')
            <div class=""><span class="text-bg-warning alert">{{ $message }}</span></div>
            @enderror
            <div class="form-group my-4">
                <div class="form-check">
                    <input class="form-check-input" name="isApprove" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        J'ai lu et approuver toutes les regles !
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>

    </div>
@endsection
