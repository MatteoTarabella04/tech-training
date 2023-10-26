@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="d-flex justify-content-end mt-4">
            <a class="btn text-end" href="{{ route('admin.dish.index') }}">
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-house-door-fill" viewBox="0 0 16 16">
                        <path
                            d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                    </svg>
                </span>
                <span style="margin-left: 5px; vertical-align: middle">Ritorna ai tuoi piatti</span></a>
        </div>
        <div class="row">
            <div class="col">
                <div class=" p-3 my-5 ">
                    @if (session('message'))
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ session('message') }}</strong>
                        </div>
                    @endif

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                <strong>{{ $error }}</strong>
                            </div>
                        @endforeach
                    @endif

                    <div>
                        <h4>Inserisci un piatto</h4>
                        <form id="create_dish_form" action="{{ route('admin.dish.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            {{-- <div class="d-flex justify-content-between flex-wrap align-items-center">
                                <div class="mb-3 col-12 col-md-8">
                                    <label for="image" class="form-label">Aggiungi un'immagine</label>
                                    <input type="file" class="form-control shadow" name="image" id="image"
                                        aria-describedby="helpId" accept="image/*" required>
                                    @error('image')
                                        <small class="text-danger">Per favore, inserisci correttamente l'immagine.</small>
                                    @enderror

                                </div>
                                <div id="image-preview-container"
                                    class="mt-2 d-none col-12 col-md-4 d-flex justify-content-center">
                                    <img id="image-preview" src="#" alt="Preview dell'immagine"
                                        style="max-width: 100%;" class="p-3">
                                </div>
                            </div> --}}

                            <div class="mb-3">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" class="form-control shadow" name="name" id="name"
                                    aria-describedby="helpId" placeholder="" value="{{ old('name') }}" required>
                                @error('name')
                                    <small class="text-danger">Per favore, inserisci correttamente il nome.</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Descrizione</label>
                                <textarea class="form-control shadow" name="description" id="description" required rows="3">{{ old('description') }}</textarea>
                                @error('description')
                                    <small class="text-danger">Per favore, inserisci correttamente la descrizione.</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="ingredients" class="form-label">Ingredienti</label>
                                <textarea class="form-control shadow" name="ingredients" id="ingredients" required rows="3">{{ old('ingredients') }}</textarea>
                                @error('ingredients')
                                    <small class="text-danger">Per favore, inserisci correttamente gli ingredienti.</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="price" class="form-label">Prezzo (€)</label>
                                <input type="number" class="form-control shadow" name="price" id="price"
                                    min="0" step="0.01" aria-describedby="helpId" placeholder=""
                                    value="{{ old('price') }}" required>
                                @error('price')
                                    <small class="text-danger">Per favore, inserisci correttamente il prezzo.</small>
                                @enderror
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" value="1" id="visible" name="visible"
                                    {{ old('visible', []) || !$errors->any() == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="visible">
                                    Piatto disponibile da subito
                                </label>
                                @error('visible')
                                    <small class="text-danger">Per favore, indica correttamente la visibilità.</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-dark w-100 text-uppercase strong_shadow">Aggiungi
                                piatto</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
