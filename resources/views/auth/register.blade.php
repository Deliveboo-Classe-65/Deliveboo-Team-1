@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registrati</div>

                <div class="card-body">
                    <validation-observer ref="form" v-slot="{ errors }">
                    <form @submit.prevent="onSubmit($event)" class="row" method="POST" action="{{ route('register') }}" enctype="multipart/form-data" novalidate>
                        @csrf

                        <div class="mb-3">
                            
                            <label for="email">Indirizzo e-mail</label>
                            <validation-provider name="email" :immediate="true" rules="required|email" v-slot="{ errors }">
                            <input id="email" v-model="email" :class="errors.length > 0 && wasValidated ? 'is-invalid' : '' " type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            <div  class="invalid-feedback">
                                <ul>
                                    <li v-for="error in errors">  @{{ error }}</li>
                                    <li>@error('email'){{ $message }}@enderror</li>
                                </ul>
                            </div>
                        </validation-provider>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="password">Password</label>
                            <validation-provider rules="required|password:@confirm|min:8" v-slot="{ errors }">
                            <input id="password" v-model="password" type="password" :class="errors.length > 0 && wasValidated ? 'is-invalid' : '' " class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                            <div v-for="error in errors" class="invalid-feedback">@{{ error }}</div>
                        </validation-provider>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        
                        <div class="col-md-6 mb-3">
                            <label for="password-confirm">Conferma Password</label>
                            <validation-provider v-slot="{ errors }" name="confirm" rules="required|min:8">
                            <input id="password-confirm" v-model="confirmation" type="password" :class="errors.length > 0 && wasValidated ? 'is-invalid' : '' " class="form-control" name="password_confirmation" autocomplete="new-password">
                            <div v-for="error in errors" class="invalid-feedback">@{{ error }}</div>
                        </validation-provider>
                        </div>
                        
                        <div class="mb-3">
                            <label for="name">Nome Attività</label>
                            <validation-provider name="nome" :immediate="true" rules="required|min:5" v-slot="{ errors }">
                            <input id="name" v-model="nome" type="text" :class="errors.length > 0 && wasValidated ? 'is-invalid' : '' " class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
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
                            <validation-provider name="indirizzo" :immediate="true" rules="required|min:10" v-slot="{ errors }">
                            <input id="address" v-model="indirizzo" type="text" :class="errors.length > 0 && wasValidated ? 'is-invalid' : '' " class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
                            <div v-for="error in errors" class="invalid-feedback">@{{ error }}</div>
                        </validation-provider>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="vat_number">Partita IVA</label>
                            <validation-provider name="partitaiva" :immediate="true" rules="required|digits:11" v-slot="{ errors }">
                            <input id="vat_number" v-model="partitaiva" type="text" maxlength="11" :class="errors.length > 0 && wasValidated ? 'is-invalid' : '' " class="form-control @error('vat_number') is-invalid @enderror" name="vat_number" value="{{ old('vat_number') }}" autocomplete="vat_number" autofocus>
                            <div v-for="error in errors" class="invalid-feedback">@{{ error }}</div>
                        </validation-provider>
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
                            <validation-provider name="immagine" :immediate="true" rules="required|image" v-slot="{ errors, validate }">
                            <input id="image" type="file" @change="validate" class="form-control" :class="errors.length > 0 && wasValidated ? 'is-invalid' : '' " @error('image') is-invalid @enderror name="image" value="{{ old('image') }}" required autocomplete="image" autofocus>
                            <div v-for="error in errors" class="invalid-feedback">@{{ error }}</div>
                        </validation-provider>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <validation-provider name="categorie" :immediate="true" rules="required" v-slot="{ errors }">
                            <fieldset :class="errors.length > 0 && wasValidated ? 'is-invalid' : '' " class="form-control @error('categories') is-invalid @enderror" >
                                <legend class="fs-6">Seleziona una o più categorie</legend>
                                @foreach ($categories as $category)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" v-model="categorie"  {{ in_array($category->id, old("categories", [])) ? 'checked' : '' }} name="categories[]" type="checkbox" value="{{ $category->id }}" id="{{"flexCheckDefault" . $category->id}}">
                                        <label class="form-check-label" for={{"flexCheckDefault" . $category->id}}>
                                            {{ $category->name }}
                                        </label>
                                    </div>
                                @endforeach
                                
                            </fieldset>
                            <div v-for="error in errors" class="invalid-feedback">@{{ error }}</div>
                            </validation-provider>
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
