@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registrati</div>

                <div class="card-body">
                    <validation-observer ref="form" v-slot="{ errors }">
                    <form @submit.prevent="onSubmit($event)" class="row needs-validation" :class="wasValidated ? 'was-validated' : ''" method="POST" action="{{ route('register') }}" enctype="multipart/form-data" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label for="email">Indirizzo e-mail</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="password">Password</label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        
                        <div class="col-md-6 mb-3">
                            <label for="password-confirm">Conferma Password</label>
                            
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        
                        <div class="mb-3">
                            <label for="name">Nome Attività</label>
                            <validation-provider name="nome" :immediate="true" rules="required|min:5" v-slot="{ errors, value }">
                            <input id="name" v-model="nome" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            <div v-for="error in errors" class="invalid-feedback">@{{ error }}</div>
                        </validation-provider>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address">Indirizzo</label>

                            <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="vat_number">Partita IVA</label>

                            <input id="vat_number" type="text" class="form-control @error('vat_number') is-invalid @enderror" name="vat_number" value="{{ old('vat_number') }}" required autocomplete="vat_number" autofocus>

                            @error('vat_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description">Descrizione Attività</label>

                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" autocomplete="textarea" autofocus>{{ old('description') }}</textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image">Immagine</label>

                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required autocomplete="image" autofocus>

                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <fieldset class="form-control @error('categories') is-invalid @enderror" >
                                <legend class="fs-6">Seleziona una o più categorie</legend>
                                @foreach ($categories as $category)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" {{ in_array($category->id, old("categories", [])) ? 'checked' : '' }} name="categories[]" type="checkbox" value="{{ $category->id }}" id="{{"flexCheckDefault" . $category->id}}">
                                        <label class="form-check-label" for={{"flexCheckDefault" . $category->id}}>
                                            {{ $category->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </fieldset>
                            @error('categories')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Registrati</button>
                        </div>
                    </form>
                </validation-observer>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
