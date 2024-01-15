<div class="row row-cols-2 row-cols-md-1 g-3 w-50 p-3 h-50 d-block mx-auto" style="margin-top: 10%">
    @foreach($secteurs as $secteur)
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title"> {{ $secteur->name }}</h2>
                    <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('user.showPrograms', [ 'idSecteur' => $secteur->id]) }}"> <button class="btn btn-primary"> Programme en lien </button></a>
                </div>
            </div>
        </div>
    @endforeach
</div>
{{ $secteurs->links() }}
