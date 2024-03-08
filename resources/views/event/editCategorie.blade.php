@extends('layouts.nav')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <form action="{{route('categorie.update',$Categorie)}}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Nom du Categorie :</label>
                                <input type="text" class="form-control" id="title" name="name" value="{{ $Categorie->name }}" value="{{ $Categorie->name }}">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
