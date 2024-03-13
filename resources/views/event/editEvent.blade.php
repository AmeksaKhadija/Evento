@extends('layouts.nav')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <form action="{{route('home.update',$events)}}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Titre de l'événement :</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $events->title }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description de l'événement :</label>
                                <textarea class="form-control" id="description" name="description">{{ $events->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="location">Lieu de l'événement :</label>
                                <input type="text" class="form-control" id="location" name="location" value="{{ $events->location }}">
                            </div>
                            <div class="form-group">
                                <label for="date">Date de l'événement :</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="{{ $events->date }}">
                            </div>
                            <div class="form-group">
                                <label for="nb_place">Nombre des places de l'événement :</label>
                                <input type="number" class="form-control" id="nb_place" name="nb_place"
                                    value="{{ $events->nb_place }}">
                            </div>
                            <div class="form-group">
                                <label for="prix">Image:</label>
                                <input type="file" class="form-control" id="prix" name="image_path" value="{{$events->image_path}}"  >
                            </div>
                            <img src="{{ asset('storage/' . $events->image_path) }}" class="card-img-top"
                                alt="l'image de l'événement">
                            <button type="submit" name="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
