@extends('layouts.nav')
@section('content')

@if($message = Session::get('status'))
<div class="alert alert-success" role="alert">
    {{$message}}
</div>
@endif
    {{-- recherche  --}}
    <form class="d-flex container p-6 rounded">
        <input class="form-control me-6 rounded" type="text" placeholder="Search" aria-label="Search" id="search_title">
    </form>


    {{-- card --}}
    <div class="container" id="events">

        @include('event.pagination')
    </div>

    <script>
        $(document).ready(function() {
            $('#search_title').on('keyup', function() {
                fetchProducts(1);
            });

            $(document).on('click', '.pagination a', function(e) {
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetchProducts(page);
            });

            function fetchProducts(page) {
                var keyword = $('#search_title').val().trim();
                $.ajax({
                    url: '/search',
                    data: {
                        page: page,
                        keyword: keyword
                    },
                    success: function(data) {
                        $('#events').html(data);
                    }
                });
            }
        });
    </script>

@endsection

