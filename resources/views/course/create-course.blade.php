@vite(['resources/css/course.css','resources/js/course.js'])

<h1>{{session('success')}}</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('course.store') }}">
    @csrf

    <div class="form-group">
        <label for="center_acp_name">{{ __('Center ACP Name') }}</label>
        <input type="text" name="center_acp_name" id="center_acp_name" class="form-control"
               value="{{ old('center_acp_name') }}">
    </div>

    <div class="form-group">
        <label for="observation">{{ __('Observation') }}</label>
        <input type="text" name="observation" id="observation" class="form-control" value="{{ old('observation') }}">
    </div>

    <div class="form-group">
        <label for="seance_code">{{ __('Seance Code') }}</label>
        <input type="text" name="seance_code" id="seance_code" class="form-control" value="{{ old('seance_code') }}">
    </div>

    <div class="form-group">
        <label for="vehicle">{{ __('Vehicle') }}</label>
        <select name="vehicle" id="vehicle" class="form-control">

            <option value="">Choisissez un véhicule</option>
            @foreach ($vehicles as $vehicle)
                <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
            @endforeach
        </select>
        <button type="button" class="add-vehicle-btn">+</button>
    </div>
    <div class="vehicle-form-container">
        <br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Créer un véhicule</div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nom</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="brand" class="col-md-4 col-form-label text-md-right">Marque</label>

                                <div class="col-md-6">
                                    <input id="brand" type="text"
                                           class="form-control @error('brand') is-invalid @enderror" name="brand"
                                           value="{{ old('brand') }}" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="license_plate" class="col-md-4 col-form-label text-md-right">Plaque
                                    d'immatriculation</label>

                                <div class="col-md-6">
                                    <input id="license_plate" type="text"
                                           class="form-control @error('license_plate') is-invalid @enderror"
                                           name="license_plate" value="{{ old('license_plate') }}"
                                           autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="type" class="col-md-4 col-form-label text-md-right">Type</label>

                                <div class="col-md-6">
                                    <input id="type" type="text"
                                           class="form-control @error('type') is-invalid @enderror" name="type"
                                           value="{{ old('type') }}" autofocus>
                                </div>
                            </div>
                            <button type="submit" value="vehicle" name="submit" class="btn btn-primary">Créer</button>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="learner">{{ __('Learner') }}</label>
        <select name="learner" id="learner" class="form-control">
            <option value="">Choisissez un apprenant</option>
            @foreach ($learners as $learner)
                <option value="{{ $learner->id }}">{{ $learner->lastname }}</option>
            @endforeach
        </select>
        <button type="button" class="add-learner-btn">+</button>
    </div>
    <div class="learner-form-container">
        <br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Enregistrer un apprenant</div>

                        <div class="card-body">

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">LastName</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text"
                                           class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                           value="{{ old('lastname') }}" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="firstname" class="col-md-4 col-form-label text-md-right">FirstName</label>

                                <div class="col-md-6">
                                    <input id="firstname" type="text"
                                           class="form-control @error('firstname') is-invalid @enderror"
                                           name="firstname"
                                           value="{{ old('firstname') }}" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="text"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}"
                                           autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text"
                                           class="form-control @error('phone') is-invalid @enderror" name="phone"
                                           value="{{ old('phone') }}" autofocus>
                                </div>
                            </div>
                            <button type="submit" value="learner" name="submit" class="btn btn-primary">Créer</button>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="trainer">{{ __('Trainer') }}</label>
        <select name="trainer" id="trainer" class="form-control">
            <option value="">Choisissez un formateur</option>
            @foreach ($trainers as $trainer)
                <option value="{{ $trainer->id }}">{{ $trainer->lastname }}</option>
            @endforeach
        </select>
        <button type="button" class="add-trainer-btn">+</button>
    </div>
    <div class="trainer-form-container">
        <br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Enregistrer un formateur</div>

                        <div class="card-body">

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">LastName</label>

                                <div class="col-md-6">
                                    <input id="lastname" type="text"
                                           class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                           value="{{ old('lastname') }}" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="firstname" class="col-md-4 col-form-label text-md-right">FirstName</label>

                                <div class="col-md-6">
                                    <input id="firstname" type="text"
                                           class="form-control @error('firstname') is-invalid @enderror"
                                           name="firstname"
                                           value="{{ old('firstname') }}" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                                <div class="col-md-6">
                                    <input id="email" type="text"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}"
                                           autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text"
                                           class="form-control @error('phone') is-invalid @enderror" name="phone"
                                           value="{{ old('phone') }}" autofocus>
                                </div>
                            </div>
                            <button type="submit" value="trainer" name="submit" class="btn btn-primary">Créer</button>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <button type="submit" name="course" class="btn btn-primary">{{ __('Create Course') }}</button>
</form>
