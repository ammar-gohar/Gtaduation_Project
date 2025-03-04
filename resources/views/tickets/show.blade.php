@extends('layouts.app')
@section('title')
    you show ({{$ticket->type}})
@endsection

@section('page-title-1', 'Tickets')
@section('page-title-2')
    {{ $ticket->type }}
@endsection

@section('content')

       <!-- Page Title -->
       <div class="page-title" data-aos="fade" style="background-image: url({{ asset('assets/img/hotels-2.jpg') }}); ">
        <div class="container position-relative">
            {{-- <a href="{{ route('venues-user.index') }}" > --}}
                  <h1> Show Ticket</h1>
            {{-- </a> --}}
        </div>
    </div>

    <!-- End Page Title -->

    {{--              Search    Bar --}}

    <br>
    <br>


    <table class="table datatable">
        <thead>
        <tr>
            <th>ID</th>
            <th>type</th>
            <th>price</th>
            <th>quantity</th>
            <th>available</th>
            <th>Event Name</th>
            <th>Event ID</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $ticket->id }}</td>
                <td>{{ $ticket->type }}</td>
                <td>{{ $ticket->price}}</td>
                <td>{{ $ticket->quantity}}</td>
                <td>{{ $ticket->available}}</td>
                <td>{{ $ticket->event->name}}</td>
                <td>{{ $ticket->event->id}}</td>
            </tr>
        </tbody>
    </table>
    <br>
    <br>    <br>
    <br>
@endsection


@section('style-card')
    <style>
        .card {
            height: 500px;
        }

        .card img {
            height: 400px;
            object-fit: cover;
        }

        .card {

            width: 100%;
        }
    </style>
@endsection

