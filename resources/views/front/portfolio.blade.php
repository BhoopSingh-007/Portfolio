@extends('front-layout.app')

@section('content')
    @php
        $portfolios = App\Models\Portfolio::all();
    @endphp

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Portfolio</h2>
            <p>Explore our diverse portfolio showcasing a range of projects that highlight our expertise and creativity. From innovative designs to impactful solutions, each project reflects our commitment to excellence. Browse through our work to see how we turn ideas into reality and how we can help bring your vision to life.</p>

        </div><!-- End Section Title -->

        <div class="container">

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">App</li>
                    <li data-filter=".filter-product">Product</li>
                    <li data-filter=".filter-branding">Branding</li>
                </ul><!-- End Portfolio Filters -->

                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($portfolios as $portfolio)
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ $portfolio->f_category }}">
                            @if ($portfolio->images)
                                @php
                                    $images = json_decode($portfolio->images);
                                    $mainImage = asset('storage/' . $images[0]); // Assuming the first image is the main one
                                @endphp
                                <img src="{{ $mainImage }}" class="img-fluid" alt="{{ $portfolio->title }}">
                            @else
                                <img src="{{ asset('images/default-placeholder.png') }}" class="img-fluid"
                                    alt="Default Image">
                            @endif
                            <div class="portfolio-info">
                                <h4>{{ $portfolio->title }}</h4>
                                <p>{{ $portfolio->description }}</p>
                                <a href="{{ $mainImage }}" title="{{ $portfolio->title }}"
                                    data-gallery="portfolio-gallery-{{ $portfolio->category }}"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="{{ route('portfolio.details', $portfolio->id) }}" title="More Details"
                                    class="details-link"><i class="bi bi-link-45deg"></i></a>
                            </div>
                        </div><!-- End Portfolio Item -->
                    @endforeach
                </div><!-- End Portfolio Container -->

            </div>

        </div>

    </section>
    <!-- /Portfolio Section -->
@endsection
