@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row">

        @php
            $userHasRestaurant = false;
        @endphp

        <!--Se l'utente ha un ristorante-->

        @forelse($restaurants as $restaurant)

                @if($restaurant->user_id == $id)

                    <div class="col-12">
                        @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message')}}
                        </div>
                        @endif
                        <div class="d-flex flex-column">
                            <p>Nome: {{$restaurant->name}}</p>
                            <p>Indirizzo: {{$restaurant->address}}</p>
                            <p>P. Iva:{{$restaurant->piva}}</p>
                            <img style="width: 200px" src="{{$restaurant->photo}}" alt="{{$restaurant->name}} photo">
                        </div>
                        
                    </div>

                    @php
                        $userHasRestaurant = true;
                        break;
                    @endphp

                @endif
            
            @empty
                
                <p>Error</p>

        @endforelse

        <!--Se l'utente non ha un ristorante-->
        
        @if (!$userHasRestaurant)
            <div class="col-12 my-3">
                <div class="d-flex justify-content-between">
                    <div>
                        <a class="btn btn-secondary" href="{{ route('admin.restaurant.create') }}">Aggiungi un ristorante</a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

@endsection
