@extends('front-layout.app')
@section('content')
    @inject('about', 'App\Models\About')
    @inject('skill', 'App\Models\Skill')
    @inject('stat', 'App\Models\Stat')
    @inject('testimonial', 'App\Models\Testimonial')
    @php
        $abouts = $about::all();
        // dd($abouts);
        $skills = $skill::all();
        $stats = $stat::all();
        $testimonials = $testimonial::all();
    @endphp
    <!-- About Section -->
    <section id="about" class="about section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>About</h2>
            <p>Welcome to our website. Here, we share information about our mission, values, and team. Learn more about what drives us and how we strive to make a difference.</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4 justify-content-center">
                @foreach ($abouts as $about)
                    <div class="col-lg-4">
                        <img src="{{ asset('storage/' . $about->profile_image) }}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-8 content">
                        <h2>{{ $about->title }}</h2>
                        <p class="fst-italic py-3">{{ $about->experince }}</p>
                        <div class="row">
                            <div class="col-lg-6">
                                <ul>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong>
                                        <span>{{ $about->birthday }}</span>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong>
                                        <a href="{{ $about->website }}">{{ $about->website }}</a>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong>
                                        <span>+91{{ $about->phone }}</span>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>City:</strong>
                                        <span>{{ $about->city }}</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong>
                                        <span>{{ $about->age }}</span>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong>
                                        <span>{{ $about->degree }}</span>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong>
                                        <span>{{ $about->email }}</span>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong>
                                        <span>{{ $about->freelance ? 'Available' : 'Not Available' }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <p class="py-3">{{ $about->description }}</p>
                    </div>
                @endforeach
            </div>

        </div>

    </section>
    <!-- /About Section -->

    <!-- Skills Section -->
    <section id="skills" class="skills section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Skills</h2>
            {{-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> --}}
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row skills-content skills-animation">
                @foreach ($skills as $skill)
                    <div class="col-lg-6">
                        <div class="progress">
                            <span class="skill"><span>{{ $skill->name }}</span> <i
                                    class="val">{{ $skill->percentage }}%</i></span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill->percentage }}"
                                    aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
    <!-- /Skills Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Facts</h2>
            {{-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> --}}
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                @foreach ($stats as $stat)
                    <div class="col-lg-3 col-md-6">
                        <div class="stats-item text-center w-100 h-100">
                            <span data-purecounter-start="0" data-purecounter-end="{{ $stat->count }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>{{ $stat->title }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    </section>
    <!-- /Stats Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Testimonials</h2>
            {{-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> --}}
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="swiper init-swiper">
                <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
                <div class="swiper-wrapper">
                    @foreach ($testimonials as $testimonial)
                        <div class="swiper-slide">
                            <div class="testimonial-item">
                                <img src="{{ Storage::url('public/testimonials/' . $testimonial->image) }}"
                                    class="testimonial-img" alt="">
                                <h3>{{ $testimonial->name }}</h3>
                                <h4>{{ $testimonial->position }}</h4>
                                <div class="stars">
                                    <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                        class="bi bi-star-fill"></i>
                                </div>
                                <p>
                                    <i class="bi bi-quote quote-icon-left"></i>
                                    <span>{{ $testimonial->testimonial }}</span>
                                    <i class="bi bi-quote quote-icon-right"></i>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>

    </section>
    <!-- /Testimonials Section -->
@endsection
