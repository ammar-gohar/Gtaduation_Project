@extends('layouts.app')

@section('title')
    Venue {{ $venue->name }}
@endsection

@section('add_css')
    <link rel="stylesheet" href="/assets/vendor/css/fontawesome.css">
    <link rel="stylesheet" href="/assets/vendor/css/templatemo-liberty-market.css">
    <link rel="stylesheet" href="/assets/vendor/css/owl.css">
    <link rel="stylesheet" href="/assets/vendor/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
@endsection

@section('content')
    <!-- Page Title -->
    <div class="page-title" data-aos="fade" style="background-image: url({{ asset('assets/img/hotels-2.jpg') }}); ">
        <div class="container position-relative">
            <h1>Venues</h1>
        </div>
    </div>
    <!-- End Page Title -->
    <section id="schedule" class="schedule section">

        <div class="item-details-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-heading">
                            <div class="line-dec">
                            <h2 style="margin-left: 160px">View Details of <em>{{ $venue->name }}</em> venue Here.</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
        
        <div class="d-flex align-items-start" style="gap: 20px; margin-left: 170px">
    
            <img src="{{ asset('storage/' . $venue->venue_image) }}" 
                 width="400px" height="300px" 
                 alt="Venue Image" style="object-fit: cover; border-radius: 10px;">
            <br>
        
            <div style="margin: 50px 0px 0px 50px; color: #0e1b4d;">
                <p><strong>Name:</strong> {{$venue->name}}</p>
                <p><strong>Phone:</strong> {{$venue->phone}}</p>
                <p><strong>City:</strong> {{$venue->city}}</p>
                <p><strong>Address:</strong> {{$venue->address}}</p>
                <p><strong>Capacity:</strong> {{$venue->capacity}}</p>
            </div>
        </div>

        
    </section>
@endsection


