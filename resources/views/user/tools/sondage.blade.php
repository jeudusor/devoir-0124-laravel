<div class="row row-cols-2 row-cols-md-1 g-3 w-50 p-3 h-50 d-block mx-auto" style="margin-top: 10%">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title"> {{ $program->title }}</h2>
                    <p class="card-text">{{$program->content}}</p>
                </div>
                <div class="card-footer align-content-center">
                    @if($program->user->id !== Auth::user()->id)
                        <button class="btn btn-secondary disabled ps-3 pe-3"> Programme de {{$program->user->first_name}}  {{ $program->user->last_name }}</button>
                        <button  class="btn btn-success ms-xxl-5 text-center ps-3 pe-3">  sondage en cours..</button>
                        <div>
                            <span class="aria-disable ">Tag</span>
                            <div disabled class="btn btn-warning  mt-3  ms-3 text-end ps-1 pe-1">{{$program->secteur->name }}</div>
                        </div>


                        <div class="card-body align-content-center mt-5">
                            <form action="{{route('user.createS')}}" method="POST" autocomplete="off">
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                @csrf

                                <!-- Email input -->
                                <div class="form-outline mb-4 ">
                                    @error('felling_title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <input type="text" id="form3Example3" name="felling_title" class="form-control" placeholder="ici" value="{{ old('felling_title') }}"/>
                                    <label class="form-label" for="form3Example3">Titre de votre ressentie</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <textarea class="" name="content" id="form3Example4" placeholder="mettez le ici" cols="70" rows="5"></textarea>
                                    @error('content')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label class="form-label" for="form3Example4">Votre avis compte</label>
                                </div>

                                <div class="form-outline mb-4">
                                    @error('felling')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label class="form-label" for="form3Example4">Votre ressentie face au Programme</label>
                                    <div class="form-check mt-2 mb-3">
                                        <input class="form-check-input " type="radio" name="felling" value="interrested" id="flexRadioDefault1">
                                        <label class="btn btn-outline-success form-check-label" for="flexRadioDefault1">
                                            j'aime  !
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="felling" value="un_interrested" id="flexRadioDefault2">
                                        <label class="btn btn-outline-danger form-check-label" for="flexRadioDefault2">
                                            je n'aime pas !
                                        </label>
                                    </div>
                                </div>
                                <div  hidden="on">
                                    <input  type="text" id="form3Example3" name="programs_id" class=" form-control" autocomplete="off" value="{{ $program->id }}"/>
                                </div>

                                <!-- Checkbox -->

                                <!-- Submit button -->
                                <button type="submit" class= "align-self-end btn btn-primary btn-block mt-5">
                                    Publier
                                </button>

                            </form>
                        </div>
                    @else
                        <button class="btn btn-primary text-lg-end ps-5 pe-5"> Vous appartient</button>
                    @endif
                </div>
            </div>
        </div>
</div>
