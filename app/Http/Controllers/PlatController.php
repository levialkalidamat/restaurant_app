<?php

namespace App\Http\Controllers;

use App\Models\Plat;
use App\Http\Requests\StorePlatRequest;
use App\Http\Requests\UpdatePlatRequest;

class PlatController extends Controller
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
        return view('pages.plats.index')->with([
            'plats' => Plat::paginate(8),
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
        return view('pages.plats.create')-with([
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlatRequest $request)
    {
        //
        $request->validate($request, [
            'namePlat' => 'required',
            'descriptionPlat' => 'required',
            'imagePlat' => ['required', 'image', 'mimes:png,jpeg,jpg', 'max:2048'],
            'PricePlat' => ['required', 'numeric'],
            'category_id' => ['required', 'numeric']

        ]);

        if($request->hasFile('imagePlat'))
        {
            $file = $request->namePlat;
            $imageName = 'images/plats'.time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/plat'), $imageName);
            
            Plat::create([
                'namePlat' => $request->namePlat,
                'descriptionPlat' => $request->descriptionPlat,
                'PricePlat' => $request->PricePlat,
                'category_id' => $request->category_id,
                'imagePlat' => $imageName
            ]);
        }
        //$title = $request->$title;

        return redirect()
                ->route('pages.plats.index')
                ->with('success', 'plats ajouté avec succès dans la table');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plat  $plat
     * @return \Illuminate\Http\Response
     */
    public function show(Plat $plat)
    {
        //
        return view('pages.plats.show')->with([
            'plat' => $plat,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plat  $plat
     * @return \Illuminate\Http\Response
     */
    public function edit(Plat $plat)
    {
        //
        return view('pages.plats.edit')->with([
            'plat' => $plat,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlatRequest  $request
     * @param  \App\Models\Plat  $plat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlatRequest $request, Plat $plat)
    {
        //
        $request->validate($request, [
            'namePlat' => 'required',
            'descriptionPlat' => 'required',
            'imagePlat' => ['image', 'mimes:png,jpeg,jpg', 'max:2048'],
            'PricePlat' => ['required', 'numeric'],
            'category_id' => ['required', 'numeric']

        ]);

        if($request->hasFile('imagePlat'))
        {
            $file = $request->namePlat;
            $imageName = 'images/plats'.time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/plat'), $imageName);
            $plat->imagePlat = $imageName;
        }
            $plat::update([
                'namePlat' => $request->namePlat,
                'descriptionPlat' => $request->descriptionPlat,
                'PricePlat' => $request->PricePlat,
                'category_id' => $request->category_id,
                'imagePlat' => $plat ->imagePlat
            ]);

            return redirect()
            ->route('pages.plats.index')
            ->with('success', 'plats mise à avec succès dans la table');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plat  $plat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plat $plat)
    {
        //
        $plat->delete();
        return redirect()
                ->route('pages.plats.index')
                ->with('success', 'plat supprimé avec succès');
    }
}
