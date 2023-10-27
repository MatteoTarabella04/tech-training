@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 mt-5"">
            <div class=" d-flex justify-content-between">
            <div>
                <h2>Aggiungi un ristorante</h2>
            </div>
            <div class="">
                <a href="{{ route('admin.restaurant.index') }}" class="btn btn-danger">Torna indietro</a>
            </div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (session('message'))
        <div class="alert alert-danger">
            {{ session('message')}}
        </div>
        @endif
        <div>
            <form action="{{ route('admin.restaurant.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group my-2">
                    <label class="control-label">Nome</label>
                    <input type="text" class="form-control" placeholder="Nome" id="name" name="name" value="{{ old('name') }}">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label class="control-label">Indirizzo</label>
                    <input type="text" class="form-control" placeholder="Indirizzo" id="address" name="address" value="{{ old('address') }}">
                    @error('address')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label class="control-label">Foto</label>
                    <input type="file" name="photo" id="photo" class="form-control">
                    @error('photo')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group my-2">
                    <label class="control-label">P.Iva</label>
                    <input type="text" class="form-control" placeholder="P.Iva" id="piva" name="piva" value="{{ old('piva') }}">
                    @error('piva')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group my-2 d-flex flex-column">
                    <div class="control-label">Seleziona la tipologia: </div>
                    <div>
                        @foreach ($typologies as $typology)
                        <div class="form-check form-create">
                            <input type="checkbox" value="{{ $typology->id }}" name='typologies[]'>
                            <label class="form-check-label"> {{ $typology->name }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection