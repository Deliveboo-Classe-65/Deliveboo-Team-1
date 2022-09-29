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
            <a href="{{ route('admin.dishes.index') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i> Tutti i piatti</a>
        </div>
        <form action="{{ route('admin.dishes.store') }}" method="post" enctype="multipart/form-data" novalidate class="needs-validation">
            @csrf
            <div class="row mb-3">
                <div class="col-md-8">
                    <label for="name">Nome</label>
                    <validation-provider name="nome" :immediate="true" rules="required|min:5" v-slot="{ errors, value }">
                        <input type="text" value="{{ old('name')}}" v-model="nome" minlength="5" required id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Inserisci il nome del piatto" >
                        <div v-for="error in errors" class="invalid-feedback">@{{ error }}</div>
                    </validation-provider>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="price">Prezzo</label>
                    <validation-provider name="prezzo" :skip-if-empty="false" :immediate="true" rules="required|min_value:0" v-slot="{ errors }">
                        <input type="number" v-model='prezzo' id="price" name="price" min="0" step="0.01" class="form-control @error('price') is-invalid @enderror" placeholder="Inserisci il prezzo del piatto" value="{{ old('price') }}" required>
                        <div v-for="error in errors" class="invalid-feedback">@{{ error }}</div>
                    </validation-provider>
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="img_file">Immagine</label>
                <div class="d-flex">
                    <validation-provider name="immagine" :immediate="true" rules="required|image" v-slot="{ errors, validate }">
                        <input accept="image/png, image/gif, image/jpeg" type="file" name="image" @change="validate" class="form-control @error('image') is-invalid @enderror" id="img_file">
                        <div v-for="error in errors" class="invalid-feedback">@{{ error }}</div>
                    </validation-provider>
                </div>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description">Descrizione</label>
                <validation-provider name="descrizione" :skip-if-empty="false" :immediate="true" rules="required|min:10|max:999" v-slot="{ errors }">
                    <textarea name="description" v-model="descrizione" id="description" class="form-control @error('description') is-invalid @enderror" rows="3" required minlength="10" maxlength="999" placeholder="Inserisci una descrizione del piatto">{{ old('description') }}</textarea>
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
                            <input class="form-check-input" {{ in_array($type->id, old('types', [])) ? 'checked' : '' }} name="types[]" type="checkbox" value="{{ $type->id }}" id="{{ 'flexCheckDefault' . $type->id }}">
                            <label class="form-check-label" for={{ 'flexCheckDefault' . $type->id }}>{{ $type->name }}</label>
                        </div>
                    @endforeach
                </fieldset>
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" {{ old('visibility') || $errors->count() === 0 ? 'checked' : '' }} role="switch" name="visibility" type="checkbox" value="1" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">Visibile</label>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success"><i class="fa-solid fa-plus"></i> Crea piatto</button>
            </div>
        </form>
    </div>
@endsection
