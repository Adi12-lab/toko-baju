@extends('layouts.app')
@section('main')
    <!-- about-section -->
    <section class="about-section">
        <div class="auto-container">
            <div class="row align-items-center clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12 text-column">
                    <div class="text-inner">
                        <h2>Together towards a sustainable life</h2>
                        <h3>Upcycling, restyling, eco-fashion and meaningful concepts in each collection.</h3>
                        <p>SOOVA STUDIO guides you towards more sustainable fashion. With us, you are not only thinking
                            about your appearance today but also our shared future.</p>
                        <a href="{{ route('contact') }}" class="theme-btn-one">Contact Us<i class="flaticon-right-1"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 image-column">
                    <figure class="image-box"><img src="{{asset('assets/images/resource/about.jpg')}}" width="370" height="610" alt="about-us"></figure>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 text-column">
                    <div class="text-inner">
                        <div class="box">
                            <h4>Soova Studio Overview</h4>
                            <p>SOOVA STUDIO emerged from feelings of boredom, discomfort, and fatigue of looking at the same
                                contents of the wardrobe. We saw clothes that were merely stored and had lost their charm.
                                However, we saw more than that - an opportunity to redesign and restyle these clothes,
                                creating art, beauty, and sustainability in the world of fashion.</p>
                        </div>
                        <div class="box">
                            <h4>Our Mission</h4>
                            <p>At SOOVA STUDIO, we are dedicated to creating products of unparalleled quality, without
                                disregarding the potential impact on the environment and surrounding communities. We believe
                                that fashion should be sustainable and responsible, and that is our commitment.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-section end -->
@endsection
