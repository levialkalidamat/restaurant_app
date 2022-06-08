<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Http\Requests\StoreTableRequest;
use App\Http\Requests\UpdateTableRequest;

class TableController extends Controller
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
        //
        return view('pages.tables.index')->with([
            'tables' => Table::paginate(8),
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
        return view('pages.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTableRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTableRequest $request)
    {
        //
        $this->validate($request, [
            'nameTable' => 'required',
            'statusTable' => 'required|boolean',
        ]);

        //$title = $request->$title;

        Table::create([
            'nameTable' => $request->nameTable,
            'statusTable' => $request->statusTable
        ]);

        return redirect()
                ->route('tables.index')
                ->with('success', 'données ajouté avec succès dans la table');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function show(Table $table)
    {
        //
        return view('pages.tables.show')->with([
            'table' => $table,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit(Table $table)
    {
        //
        return view('pages.tables.edit')->with([
            'table' => $table,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTableRequest  $request
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTableRequest $request, Table $table)
    {
        //
        $this->validate($request, [
            'nameTable'  => 'required',
            'statusTable' => 'required',
        ]);

        //$title = $request->$title;

        $table->update([
            'nameTable' => $request->nameTable,
            'statusTable' => $request->statusTable,
        ]);

        return redirect()
                ->route('tables.index')
                ->with('success', 'tables mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
        //
        $table->delete();
        return redirect()
                ->route('tables.index')
                ->with('success', 'table supprimé avec succès');
    }
}
