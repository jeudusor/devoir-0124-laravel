@extends('base')

@section('title')
    Inscription
@endsection

@section('content')
    <section class=" bg-image"
             >
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                                <form action="{{ route('user.signup')}}" method="POST">
                                    @csrf

                                    <div class="form-outline mb-4">

                                        <!-- Message d'erreur retourner par la methode Validate de l'objet Request -->
                                        @error('first_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <!-- Utilisation de l'ancienne valeur de la session stocker dans la method old de l'objet Request -->
                                        <input type="text" id="form3Example1cg" name="first_name" class="form-control form-control-lg" value="{{ old('first_name') }}" />
                                        <label class="form-label" for="form3Example1cg">Prénom</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        @error('last_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="text" id="form3Example3cg" name="last_name" class="form-control form-control-lg"  value="{{ old('last_name') }}"/>
                                        <label class="form-label" for="form3Example3cg">Nom</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="email" id="form3Example4cdg" name="email" class="form-control form-control-lg"  value="{{ old('email') }}"/>
                                        <label class="form-label" for="form3Example4cdg">Adresse email</label>
                                    </div>

                                    <div class="form-outline mb-4">
                                        @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <input type="password" id="form3Example4cg" name="password" class="form-control form-control-lg" />
                                        <label class="form-label" for="form3Example4cg">Password</label>
                                    </div>

                                    <div class="form-outline mb-3 ">
                                        @error('age')
                                        <div class="alert alert-danger ">{{ $message }}</div>
                                        @enderror
                                        <input type="text" id="form3Example4cdg" name="age" class="form-control form-control-lg" />
                                        <label class="form-label" for="form3Example4cdg">Age</label>
                                    </div>







                                    <div class="d-flex justify-content-center form-outline mb-4">
                                        @error('role')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <select class="form-select" name="role" aria-label="Default select example">
                                            <option value="candidat">Candidat (admin)</option>
                                            <option selected value="citizen">Citizen</option>
                                        </select>
                                    </div>



                                    <div class="d-flex justify-content-center">
                                        <button type="submit"
                                                class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                                    </div>


                                    <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="{{route('user.login')}}"
                                                                                                            class="fw-bold text-body"><u>Login here</u></a></p>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
