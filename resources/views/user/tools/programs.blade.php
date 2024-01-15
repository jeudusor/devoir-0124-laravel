<div class="row row-cols-2 row-cols-md-1 g-3 w-50 p-3 h-50 d-block mx-auto" style="margin-top: 10%">
    @foreach($programs as $program)
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title"> {{ $program->title }}</h2>
                    <p class="card-text">{{$program->content}}</p>
                </div>
                <div class="card-footer align-content-center">
                    @if($program->user->id !== Auth::user()->id)
                        <button class="btn btn-secondary disabled ps-3 pe-3"> Programme de {{$program->user->first_name}}  {{ $program->user->last_name }}</button>
                        <a href="{{ route('user.showProgram', ['idProgram' => $program->id]) }}"> <button class="btn btn-success  text-center ps-5 pe-5">  Faire un sondage </button></a>

                    @else
                        <button class="btn btn-primary text-lg-end ps-5 pe-5"> Vous appartient</button>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
