<?php
namespace App\Http\Controllers;

use App\Models\Collections;
use Illuminate\Http\Request;
use App\DataTables\CollectionsDataTable;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

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

        $collection->save();

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
        return view("koleksi.editKoleksi", compact("collection"));
    }
    // 6706220055_Kevin Sianturi_4604 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Collections $collection)
    {
        $validatedData = $request->validate([
            'namaKoleksi' => ['required', 'string', 'max:100'],
            'jenisKoleksi' => ['required', 'numeric', 'in:1,2,3'],
            'jumlahKoleksi' => ['required', 'integer'],
        ]);

        $collection->update($request->except(['token_']));

        return redirect()->route('koleksi.infoKoleksi', $collection->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Collections $collection)
    {
        //
    }

    public function getAllCollection(){
        $collections = DB::table('collections')
        ->select('id as id', 'nama as judul', DB::raw('
            CASE
                WHEN jenis="1" THEN "Buku"
                WHEN jenis="1" THEN "Majalah"
                WHEN jenis="1" THEN "Cakram Digital"
            END AS jenis'), 'jumlah as jumlah')
            ->orderBy('nama', 'asc')
            ->get();

        return DataTables::of($collections)
        -> addColumn('action', function ($collection){
            $html = '
            <button data-rowid="" class="btn btn-primary" data-toogle="tooltip" data-placements="top"
            data-container="body" title="Edit Koleksi" onclick="infoKoleksi('."'".$collection->id."'".')">

            <i class="fa fa-edit"></i>
            ';
            return $html;
        })
        ->make(true);
}
}