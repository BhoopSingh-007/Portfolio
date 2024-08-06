@extends('front-layout.app')
@section('content')
    @php
        $contact = App\Models\Resume::first();
    @endphp
    <style>
        #sendMail {
            margin-bottom: 20px;
            /* Adjust this value as needed */
        }

        .alert {
            display: none;
            /* Hide by default */
        }
    </style>

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
            <p>We'd Love to Hear From You!" and "Feel free to reach out to us</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-5">

                    <div class="info-wrap">
                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                            <div>
                                <h3>Address</h3>
                                <p>{{ $contact->address }}</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-telephone flex-shrink-0"></i>
                            <div>
                                <h3>Call Us</h3>
                                <p>{{ $contact->phone }}</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-envelope flex-shrink-0"></i>
                            <div>
                                <h3>Email Us</h3>
                                <p>{{ $contact->email }}</p>
                            </div>
                        </div><!-- End Info Item -->



                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1090738.4327408664!2d73.89645638006033!3d29.258552724029215!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391420989fe47e77%3A0x4a73a636329637bd!2sSardarpura%20Khalsa%2C%20Rajasthan%20335524!5e0!3m2!1sen!2sin!4v1722749151370!5m2!1sen!2sin"
                            frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

                <div class="col-lg-7">

                    <form action="{{ route('contact.send') }}" method="post" id="contactForm" class="php-email-form"
                        data-aos="fade-up" data-aos-delay="200">
                        @csrf
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <label for="name-field" class="pb-2">Your Name</label>
                                <input type="text" name="name" id="name-field" class="form-control" required="">
                            </div>

                            <div class="col-md-6">
                                <label for="email-field" class="pb-2">Your Email</label>
                                <input type="email" class="form-control" name="email" id="email-field" required="">
                            </div>

                            <div class="col-md-12">
                                <label for="subject-field" class="pb-2">Subject</label>
                                <input type="text" class="form-control" name="subject" id="subject-field" required="">
                            </div>

                            <div class="col-md-12">
                                <label for="message-field" class="pb-2">Message</label>
                                <textarea class="form-control" name="message" rows="7" id="message-field" required=""></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>

                                <button type="submit" id="sendMail">Send Message</button>
                                <!-- Display success message if exists -->
                                @if (session('success'))
                                    <div class="alert alert-success" id="successMessage">
                                        {{ session('success') }}
                                    </div>
                                @endif

                            </div>

                        </div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>

    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            var $successMessage = $('#successMessage');

            if ($successMessage.length) {
                $successMessage.show(); // Show the success message

                setTimeout(function() {
                    $successMessage.fadeOut(); // Fade out the success message after 3 seconds
                }, 3000); // 3000 milliseconds = 3 seconds
            }
        });
    </script>
@endsection
