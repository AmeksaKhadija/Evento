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
                        <h5 class="mb-4">Dashboard de l'Admin</h5>
                    </li>
                    <li><a href="/dashAdmin" class="text-light d-block mb-4">Evenements</a></li>
                    <li><a href="/categorie" class="text-light d-block mb-4">Categories</a></li>
                    <li><a href="statistic" class="text-light d-block mb-6">Statistiques</a></li>
                    <li><a href="" class="text-light d-block mb-8">Utilisateurs</a></li>
                </ul>
            </aside>

            <!-- Content -->
            <div class="col-md-10">
                <div class="content p-4">
                    <div class="col-md-10">
                        <h1 id="st">STATISTICS</h1>
                        <div class="card-container">
                            <div class="card user-card">
                                <div class="card-title">Users</div>
                                <div class="card-content">
                                    <div>Total Users</div>
                                    <div class="card-number">{{ $userNumber }}</div>
                                </div>
                            </div>
                            <div class="card event-card">
                                <div class="card-title">Events</div>
                                <div class="card-content">
                                    <div>Total Events</div>
                                    <div class="card-number">{{ $eventNumber }}</div>
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
