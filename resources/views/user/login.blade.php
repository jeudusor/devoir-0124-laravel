@extends('base')


@section('title')
    Connexion
@endsection


@section('content')
    <!-- Section: Design Block -->
    <section class="Container pt-5">
        <!-- Jumbotron -->
        <div class="px-4 py-5 px-md-5 text-center text-lg-start"">
            <div class="container align-bottom">
                <div class="row gx-lg-5 align-items-center">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <h1 class="my-5 display-3 fw-bold ls-tight">
                            Une solution <br />
                            <span class="text-primary">Pour les sondages electorals</span>
                        </h1>
                        <p style="color: hsl(250, 20%, 100%)">
                            Macky sall va gagné, sonko va gagné, Auchan va gagné, la poule va gagné Inchallah,
                            Macky sall va gagné, sonko va gagné, Auchan va gagné, la poule va gagné Inchallah,
                            Macky sall va gagné, sonko va gagné, Auchan va gagné, la poule va gagné Inchallah,
                            Macky sall va gagné, sonko va gagné, Auchan va gagné, la poule va gagné Inchallah,
                            Macky sall va gagné, sonko va gagné, Auchan va gagné, la poule va gagné Inchallah,
                            Macky sall va gagné, sonko va gagné, Auchan va gagné, la poule va gagné Inchallah,

                        </p>
                    </div>

                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="card">
                            <div class="card-body py-5 px-md-5">
                                <form action="{{route('user.login')}}" method="POST" autocomplete="off">
                                    <!-- 2 column grid layout with text inputs for the first and last names -->
                                    @csrf

                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="email" id="form3Example3" name="email" class="form-control"  value="{{ old('email') }}"/>
                                        <label class="form-label" for="form3Example3">Adresse mail</label>
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="password" id="form3Example4"  name="password" class="form-control" />
                                        <label class="form-label" for="form3Example4">mots de passe</label>
                                    </div>

                                    <!-- Checkbox -->

                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-primary btn-block mb-4">
                                        connexion
                                    </button>

                                    <!-- Register buttons -->
                                    <div class="text-center">
                                        <p>or <a href="{{route('user.signup')}}"
                                                         class="fw-bold text-body"><u>sign up here</u></a></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumbotron -->
    </section>
    <!-- Section: Design Block -->
@endsection
