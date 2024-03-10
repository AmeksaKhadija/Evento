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
            id="search_title">
        <select class="form-select me-3" id="category_filter">
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
        $(document).ready(function() {
            $('#search_title, #category_filter').on('change keyup', function() {
                fetchProducts(1);
            });

            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetchProducts(page);
            });

            function fetchProducts(page) {
                var keyword = $('#search_title').val().trim();
                var category = $('#category_filter').val();
                $.ajax({
                    url: '/search',
                    data: {
                        page: page,
                        keyword: keyword,
                        category: category
                    },
                    success: function(data) {
                        $('#events').html(data);
                    }
                });
            }
        });
    </script>
@endsection
