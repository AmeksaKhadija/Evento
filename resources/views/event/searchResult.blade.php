@foreach ($events as $event)
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
            </div>
        </div>

@endforeach
