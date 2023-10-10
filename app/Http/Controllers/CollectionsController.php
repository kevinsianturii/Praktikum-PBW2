<?php

namespace App\Http\Controllers;

use App\Models\Collections;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return\Illuminate\Http\Response
     */
    public function index()
    {
        //
        $collection = Collections::all();
        return view('koleksi.daftarKoleksi', compact('collection'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('koleksi.registrasi');
    }

    /**
     * Store a newly created resource in storage.
     *@return\Illuminate\Http\Request
     *@return\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 6706220055_Kevin Sianturi_4604
        $validated = $request->validate([
            'namaKoleksi'=> ['required', 'string', 'max:100'],
            'jenisKoleksi'=> ['required', 'integer'],
            'jumlahKoleksi'=> ['required', 'integer',],
        ]);
        $koleksi = new Collections();
        $koleksi->namaKoleksi = $validated['namaKoleksi'];
        $koleksi->jenisKoleksi = $validated['jenisKoleksi'];
        $koleksi->jumlahKoleksi = $validated['jumlahKoleksi'];

        $koleksi->save();
        return redirect('/koleksi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Collections $collection)
    {
        //
        return view('koleksi.infoKoleksi',compact('collection'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Collections $collections)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Collections $collections)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collections $collections)
    {
        //
    }
}
