@extends('layouts.app')

@section('main')
    <!-- contact-section -->
    <section class="contact-section">
        <div class="auto-container">
            <div class="sec-title">
                <h2>Get in Touch</h2>
                <p>We are love to receive your suggestions and feedback</p>
                <span class="separator" style="background-image: url(assets/images/icons/separator-1.png);"></span>
            </div>
            <div class="col-lg-10 col-md-12 col-sm-12 offset-lg-1 big-column">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-6 col-sm-12 address-column">
                        <div class="single-adderss-block">
                            <div class="inner-box">
                                <h3>Our Contacts</h3>
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
                        <form method="post" id="contact-form" class="default-form">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                    <input type="text" name="name" placeholder="Name" required>
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
                                    <button type="submit" class="theme-btn-two send" name="submit-form">Submit Message<i
                                            class="flaticon-right-1"></i></button>
                                    <button type="submit" class="theme-btn-two loading d-none" disabled>
                                        <div class="spinner-border" role="status">
                                            <span class="sr-only">Mengirim...</span>
                                        </div>
                                    </button>
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

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $("#contact-form").on("submit", function(event) {
                event.preventDefault()
                const name = $("input[name='name']").val()
                const email = $("input[name='email']").val()
                const subject = $("input[name='subject']").val()
                const phone = $("input[name='phone']").val()
                const message = $("textarea[name='message']").val()
                const baseUrl = "{{ url('/') }}"

                const formData = new FormData()

                if (name !== null && email !== null && phone !== null && message !== null) {
                    formData.append('name', name);
                    formData.append('email', email)
                    formData.append('subject', subject)
                    formData.append('phone', phone)
                    formData.append('message', message)
                    // console.log(baseUrl)
                    $.ajax({
                        url: `${baseUrl}/api/send-message`,
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                        },
                        method: "POST",
                        processData: false,
                        contentType: false,
                        data: formData,
                        beforeSend: function() {
                            $('#contact-form input').attr('disabled')
                            $("#contact-form button.send").addClass('d-none')
                            $("#contact-form button.loading").removeClass('d-none')
                        },
                        success: function({status, title, message}) {
                            $('#contact-form input').attr('disabled')
                            $("#contact-form button.send").removeClass('d-none')
                            $("#contact-form button.loading").addClass('d-none')
                            // console.log(response)
                            Swal.fire(title, message, status)
                        },
                        // error: function()
                    })
                }
            })
        })
    </script>
@endsection
