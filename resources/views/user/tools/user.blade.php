<a class="nav-link" href="{{ route('user.profil') }}">| profil</a>
<a class="nav-link disabled" aria-disabled="true">
    <div class="navbar-nav ms-auto mb-2 mb-lg-0 text-success">
        | {{\Illuminate\Support\Facades\Auth::user()->first_name . " " . \Illuminate\Support\Facades\Auth::user()->last_name}} </div>
</a>
<a class="nav-link" href="{{ route('user.sondages') }}">| Mes sondages</a>
@if(\Illuminate\Support\Facades\Auth::user()->role === "candidat")
<form action="{{ route('user.candidat.admin') }}" method="GET">
    @csrf

    <button class="nav-link border btn btn-primary"> Administration</button>
</form>
@endif
