@extends('layouts.master')

@section('content')

<!-- Start Banner Area -->
{{ Breadcrumbs::render('email') }}
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
                    <h3>Réinitialiser le mot de passe</h3>
                    <form class="row login_form" id="contactForm" novalidate="novalidate" method="POST"
                        action="{{ route('password.email') }}">
                        @csrf

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
