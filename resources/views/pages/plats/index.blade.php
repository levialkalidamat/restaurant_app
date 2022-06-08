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
                                <div class="d-flex flex-row justify-content-between align-items-center border-bottom pb-1">
                                    <h3 class="text-secondary">
                                        <i class="fas fa-clipboard-list"></i> Menu
                                    </h3>
                                    <a href="{{ route('plats.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus fa-x2"></i>
                                    </a>
                                </div>
                                <table class="table table-hover table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Titre</th>
                                            <th>Description</th>
                                            <th>Prix</th>
                                            <th>Catégorie</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($plats as $plat)
                                            <tr>
                                                <td>
                                                    {{ $plat->id }}
                                                </td>
                                                <td>
                                                    {{ $plat->namePlat }}
                                                </td>
                                                <td>
                                                    {{ substr($plat->descriptionPlat,0,100)}}
                                                </td>
                                                <td>
                                                    {{ $plat->pricePlat}} DH
                                                </td>
                                                <td>
                                                    {{ $plat->category->nameCategory }}
                                                </td>
                                                <td>
                                                    <img src="{{ asset('images/plats/'. $plat->imagePlat) }}" alt="{{ $plat->namePlat}}"
                                                        class="fluid rounded" width="60" height="60"
                                                    >
                                                </td>
                                                <td class="d-flex flex-row justify-content-center align-items-center">
                                                    <a href="{{ route('plats.edit', $plat->namePlat) }}" class="btn btn-warning mr-1">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form id="{{ $plat->id }}" action="{{ route('plats.destroy', $plat->namePlat) }}" enctype="multipart/form-data" method="post" >
                                                        @csrf
                                                        @method("DELETE")
                                                        <button
                                                            onclick="
                                                                event.preventDefault();
                                                                if(confirm('Voulez vous supprimer le menu {{ $plat->namePlat }} ?'))
                                                                document.getElementById({{ $plat->id }}).submit()"
                                                            class="btn btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="my-3 d-flex justify-content-center align-items-center">
                                    {{ $plats->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
