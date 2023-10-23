@extends('layouts.app')
@section('main')
    <!-- contact-section -->
    <section class="contact-section">
        <div class="auto-container">
            <div class="sec-title">
                <h2>Hubungi kami</h2>
                <p>Kami dengan senang menerima keluhan anda</p>
                <span class="separator" style="background-image: url(assets/images/icons/separator-1.png);"></span>
            </div>
            <div class="col-lg-10 col-md-12 col-sm-12 offset-lg-1 big-column">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12 address-column">
                        <div class="single-adderss-block">
                            <div class="inner-box">
                                <h3>Kontak kami</h3>
                                <ul class="info-list clearfix">
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>
                                        Porong, Sidoarjo, Jawa Timur, Indonesia.
                                    </li>
                                    <li>
                                        <i class="fas fa-phone"></i>
                                        <a href="tel:48564334212234">089519251250</a>
                                    </li>
                                    <li>
                                        <i class="fas fa-envelope"></i>
                                        <a href="soovastudio@gmail.com">soovastudio@gmail.com</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="form-inner col-lg-8 col-md-12 col-sm-12">
                        <form method="post" action="sendemail.php" id="contact-form" class="default-form">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                    <input type="text" name="username" placeholder="Name" required>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                    <input type="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                    <input type="text" name="subject" placeholder="Subject" required>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                    <input type="text" name="phone" placeholder="Phone" required>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                    <textarea name="message" placeholder="Message"></textarea>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn centred">
                                    <button type="submit" class="theme-btn-two" name="submit-form">Submit Message<i
                                            class="flaticon-right-1"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-section end -->
@endsection
