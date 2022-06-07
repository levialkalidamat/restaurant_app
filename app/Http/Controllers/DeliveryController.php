<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Http\Requests\StoreDeliveryRequest;
use App\Http\Requests\UpdateDeliveryRequest;

class DeliveryController extends Controller
{
    //creer
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.deliveries.index')->with([
            'deliveries' => Delivery::paginate(8),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.deliveries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDeliveryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeliveryRequest $request)
    {
        //
        $request->validate($request, [
            'nameDelivery' => 'required',
            'addressDelivery' => 'required',
        ]);

        //$title = $request->$title;

        Delivery::create([
            'nameDelivery' => $request->nameDelivery,
            'addressDelivery' => $request->addressDelivery
        ]);

        return redirect()
                ->route('pages.deliveries.index')
                ->with('success', 'Livreur/servant ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function show(Delivery $delivery)
    {
        //
        return view('pages.deliveries.show')->with([
            'delivery' => $delivery,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivery $delivery)
    {
        //
        return view('pages.deliveries.edit')->with([
            'delivery' => $delivery,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDeliveryRequest  $request
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeliveryRequest $request, Delivery $delivery)
    {
        //
        $request->validate($request, [
            'nameDelivery' => 'required',
            'addressDelivery' => 'required'
        ]);

        //$title = $request->$title;

        $delivery->update([
            'nameDelivery' => $request->nameCategory,
            'addressDelivery' => $request->addressDelivery,
        ]);

        return redirect()
                ->route('pages.deliveries.index')
                ->with('success', 'Serveur/livreur mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delivery $delivery)
    {
        //
        $delivery->delete();
        return redirect()
                ->route('pages.deliveries.index')
                ->with('success', 'serveur/livreur supprimé avec succès');
    }
}
