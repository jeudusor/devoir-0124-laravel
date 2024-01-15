@extends('base')

@section('title')
    Tableau de bord
@endsection

@section('content')

    <div class="position-absolute bottom-0 end-0">
        @error('yetConnect')
        <div class=""><span class="text-bg-warning alert">{{ $message }}</span></div>
        @enderror
        @error('unknowSecteur')
        <div class=""><span class="text-bg-warning alert">{{ $message }}</span></div>
        @enderror
    </div>

    @if(@isset($programs))
        @include('user.tools.programs')
    @elseif(@isset($secteurs))
        @include('user.tools.secteur')
    @elseif(@isset($program))
        @include('user.tools.sondage')
    @endif
@endsection
