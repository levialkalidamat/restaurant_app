@extends('layouts.app')


@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                @include('layouts.sidebar')
                            </div>
                            <div class="col-md-8">
                                <h3 class="text-secondary border-bottom mb-3 p-2">
                                    <i class="fas fa-plus"></i> Modifier le menu {{ $plats->namePlat }}
                                </h3>
                                <form action="{{ route('plats.update', $plats->namePlat) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method("PUT")
                                    <div class="form-group">
                                        <input
                                            type="text" name="namePlat" id="title"
                                            class="form-control"
                                            placeholder="Titre"
                                            value="{{ $plats->namePlat }}"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <textarea
                                            name="descriptionPlat" id="description"
                                            rows="5"
                                            cols="30"
                                            class="form-control"
                                            placeholder="Description"
                                        >{{ $plats->descriptionPlat }}</textarea>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                $
                                            </div>
                                        </div>
                                        
                                        <input type="number"
                                            name="pricePlat" 
                                            class="form-control"
                                            placeholder="Prix"
                                            value="{{ $plats->pricePlat }}"
                                        >
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                .00
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-2">
                                        <img src="{{ asset('images/plats/'.$plats->imagePlat) }}"
                                            width="200"
                                            height="200"
                                            class="img-fluid"
                                            alt="{{ $plats->namePlat }}">
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                Image
                                            </span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file"
                                                name="imagePlat"
                                                class="custom-file-input">
                                            <label class="custom-file-label">
                                                2mg max
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <select name="category_id" id="category_id" class="form-control">
                                            <option value="" selected disabled>Choisir une catégorie</option>
                                            @foreach ($categories as $category)
                                                <option
                                                    {{ $category->id === $plats->category->id ? "selected" : ""}}
                                                    value="{{ $category->id }}">
                                                    {{ $category->nameCategory }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary">
                                            Valider
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
