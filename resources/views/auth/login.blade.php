@extends('layouts.master')

@section('content')

{{-- <div class="wrapper">
    <div id="loader-container">
        <p id="loadingText">Loading</p>
    </div>
</div> --}}
<!-- Start Banner Area -->
{{ Breadcrumbs::render('login') }}
<!-- End Banner Area -->



<!--================Login Box Area =================-->
<section class="login_box_area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <img class="img-fluid" src="img/login.jpg" alt="">
                    <div class="hover">
                        <h4>Nouveau sur le site ?</h4>
                        <p>Tenez-vous informés des dernières nouveautés !</p>
                        <a class="primary-btn" href="{{ route('register') }}">Créer un compte</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="login_form_inner">
                    <h3>Compléter le formulaire</h3>
                    <form class="row login_form" id="contactForm" novalidate="novalidate" method="POST"
                        action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div class="col-md-12 form-group">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" placeholder="{{ __('Addresse email') }}" value="{{ old('email') }}"
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
                                placeholder="{{ __('Mot de passe') }}" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <!-- Submit -->
                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="primary-btn">{{ __('Valider') }}</button>

                            @if (Route::has('password.request'))
                            <a class="" href="{{ route('password.request') }}">
                                {{ __('Mot de passe oublié ?') }}
                            </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->
    {{-- Spinner --}}
    <script>
        $(window).load(function () {
            // Animate loader off screen
            $(".wrapper").fadeOut("slow");;
        });

    </script>
@stop
