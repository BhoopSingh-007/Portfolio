@extends('front-layout.app')
@section('content')
    @inject('service', 'App\Models\Service')
    @php
        $services = $service::all();
    @endphp

    <!-- Services Section -->
    <section id="services" class="services section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Services</h2>
            <p>Discover how we can help you with our expert services. Our team is dedicated to delivering exceptional results tailored to your needs.</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
                        <div class="service-item item-{{ $service->color }} position-relative">
                            <div class="icon">
                                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke="none" stroke-width="0" fill="#f5f5f5"
                                        d="M300,{{ $service->svg_d }}">
                                    </path>
                                </svg>
                                <i class="bi {{ $service->icon }}"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h3>{{ $service->title }}</h3>
                            </a>
                            <p>{{ $service->description }}</p>
                        </div>
                    </div><!-- End Service Item -->
                @endforeach
            </div>


        </div>

    </section>
    <!-- /Services Section -->
@endsection
