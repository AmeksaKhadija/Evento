@extends('layouts.nav')
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <div class="container-fluid mt-8">
        <div class="row">
            <!-- Aside -->
            <aside class="col-md-2 bg-dark text-light p-4">
                <ul class="list-unstyled">
                    <li>
                        <h5 class="mb-4">Dashboard d'Organisateur</h5>
                    </li>
                    <li><a href="/home" class="text-light d-block mb-4">Add event</a></li>
                    <li><a href="statisticOrg" class="text-light d-block mb-6">Statistiques</a></li>
                    <li><a href="/validateTicket" class="text-light d-block mb-8">validation de Ticket</a></li>
                </ul>
            </aside>

            {{-- content --}}
            <div class="col-md-10">
                <div class="content p-4">
                    <div class="col-md-10">
                        <h1 id="st">STATISTICS</h1>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card user-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Users</h5>
                                        <div class="card-text">Total Events</div>
                                        <div class="card-number">{{ $myEvents }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card event-card">
                                    <div class="card-body">
                                        <h5 class="card-title">Events</h5>
                                        <div class="card-text">Total Events rejected</div>
                                        <div class="card-number">{{ $eventRejected }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@endsection
