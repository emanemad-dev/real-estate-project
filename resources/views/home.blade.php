@extends('layouts.app')

@section('title', 'Home')

@section('nav')

    <nav class="navbar navbar-expand-lg fixed-top navbar-dark" style="background: linear-gradient(90deg, #ff7e5f, #feb47b);">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Estate</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-3">
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="#estates">Estates</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="#blogs">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endsection

@section('content')

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f0f2f5;
            color: #1f1f1f;
            direction: ltr;
            text-align: left;
        }

        .hero {
            background: url('{{ asset('storage/' . $settings->header_image ?? '') }}') center/cover no-repeat;
            padding: 140px 0;
            position: relative;
            color: #fff;
            text-align: left;
            border-radius: 0 0 50px 50px;
            margin-top: 80px;
        }

        .hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.4);
            border-radius: 0 0 50px 50px;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero h1 {
            font-size: 58px;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 20px;
            max-width: 500px;
            opacity: 0.9;
            margin-bottom: 30px;
        }

        .btn-primary-custom {
            background: linear-gradient(90deg, #ff7e5f, #feb47b);
            color: #fff !important;
            padding: 12px 35px;
            border-radius: 30px;
            font-weight: 600;
            border: none;
            transition: 0.3s;
        }

        .btn-primary-custom:hover {
            /* transform: translateY(-4px); */
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .section-title {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 40px;
            position: relative;
        }

        .section-title::after {
            content: "";
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, #ff7e5f, #feb47b);
            display: block;
            margin-top: 8px;
            border-radius: 5px;
        }

        .card-custom {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            transition: 0.3s;
            background: #fff;
        }

        /* .card-custom:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        } */

        .card-custom img {
            width: 100%;
            height: 240px;
            object-fit: cover;
        }

        .card-custom .card-body {
            padding: 20px;
        }

        .contact-section {
            background: #fff;
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            border-radius: 12px;
            border: 1px solid #ddd;
            padding: 12px;
        }

        .form-control:focus {
            border-color: #ff7e5f;
            box-shadow: 0 0 10px rgba(255, 126, 95, 0.2);
        }
    </style>

    <section class="hero"
        style="background: url('{{ $settings->header_image }}') center/cover no-repeat; height: 600px; display: flex; align-items: center; justify-content: center; position: relative;">
        <div class="hero-content text-center" style="position: relative; z-index: 1;">
            <h1 style="font-size: 58px; font-weight: 800; color: #fff;">
                {{ $settings->header_title ??
                    'Premium Estates for
                            You' }}</h1>
            <p style="font-size: 20px; color: #fff; max-width: 500px; margin: 20px auto;">
                {{ $settings->header_description ??
                    'Luxury properties, exceptional service, and trusted real estate
                            experts.' }}
            </p>
            <a href="#estates" class="btn btn-primary-custom">Browse Estates</a>
        </div>
        <div style="position: absolute; inset: 0;"></div>
    </section>

    <section class="py-5" id="estates">
        <div class="container">
            <h2 class="section-title">Featured Estates</h2>
            <div class="row g-4" id="estates-container">
                @foreach ($estates->take(6) as $estate)
                    <div class="col-md-4 estate-item">
                        <a href="{{ route('estates.show', $estate->id) }}" class="text-decoration-none">
                            <div class="card-custom">
                                @if (!empty($estate->images))
                                    <img src="{{ $estate->images[0] }}" alt="{{ $estate->name }}">
                                @endif
                                <div class="card-body">
                                    <h5 class="text-dark">{{ $estate->name }}</h5>
                                    <p class="text-muted">{{ $estate->address }}</p>
                                    <p><strong>Price:</strong> {{ number_format($estate->price, 2) }}</p>
                                    <p><strong>Type:</strong>
                                        {{ $estate->operation_type == 'rent' ? 'Rent' : 'Ownership' }}</p>
                                    <p><strong>Area:</strong> {{ $estate->area }} m²</p>
                                    <p><strong>Rooms:</strong>{{ $estate->rooms }}</p>
                                    <p><strong>BathRooms:</strong> {{ $estate->bathrooms }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            @if ($estates->count() > 6)
                <div class="text-center mt-4">
                    <button id="loadMore" class="btn btn-primary-custom">Load More Estates</button>
                </div>
            @endif
        </div>
    </section>

    <section id="about" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title mb-5 ">About Us</h2>
            <p class="text-muted mb-5">
            <p class="mb-5 text-muted fw-bold">
                {{ $settings->about_description ?? 'We offer premium real estate services tailored to your needs.' }}
            </p>
            </p>

            <div class="row g-3">
                @php
                    $about_images = [$settings->about_image_1 ?? null, $settings->about_image_2 ?? null];
                @endphp

                @foreach ($about_images as $image)
                    @if ($image)
                        <div class="col-md-6">
                            <img class="img-fluid rounded"
                                src="{{ Str::startsWith($image, 'http') ? $image : asset('storage/' . $image) }}"
                                alt="About Image" style="width:200%; height:350px; object-fit:cover;">
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <section id="services" class="py-5">
        <div class="container">
            <h2 class="section-title">Our Services</h2>
            <div class="row g-4" id="services-container">
                @foreach ($services->take(6) as $service)
                    <div class="col-md-4 service-item">
                        <div class="card-custom">
                            @if ($service->image)
                                <img
                                    src="{{ Str::startsWith($service->image, 'http') ? $service->image : asset('storage/' . $service->image) }}">
                            @endif
                            <div class="card-body">
                                <h5>{{ $service->name }}</h5>
                                <p class="text-muted">{{ Str::limit($service->description, 120) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @if ($services->count() > 6)
                <div class="text-center mt-4">
                    <button id="loadMoreServices" class="btn btn-primary-custom">Load More Services</button>
                </div>
            @endif
        </div>
    </section>

    <section id="blogs" class="py-5" style="background:#f9fafc;">
        <div class="container">
            <h2 class="section-title">Latest News</h2>
            <div class="row g-4" id="blogs-container">
                @foreach ($blogs->take(6) as $blog)
                    <div class="col-md-4 blog-item">
                        <div class="card-custom">
                            @if ($blog->image)
                                <img src="{{ $blog->image }}" alt="{{ $blog->title }}">
                            @endif
                            <div class="card-body">
                                <h5>{{ $blog->title }}</h5>
                                <p class="text-muted">{{ $blog->content }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @if ($blogs->count() > 3)
                <div class="text-center mt-4">
                    <button id="loadMoreBlogs" class="btn btn-primary-custom">Load More News</button>
                </div>
            @endif
        </div>
    </section>

    <section id="contact" class="py-5">
        <div class="container">
            <h2 class="section-title">Contact Us</h2>
            <div class="contact-section mb-5">
                <p><strong>Address:</strong> {{ $settings->contact_address ?? '-' }}</p>
                <p><strong>Email:</strong> {{ $settings->contact_email ?? '-' }}</p>
                <p><strong>Phone:</strong> {{ $settings->contact_phone ?? '-' }}</p>
            </div>
            <div class="contact-section">
                <form method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-4">
                            <input class="form-control" name="name" placeholder="Name">
                        </div>
                        <div class="col-md-4">
                            <input class="form-control" name="email" type="email" placeholder="Email">
                        </div>
                        <div class="col-md-4">
                            <input class="form-control" name="subject" placeholder="Subject">
                        </div>
                        <div class="col-12">
                            <textarea class="form-control" rows="5" name="message" placeholder="Message"></textarea>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary-custom w-100">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const loadMoreBtn = document.getElementById('loadMore');
        const estatesContainer = document.getElementById('estates-container');
        const estates = @json($estates);
        let displayed = 6;
        if (loadMoreBtn) {
            loadMoreBtn.addEventListener('click', function() {
                const nextEstates = estates.slice(displayed, displayed + 3);
                nextEstates.forEach(function(estate) {
                    const estateHtml = `
                    <div class="col-md-4 estate-item">
                        <div class="card-custom">
                            ${estate.images && estate.images.length ? `<img src="${estate.images[0]}" alt="${estate.name}">` : ''}
                            <div class="card-body">
                                <h5>${estate.name}</h5>
                                <p class="text-muted">${estate.address}</p>
                                <p><strong>Price:</strong> ${Number(estate.price).toLocaleString()}</p>
                                <p><strong>Type:</strong> ${estate.operation_type === 'rent' ? 'Rent' : 'Ownership'}</p>
                                <p><strong>Area:</strong> ${estate.area} m²</p>
                                <p><strong>Rooms:</strong> ${estate.rooms}</p>
                                <p><strong>BathRooms:</strong> ${estate.bathrooms}</p>
                            </div>
                        </div>
                    </div>
                `;
                    estatesContainer.insertAdjacentHTML('beforeend', estateHtml);
                });
                displayed += nextEstates.length;
                if (displayed >= estates.length) loadMoreBtn.style.display = 'none';
            });
        }

        const loadMoreServicesBtn = document.getElementById('loadMoreServices');
        const servicesContainer = document.getElementById('services-container');
        const services = @json($services);
        let displayedServices = 6;

        if (loadMoreServicesBtn) {
            loadMoreServicesBtn.addEventListener('click', function() {
                const nextServices = services.slice(displayedServices, displayedServices + 3);
                nextServices.forEach(function(s) {
                    const html = `
    <div class="col-md-4 service-item">
        <div class="card-custom">
            ${s.image ? `<img src="${s.image.startsWith('http') ? s.image : '/storage/' + s.image}">` : ''}
            <div class="card-body">
                <h5>${s.name}</h5>
                <p class="text-muted">${s.description.substring(0,120)}</p>
            </div>
        </div>
    </div>
    `;
                    servicesContainer.insertAdjacentHTML('beforeend', html);
                });
                displayedServices += nextServices.length;
                if (displayedServices >= services.length) loadMoreServicesBtn.style.display = 'none';
            });
        }

        const loadMoreBlogsBtn = document.getElementById('loadMoreBlogs');
        const blogsContainer = document.getElementById('blogs-container');
        const blogs = @json($blogs);
        let displayedBlogs = 6;
        if (loadMoreBlogsBtn) {
            loadMoreBlogsBtn.addEventListener('click', function() {
                const nextBlogs = blogs.slice(displayedBlogs, displayedBlogs + 3);
                nextBlogs.forEach(function(b) {
                    const html = `
                    <div class="col-md-4 blog-item">
                        <div class="card-custom">
                            ${b.image ? `<img src="${b.image}" alt="${b.title}">` : ''}
                            <div class="card-body">
                                <h5>${b.title}</h5>
                                <p class="text-muted">${b.excerpt.substring(0,120)}</p>
                            </div>
                        </div>
                    </div>
                `;
                    blogsContainer.insertAdjacentHTML('beforeend', html);
                });
                displayedBlogs += nextBlogs.length;
                if (displayedBlogs >= blogs.length) loadMoreBlogsBtn.style.display = 'none';
            });
        }
    });
</script>
