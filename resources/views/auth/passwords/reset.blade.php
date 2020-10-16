@extends('layouts.master')

@section('content')

<!-- Start Banner Area -->
{{ Breadcrumbs::render('reset') }}
<!-- End Banner Area -->


<!--================Login Box Area =================-->
<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="{{ asset('img/login.jpg') }}" alt="">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="login_form_inner">
                    @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <h3>Réinitialiser le mot de passe</h3>
                    <form class="row login_form" id="contactForm" novalidate="novalidate" method="POST"
                        action="{{ route('password.request') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <!-- Email -->
                        <div class="col-md-12 form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" placeholder="{{ __('Adresse email') }}" value="{{ old('email') }}"
                                required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="col-md-12 form-group">
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                placeholder="{{ __('Mot de passe') }}"  required
                                autocomplete="password" autofocus>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Password_confirmation -->
                        <div class="col-md-12 form-group">
                            <input id="password_confirmation" type="password"
                                class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                                placeholder="{{ __('Confirmer le mot de passe') }}"  required
                                autocomplete="password_confirmation" autofocus>

                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <!-- Submit -->
                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="primary-btn">Valider</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->
@endsection
