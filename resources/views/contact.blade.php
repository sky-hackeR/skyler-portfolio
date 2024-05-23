@extends('layouts.app')

@section('content')

<!-- Contact -->
<section class="contact-area">
    <div class="container">
        <div class="gx-row d-flex justify-content-between gap-24">
            <div class="contact-infos">
                <h3 data-aos="fade-up">Contact Info</h3>
                <ul class="contact-details">
                    @foreach($contacts as $contact)
                        <li class="d-flex align-items-center" data-aos="zoom-in">
                            <div class="icon-box shadow-box">
                                <i class="iconoir-mail"></i>
                            </div>
                            <div class="right">
                                <span>MAIL us</span>
                                <h4>{{ $contact->email }}</h4>
                            </div>
                        </li>

                        <li class="d-flex align-items-center" data-aos="zoom-in">
                            <div class="icon-box shadow-box">
                                <i class="iconoir-phone"></i>
                            </div>
                            <div class="right">
                                <span>Contact Us</span>
                                <h4>{{ $contact->phone_number }}</h4>
                            </div>
                        </li>

                        <li class="d-flex align-items-center" data-aos="zoom-in">
                            <div class="icon-box shadow-box">
                                <i class="iconoir-map-pin"></i>
                            </div>
                            <div class="right">
                                <span>Location</span>
                                <h4>{!! nl2br(e($contact->address)) !!}</h4>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <h3 data-aos="fade-up">Social Info</h3>
                <ul class="social-links d-flex align-center" data-aos="zoom-in">
                    @foreach ($socials->take(3) as $social)
                        <li><a class="shadow-box" href="{{ $social->link }}"><i class="{{ $social->icon }}"></i></a></li>
                    @endforeach
                </ul>
            </div>

            <div data-aos="zoom-in" class="contact-form">
                <div class="shadow-box">
                    <img src="{{ asset('frontAssets/images/bg1.png') }}" alt="BG" class="bg-img">
                    <img src="{{ asset('frontAssets/images/icon3.png') }}" alt="Icon">
                    <h1>Let’s work <span>together.</span></h1>
                    <form method="POST" action="https://wpriverthemes.com/landing/gridx-html/mailer.php">
                        <div class="alert alert-success messenger-box-contact__msg" style="display: none" role="alert">
                            Your message was sent successfully.
                        </div>
                        <div class="input-group">
                            <input type="text" name="full-name" id="full-name" placeholder="Name *">
                        </div>
                        <div class="input-group">
                            <input type="email" name="email" id="email" placeholder="Email *">
                        </div>
                        <div class="input-group">
                            <input type="text" name="subject" id="subject" placeholder="Your Subject *">
                        </div>
                        <div class="input-group">
                            <textarea name="message" id="message" placeholder="Your Message *"></textarea>
                        </div>
                        <div class="input-group">
                            <button class="theme-btn submit-btn" name="submit" type="submit">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</section>

@endsection