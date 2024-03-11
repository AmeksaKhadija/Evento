@extends('layouts.nav')
@section('content')
    @if ($message = Session::get('status'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    @endif
    {{-- recherche  --}}
    <form class="d-flex container p-6 rounded">
        <input class="form-control me-6 rounded" type="text" placeholder="Search by Title" aria-label="Search by Title"
            id="search_title" onkeyup="search()">
        <select class="form-control" id="categorie_id" name="categorie_id">
            @foreach ($categories as $categorie)
                <option value="{{ $categorie->id }}">{{ $categorie->name }}
                </option>
            @endforeach

        </select>
    </form>

    {{-- card --}}
    <div class="container" id="events">

        @include('event.pagination')
    </div>

    <script>
        function search() {
            var valueInput = document.getElementById('search_title').value;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("events").innerHTML = xhttp.responseText;
                }
            };
            if (valueInput == '') {
                var url = '/search/AllEventSearch';
            } else {
                var url = '/search/' + valueInput;
            }
            xhttp.open("GET", url, true);
            xhttp.send();
        }
    </script>
@endsection
