@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row my-5">
            <!--Se l'utente ha un ristorante-->

            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif


            @if ($restaurant)
                <div class="col-7">
                    <div class="d-flex flex-column justify-content-center align-items-center position-relative"
                        style="width: 100%">
                        <img style="width: 100%" src="{{ $restaurant->photo }}" alt="{{ $restaurant->name }} photo">
                        <div class="d-flex position-absolute justify-content-center align-items-center"
                            style="top: 0 ; background-color: hsla(0, 0%, 100%, 0.5); width: 100%">
                            <h2>{{ $restaurant->name }}</h2>
                        </div>
                    </div>

                </div>

                <div class="col-5">
                    <div class="cards d-flex justify-content-center align-items-center" style="height: 100%">

                        <a href="{{ route('admin.restaurant.show', $restaurant->id) }}">
                            <div class="card blue">
                                <p class="tip">Dettagli</p>
                                <p class="second-text">Visualizza i dettagli del tuo ristorante</p>
                            </div>
                        </a>

                        <a href="{{ route('admin.restaurant.edit', $restaurant->id) }}">
                            <div class="card green my-4">
                                <p class="tip">Modifica</p>
                                <p class="second-text">Modifica i dettagli del tuo ristorante</p>
                            </div>
                        </a>

                        <button type="submit" data-bs-toggle="modal" data-bs-target="#deleteModal" class="card red">
                            <p class="tip">Elimina</p>
                            <p class="second-text">Elimina il tuo ristorante</p>
                        </button>

                    </div>
                </div>
            @else
                <h4>Nessun Ristorante registrato</h4>
                <div class="col-12 my-3">
                    <div class="d-flex justify-content-between">
                        <div>
                            <a class="btn btn-secondary" href="{{ route('admin.restaurant.create') }}">Aggiungi un
                                ristorante</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    @include('admin.partials.modal')
@endsection
