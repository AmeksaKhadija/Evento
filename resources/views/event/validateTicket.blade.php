@extends('layouts.nav')
@section('content')
    <div class="container-fluid mt-8">
        <div class="row">
            <!-- Aside -->
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
            <!-- Content -->
            <div class="col-md-10">
                <div class="content p-4">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>username</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reservations as $reservation)    
                                <tr>
                                    <td>{{ $reservation->event_title }}</td>
                                    <td>{{ $reservation->user_name }}</td>

                                    <td>
                                            <a href="/approved/{{ $reservation->id }}" class="btn btn-success">Approved</a>
                                            <a href="/rejected/{{ $reservation->id }}" class="btn btn-danger">Rejected</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
