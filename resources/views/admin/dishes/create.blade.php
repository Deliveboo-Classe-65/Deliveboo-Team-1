@extends('admin.home')

@section('content')

@push('nameVar')
<script defer>
    window.MyLib = {}
    window.MyLib.name = '{{old('name')}}'
    window.MyLib.prezzo = {{old('price')}}
    window.MyLib.descrizione = '{{old('description')}}'
</script>
@endpush


    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h1>Crea piatto</h1>
            <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-activity">
                    <line x1="20" y1="12" x2="4" y2="12"></line>
                    <polyline points="10 18 4 12 10 6"></polyline>
                </svg> Tutti i piatti
            </a>
        </div>

        <form action="{{ route('admin.dishes.store') }}" method="post" enctype="multipart/form-data" novalidate
            class="needs-validation">
            @csrf
           
            <div class="row mb-3">
                <div class="col-md-8">
                    <label for="name">Nome</label>
            
                    <validation-provider name="nome" :immediate="true" rules="required|min:5" v-slot="{ errors, value }">
                        <input type="text" value="{{ old('name')}}" v-model="nome" minlength="5" required id="name" name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="Inserisci il nome del piatto" >
                        <div v-for="error in errors" class="invalid-feedback">@{{ error }}</div>
                    </validation-provider>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
    
                </div>
                <div class="col-md-4">
                    <label for="price">Prezzo</label>
                    <validation-provider name="prezzo" :skip-if-empty="false" :immediate="true" rules="required|min_value:0" v-slot="{ errors }">
                        <input type="number" v-model='prezzo' id="price" name="price" min="0" step="0.01"
                            class="form-control @error('price') is-invalid @enderror"
                            placeholder="Inserisci il prezzo del piatto" value="{{ old('price') }}" required>
                            <div v-for="error in errors" class="invalid-feedback">@{{ error }}</div>
                        </validation-provider>
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    
                </div>
            </div>

            <div class="mb-3">
                <label for="img_file">Immagine</label>
                <validation-provider name="immagine" :skip-if-empty="false" :immediate="true" rules="required|image" v-slot="{ errors, validate }">
                <div class="d-flex">
                    <input type="file" name="image" v-on:change="validate" class="form-control @error('image') is-invalid @enderror"
                        id="img_file">
                </div>
                <div v-for="error in errors" class="invalid-feedback">@{{ error }}</div>
            </validation-provider>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
           
            </div>

            <div class="mb-3">
                <label for="description">Descrizione</label>
                <validation-provider name="descrizione" :skip-if-empty="false" :immediate="true" rules="required|min:10|max:999" v-slot="{ errors }">
                <textarea name="description" v-model="descrizione" id="description" class="form-control @error('description') is-invalid @enderror"
                    rows="3" required minlength="10" maxlength="999" placeholder="Inserisci una descrizione del piatto">{{ old('description') }}</textarea>
                    <div v-for="error in errors" class="invalid-feedback">@{{ error }}</div>
                </validation-provider>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <fieldset class="form-control">
                    <legend class="fs-6">Seleziona una o più categorie</legend>
                    @foreach ($types as $type)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" {{ in_array($type->id, old('types', [])) ? 'checked' : '' }}
                                name="types[]" type="checkbox" value="{{ $type->id }}"
                                id="{{ 'flexCheckDefault' . $type->id }}">
                            <label class="form-check-label" for={{ 'flexCheckDefault' . $type->id }}>
                                {{ $type->name }}
                            </label>
                        </div>
                    @endforeach
                </fieldset>
            </div>

            <div class="form-check form-switch mb-3">
                <input class="form-check-input" {{ old('visibility') || $errors->count() === 0 ? 'checked' : '' }}
                    role="switch" name="visibility" type="checkbox" value="1" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Visibile
                </label>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-activity">
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                        <polyline points="17 21 17 13 7 13 7 21"></polyline>
                        <polyline points="7 3 7 8 15 8"></polyline>
                    </svg> Crea piatto
                </button>
            </div>
        </form>
    </div>
@endsection
