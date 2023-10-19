<?php
namespace App\Http\Controllers;

use App\Models\Collections;
use App\Http\Requests\UpdateCollectionRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\CollectionsDataTable;


class CollectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CollectionsDataTable $dataTable)
    {
        return $dataTable->render('koleksi.daftarKoleksi');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("koleksi.registrasi");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaKoleksi' => ['required', 'string', 'max:100'],
            'jenisKoleksi' => ['required', 'numeric', 'in:1,2,3'],
            'jumlahKoleksi' => ['required', 'integer'],
        ]);
    
        $collection = Collections::create([
            'namaKoleksi' => $request->namaKoleksi,
            'jenisKoleksi' => $request->jenisKoleksi,
            'jumlahKoleksi' => $request->jumlahKoleksi,
        ]);

        return redirect()->route("koleksi.daftarKoleksi");
    }

    /**
     * Display the specified resource.
     */
    public function show(Collections $collection)
    {
        return view("koleksi.infoKoleksi", compact('collection'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Collections $collection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCollectionRequest $request, Collections $collection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collections $collection)
    {
        //
    }
}
