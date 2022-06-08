<?php

namespace App\Http\Controllers;

use App\Models\Plat;
use App\Models\Category;
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
        
        return view('pages.plats.create')->with([
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
        $this->validate($request, [
            'namePlat' => 'required',
            'descriptionPlat' => 'required',
            'imagePlat' => ['required', 'image', 'mimes:png,jpeg,jpg', 'max:2048'],
            'pricePlat' => ['required', 'numeric'],
            'category_id' => ['required', 'numeric']

        ]);

        if($request->hasFile('imagePlat'))
        {
            $file = $request->file('imagePlat');//$file = $request->namePlat;
            $imageName = time().'_'.$file->getClientOriginalName();//$imageName = 'images/plats'.time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/plats'), $imageName);
            
            Plat::create([
                'namePlat' => $request->namePlat,
                'descriptionPlat' => $request->descriptionPlat,
                'pricePlat' => $request->pricePlat,
                'category_id' => $request->category_id,
                'imagePlat' => $imageName
            ]);
        }
        //$title = $request->$title;

        return redirect()
                ->route('plats.index')
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
            'plats' => $plat,
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
            "categories" => Category::all(),
            'plats' => $plat,
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
        
        $this->validate($request, [
            'namePlat' => 'required',
            'descriptionPlat' => ['required', 'min:8'],
            'imagePlat' => ['image', 'mimes:png,jpeg,jpg', 'max:2048'],
            'pricePlat' => ['required', 'numeric'],
            'category_id' => ['required', 'numeric']

        ]);
        
        //Stockage des données
        if($request->hasFile('imagePlat'))
        {
            //unlink(public_path('images/plats/' . $plat->imagePlat));
           
            //dd($request->imagePlat);
            $file = $request->file('imagePlat');// $file = $request->namePlat;
            //dd($file);
            $imageName = time().'_'.$file->getClientOriginalName();//$imageName = 'images/plat'.time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/plats'), $imageName);
            //$plat->imagePlat = $imageName;
            
            $plat->update([
                "namePlat" => $request->namePlat,
                "descriptionPlat" =>  $request->descriptionPlat,
                "pricePlat" =>  $request->pricePlat,
                "imagePlat" =>  $plat->imagePlat,//$imageName,
                "category_id" =>  $request->category_id,
            ]);
            
            //Redirection du user
            return redirect()
            ->route('plats.index')
            ->with(['success' => 'plats mise à avec succès dans la table']);


        }
        /*else
        {
            $plat->update([
                'namePlat' => $request->namePlat,
                'descriptionPlat' => $request->descriptionPlat,
                'pricePlat' => $request->pricePlat,
                'category_id' => $request->category_id,
            ]);
            dd("mise à jour sans image reussi");
            Redirection du user
            return redirect()
            ->route('plats.index')
            ->with(['success' => 'plats mise à avec succès dans la table']);
        }*/

        
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
                ->route('plats.index')
                ->with(['success' => 'plat supprimé avec succès']);
    }
}
