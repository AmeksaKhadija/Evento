@extends('layouts.nav')
@section('content')
    <button type="button" class="btn btn-secondary mb-6 mr-6 mt-6" style="color: #000" data-toggle="modal"
        data-target="#exampleModal">Ajouter un événement</button>

    {{-- card --}}
    <div class="container">
        <div class="row">
            @if ($events->isEmpty())
                <div class="col-md-12 text-center">
                    <p>No result found.</p>
                </div>
            @else
                @foreach ($events as $index => $event)
                    @if ($index % 3 == 0)
        </div>
        <div id="eventsList" class="row">
            @endif
            <div class="col-md-4" id="searchArea">
                <div class="card mb-3">
                    <img src="{{ asset('storage/' . $event->image_path) }}" class="card-img-top"
                        alt="l'image de l'événement">
                    <div class="card-body">
                        <h5 class="card-title">Titre de l'événement : {{ $event->title }}</h5>
                        <p class="card-text">Description de l'événement :{{ $event->description }}</p>
                        <p class="card-text">Date de l'événement :{{ $event->date }}</p>
                        <p class="card-text">Nombre de places de l'événement :{{ $event->nb_place }}</p>
                        <p class="card-text">categories de l'événement :{{ $event->categorie?->name }}</p>
                        <a href="{{ route('details', $event->id) }}"><i class="fa-solid fa-circle-info"></i></a>
                        <a href="{{ route('home.edit', $event->id) }}" class="btn btn-primary">Modifier</a>
                        <form action="{{ route('home.destroy', $event->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="color: #ff0202">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajouter un événement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulaire -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <form method="post" action="{{ route('home.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title">Nom de l'événement</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Nom de l'événement">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description de l'événement</label>
                                    <textarea class="form-control" id="description" name="description" rows="3"
                                        placeholder="Description de l'événement"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="date">Date de l'événement</label>
                                    <input type="date" class="form-control" id="date" name="date">
                                </div>
                                <div class="form-group">
                                    <label for="location">Localisation de l'événement</label>
                                    <input type="text" class="form-control" id="location" name="location"
                                        placeholder="Localisation de l'événement">
                                </div>
                                <div class="form-group">
                                    <label for="location">Nombre des places</label>
                                    <input type="number" class="form-control" id="nb_place" name="nb_place"
                                        placeholder="nombre des places">
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Categorie de l'événement:</label>
                                    <select class="form-control" id="categorie_id" name="categorie_id">
                                        @foreach ($categories as $categorie)
                                            <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Type d'événement:</label>
                                    <select class="form-control" id="type" name="type">
                                            <option value="automatic">automatic</option>
                                            <option value="manuel">manuel</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="image_path">Image de l'événement</label>
                                    <input type="file" class="form-control-file" id="image_path" name="image_path">
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Poster</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Assurez-vous d'avoir inclus jQuery et Bootstrap JavaScript dans votre projet pour que ce code fonctionne correctement. -->
@endsection
