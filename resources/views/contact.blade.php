@extends('layouts.master')

@section('content')

<!-- Start Banner Area -->
{{ Breadcrumbs::render('contact') }}
<!-- End Banner Area -->

<!--================Contact Area =================-->
<section class="contact_area section_gap_bottom">
    <div class="container">
        <div class="mapBox">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d34138.425826434046!2d1.608071867249401!3d50.50898572188345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47ddd08512744ae3%3A0x40af13e8163d210!2sLe%20Touquet-Paris-Plage!5e0!3m2!1sfr!2sfr!4v1602609722268!5m2!1sfr!2sfr" width="1110" height="420" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="contact_info">
                    <div class="info_item">
                        <i class="fas fa-building"></i>
                        <h6>482 Rue Emile Grevet</h6>
                        <p>62780 Cucq</p>
                    </div>
                    <div class="info_item">
                        <i class="fas fa-phone"></i>
                        <h6><a href="#">07 82 03 29 17</a></h6>
                        <p>Du lundi au vendredi de 10h à 19h</p>
                    </div>
                    <div class="info_item">
                        <i class="fas fa-at"></i>
                        <h6><a href="#">alexismoren62@hotmail.com</a></h6>
                        <p>Envoyez un email à tout moment !</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <form class="row contact_form" action="https://formspree.io/f/mleojjkv" method="POST" id="contactForm">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nom" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nom'" required>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Adresse email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Adresse email'" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Sujet" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Sujet'" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea class="form-control" name="message" id="message" rows="1" placeholder="Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Message'" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <button type="submit" value="submit" class="primary-btn">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!--================Contact Area =================-->


@stop
