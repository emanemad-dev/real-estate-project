@extends('layouts.app')

@section('title', $estate->name)

@section('content')
<div class="container py-5 mt-5 pt-5" dir="ltr" style="text-align: left;">
    <div class="row">
        <div class="col-md-8">
            @if(!empty($estate->images))
            <div id="estateCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($estate->images as $key => $image)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img src="{{ Str::startsWith($image, 'http') ? $image : asset('storage/'.$image) }}"
                            class="d-block w-100 rounded-4" style="height: 500px; object-fit: cover;">
                    </div>
                    @endforeach
                </div>
                @if(count($estate->images) > 1)
                <button class="carousel-control-prev" type="button" data-bs-target="#estateCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark rounded-circle p-2"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#estateCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-dark rounded-circle p-2"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                @endif
            </div>
            @endif
        </div>

        <div class="col-md-4">
            <button class="btn btn-outline-secondary mb-3 d-flex align-items-center" onclick="history.back()">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-arrow-left me-2" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M15 8a.5.5 0 0 1-.5.5H2.707l4.147 4.146a.5.5 0 0 1-.708.708l-5-5a.5.5 0 0 1 0-.708l5-5a.5.5 0 0 1 .708.708L2.707 7.5H14.5A.5.5 0 0 1 15 8z" />
                </svg>
                Back
            </button>

            <h2>{{ $estate->name }}</h2>
            <p class="text-muted">{{ $estate->address }}</p>
            <p><strong>Price:</strong> {{ number_format($estate->price,2) }}</p>
            <p><strong>Type:</strong> {{ $estate->operation_type == 'rent' ? 'Rent' : 'Ownership' }}</p>
            <p><strong>Area:</strong> {{ $estate->area }} m²</p>
            <p><strong>Rooms:</strong> {{ $estate->rooms }}</p>
            <p><strong>Bathrooms:</strong> {{ $estate->bathrooms }}</p>
            <p><strong>Description:</strong> {{ $estate->description ?? 'No description available.' }}</p>
            <a href="#contact" class="btn btn-primary-custom mt-3">Contact Agent</a>
        </div>
    </div>
</div>
@endsection
