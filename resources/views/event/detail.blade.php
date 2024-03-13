@extends('layouts.nav')

@section('content')
    <style>
        .event-details {
            margin-top: 50px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            flex-wrap: wrap;
        }

        #imgd {
            max-width: 100%;
            height: 30em;
            margin-bottom: 20px;
        }

        .back {
            margin-top: 20px;
        }

        .event-info {
            flex: 1;
            margin-right: 20px;
        }

        .ticket-card {
            flex: 1;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-top: 20px;
        }

        .ticket {
            font-family: sans-serif;
            background-repeat: no-repeat;
            background-position: top;
            background-size: 100%;
            background-color: #04030C;
            width: 700px;
            height: 300px;
            border-radius: 15px;
            -webkit-filter: drop-shadow(1px 1px 3px rgba(0, 0, 0, 0.3));
            filter: drop-shadow(1px 1px 3px rgba(0, 0, 0, 0.3));
            display: block;
            margin: 10% auto auto auto;
            color: #fff;
        }

        .date {
            margin: 15px;
            -webkit-filter: drop-shadow(1px 1px 3px rgba(0, 0, 0, 0.3));
            filter: drop-shadow(1px 1px 3px rgba(0, 0, 0, 0.3));
        }

        .date .day {
            font-size: 80px;
            float: left;
        }

        .date .month-and-time {
            float: left;
            margin: 15px 0 0 0;
            font-weight: bold;
        }

        .artist {
            font-size: 30px;
            margin: 10px 100px 0 40px;
            float: left;
            font-weight: bold;
            -webkit-filter: drop-shadow(1px 1px 3px rgba(0, 0, 0, 0.3));
            filter: drop-shadow(1px 1px 3px rgba(0, 0, 0, 0.3));
        }

        .location {

            margin: 135px 0 0 78px;
            font-size: 30px;
            font-weight: bold;
            -webkit-filter: drop-shadow(1px 1px 3px rgba(0, 0, 0, 0.3));
            filter: drop-shadow(1px 1px 3px rgba(0, 0, 0, 0.3));
            left: 15px;
            top: 135px;
        }

        /* .location::before {
                /* background-image: url('https://upload.wikimedia.org/wikipedia/commons/c/cb/QRCodeWikipedia.png');
                background-size: 110px 110px; */
        width: 110px;
        height: 110px;
        content: "";
        display: inline-block;
        float: left;
        position: absolute;
        left: -10px;
        bottom: 2px;
        -webkit-filter: drop-shadow(1px 1px 3px rgba(0, 0, 0, 0.3));
        filter: drop-shadow(1px 1px 3px rgba(0, 0, 0, 0.3));
        }

        */ .rip {
            border-right: 8px dotted #d226aa;
            height: 300px;
            position: absolute;
            top: 0;
            left: 530px;
        }

        .cta .buy {
            position: absolute;
            top: 135px;
            right: 15px;
            display: block;
            font-size: 12px;
            font-weight: bold;
            background-color: #79113b;
            padding: 10px 20px;
            border-radius: 25px;
            color: #fff;
            text-decoration: none;
            -webkit-transform: rotate(-90deg);
            -ms-transform: rotate(-90deg);
            transform: rotate(-90deg);
            -webkit-filter: drop-shadow(1px 1px 3px rgba(0, 0, 0, 0.3));
            filter: drop-shadow(1px 1px 3px rgba(0, 0, 0, 0.3));
        }

        .small {
            font-weight: 200;
        }

        .ticket-1 {
background-image: url(https://images.unsplash.com/photo-1532564643043-0436a047f3c7?ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80);
        }

        /* .ticket-2{
                background-image: url(https://images.unsplash.com/photo-1550184658-ff6132a71714?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=2180&q=80);
            } */
    </style>

    <div class="event-details container">
        <div class="event-info">
            <img id="imgd" src="{{ asset('storage/' . $events->image_path) }}" alt="Event Image">
            <h1> {{ $events->title }}</h1>
            <h5>Date: {{ $events->date }} </h5>
            <h5>Description: {{ $events->description }} </h5>
            <h6>Places : {{ $events->nb_place }} </h6>
            <p>Description: {{ $events->description }} </p>
            <a href="/" class="btn btn-success back">Back to Events</a>
            <a href="/generateticket/{{$events->id}}" class="btn btn-success back">GRAB A TICKET</a>
        </div>

        {{-- <div class="ticket ticket-1">
            <!-- Event Date -->
            <div class="date">
                <span class="day">{{ \Carbon\Carbon::parse($events->date)->format('d') }}</span>
                <span class="month-and-time">{{ \Carbon\Carbon::parse($events->date)->format('M') }}</br><span
                        class="small">{{ \Carbon\Carbon::parse($events->date)->format('h:iA') }}</span></span>
            </div>

            <!-- Event Title -->
            <div class="artist">
                <span class="name">{{ $events->title }}</span>
                </br>
                <span class="live small">LIVE</span>
            </div>

            <div class="rip">
            </div>

            <!-- Buy Ticket Button -->
            <div class="cta">
                <a href="/generateticket/{{$events->id}}" class="buy">GRAB A TICKET</a>
            </div>
        </div> --}}


    </div>
@endsection
