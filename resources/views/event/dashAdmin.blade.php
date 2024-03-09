@extends('layouts.nav')
@section('content')
    <div class="container-fluid mt-8">
        <div class="row">
            <!-- Aside -->
            <aside class="col-md-2 bg-dark text-light p-4">
                <ul class="list-unstyled">
                    <li>
                        <h5 class="mb-4">Dashboard</h5>
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
                                    {{-- <td>
                                        <a href="/accepted/{{ $event->id }}" class="btn btn-primary">Accepter</a>
                                    </td> --}}
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un événement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('home.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Nom de l'événement</label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="Nom de l'événement">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description de l'événement</label>
                            <textarea class="form-control" id="description" name="description" rows="3"
                                placeholder="Description de l'événement"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Date de l'événement</label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                        <div class="mb-3">
                            <label for="nb_place" class="form-label">Nombre de places</label>
                            <input type="number" class="form-control" id="nb_place" name="nb_place"
                                placeholder="Nombre de places">
                        </div>
                        <div class="mb-3">
                            <label for="categorie" class="form-label">Catégorie de l'événement</label>
                            <input type="text" class="form-control" id="categorie" name="categorie"
                                placeholder="Catégorie de l'événement">
                        </div>
                        <div class="mb-3">
                            <label for="image_path" class="form-label">Image de l'événement</label>
                            <input type="file" class="form-control" id="image_path" name="image_path">
                        </div>
                        <button type="submit" class="btn btn-primary">Poster</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
