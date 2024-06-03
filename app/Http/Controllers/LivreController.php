<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use App\Models\Categorie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livres = Livre::all();
        return view('index',compact('livres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create',['categories'=> Categorie::all() ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $path = $request->file('image')->store('images','public');
            dd($path);
        $livre = Livre::create([
            'titre' => $request['titre'],
            'pages' => $request['pages'],
            'description' => $request['description'],
            'categorie_id' => $request['categorie_id'],
            'image' => $path
        ]);
        return  redirect('/livres');
    }

    /**
     * Display the specified resource.
     */
    public function show(Livre $livre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livre $livre)
    {
        return view('update',compact('livre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Livre $livre)
    {
        $livre->update([
            'titre' => $request['titre'],
            'pages' => $request['pages'],
            'description' => $request['description'],
            'categorie_id' => $request['categorie_id']
        ]);
        return  redirect('/livres');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livre $livre)
    {
        $livre->categorie()->dissociate();
        $livre->delete();
        return  redirect('/livres');

    }
}
