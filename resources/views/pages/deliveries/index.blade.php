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
                                        <i class="fas fa-user-cog"></i> Livreurs/Sérveurs
                                    </h3>
                                    <a href="{{ route('delivery.create') }}" class="btn btn-primary">
                                        <i class="fas fa-plus fa-x2"></i>
                                    </a>
                                </div>
                                <table class="table table-hover table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nom & Prénom</th>
                                            <th>Addresse</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($deliveries as $deliverie)
                                            <tr>
                                                <td>
                                                    {{ $deliverie->id }}
                                                </td>
                                                <td>
                                                    {{ $deliverie->nameDelivery }}
                                                </td>
                                                <td>
                                                    @if ($deliverie->addressDelivery)
                                                        {{ $deliverie->addressDelivery }}
                                                    @else
                                                        <span class="text-danger">
                                                            Non Disponible
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="d-flex flex-row justify-content-center align-items-center">
                                                    <a href="{{ route('delivery.edit', $deliverie->id) }}" class="btn btn-warning mr-1">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form id="{{ $deliverie->id }}" action="{{ route('delivery.destroy', $deliverie->id) }}" method="post">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button
                                                            onclick="
                                                                event.preventDefault();
                                                                if(confirm('Voulez vous supprimer le sérveur {{ $deliverie->nameDelivery }} ?'))
                                                                document.getElementById({{ $deliverie->id }}).submit()
                                                            "
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
                                    {{ $deliveries->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
