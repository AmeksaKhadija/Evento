@extends('layouts.nav')
@section('content')
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

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Date</th>
                                <th>Nombre de places</th>
                                <th>Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                                <tr>
                                    <td>{{ $event->title }}</td>
                                    <td>{{ $event->description }}</td>
                                    <td>{{ $event->date }}</td>
                                    <td>{{ $event->nb_place }}</td>
                                    <td>{{ $event->categorie->name }}</td>
                                    <td>
                                        @if ($event->status === 'accepted')
                                            <a href="/accepted/{{ $event->id }}" class="btn btn-success">Accepter</a>
                                        @else
                                            <a href="/accepted/{{ $event->id }}" class="btn btn-danger">Accepter</a>
                                        @endif
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
