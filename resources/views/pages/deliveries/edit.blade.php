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
                                    <i class="fas fa-plus"></i> Modifier le sérveur {{ $deliveries->nameDelivery }}
                                </h3>
                                <form action="{{ route('delivery.update', $deliveries->id) }}" method="post">
                                    @csrf
                                    @method("PUT")
                                    <div class="form-group">
                                        <input
                                            type="text" name="nameDelivery" id="name"
                                            class="form-control"
                                            placeholder="Nom & Prénom"
                                            value="{{ $deliveries->nameDelivery }}"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <input
                                            type="text" name="addressDelivery" id="address"
                                            class="form-control"
                                            placeholder="Addresse"
                                            value="{{ $deliveries->addressDelivery }}"
                                        >
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
