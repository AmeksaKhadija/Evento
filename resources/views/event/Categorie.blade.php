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
                </ul>
            </aside>

            <!-- Content -->
            <div class="col-md-10">
                <div class="content p-4">
                    <button type="button" class="btn btn-secondary mb-3" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Ajouter Categorie</button>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nom du categorie</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Categories as $Categorie)
                                <tr>
                                    <td>{{ $Categorie->name }}</td>
                                    <td>
                                        <a href="{{ route('categorie.edit', $Categorie) }}"
                                            class="btn btn-primary">Modifier</a>
                                        <form action="{{ route('categorie.destroy', $Categorie->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"
                                                style="color: #ff0202">Supprimer</button>
                                        </form>
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
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter Categorie</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('categorie.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="categorie" class="form-label">Catégorie de l'événement</label>
                                <input type="text" class="form-control" id="categorie" name="categorie"
                                    placeholder="Catégorie de l'événement">
                            </div>
                            <button type="submit" class="btn btn-primary">Poster</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@endsection
