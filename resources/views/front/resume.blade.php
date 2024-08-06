@extends('front-layout.app')
@section('content')
    @inject('resume', 'App\Models\Resume')
    @php
        $resumes = $resume::all();
    @endphp

    <!-- Resume Section -->
    <section id="resume" class="resume section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Resume</h2>
            <p>Experienced in delivering effective solutions with a focus on quality and precision. Skilled in adapting to diverse challenges and providing tailored results to meet specific needs.</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row">
                @foreach ($resumes as $resume)
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <h3 class="resume-title">Sumary</h3>

                        <div class="resume-item pb-0">
                            <h4>{{ $resume->name }}</h4>
                            <p><em>{!! $resume->summary !!}</em></p>
                            <ul>
                                <li>{{ $resume->address }}</li>
                                <li>{{ $resume->phone }}</li>
                                <li>{{ $resume->email }}</li>
                            </ul>
                        </div><!-- Edn Resume Item -->

                        <h3 class="resume-title">Education</h3>
                        <div class="resume-item">
                            <h4>{{ $resume->education_title }}</h4>
                            <h5>{{ $resume->education_duration }}</h5>
                            <p><em>{{ $resume->education_institution }}</em></p>
                            <p>{!! $resume->experience_description !!}</p>
                        </div><!-- Edn Resume Item -->                      

                    </div>

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <h3 class="resume-title">Professional Experience</h3>
                        <div class="resume-item">
                            <h4>{{ $resume->experience_title }}</h4>
                            <h5>{{ $resume->experience_duration }}</h5>
                            <p><em>{{ $resume->experience_company }}</em></p>
                            <ul>
                                <li>{!! $resume->experience_description !!}</li>                               
                            </ul>
                        </div>

                        <div class="resume-item">
                            <h4>Graphic design specialist</h4>
                            <h5>2017 - 2018</h5>
                            <p><em>Stepping Stone Advertising, New York, NY</em></p>
                            <ul>
                                <li>Developed numerous marketing programs (logos, brochures,infographics, presentations, and
                                    advertisements).</li>
                                <li>Managed up to 5 projects or tasks at a given time while under pressure</li>
                                <li>Recommended and consulted with clients on the most appropriate graphic design</li>
                                <li>Created 4+ design presentations and proposals a month for clients and account managers
                                </li>
                            </ul>
                        </div><!-- Edn Resume Item -->

                    </div>
                @endforeach
            </div>

        </div>

    </section>
    <!-- /Resume Section -->
@endsection
