<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\Supplier;
use DB;

class ApiController extends Controller
{
    public function supplier()
    {
        $supplier = Supplier::all();
        // return view('admin.supplier.index', compact('supplier'));

        //Ubah Json
        return response()->json([
            'success' => true,
            'message' => 'List Data Supplier',
            'data' => $supplier,
        ], 200);

    }

    public function barang()
    {
        // $artikel = Article::with('category')->get();
        $barang = DB::table('barangs')
            ->join('suppliers', 'barangs.id_supplier', '=', 'suppliers.id')
            ->select('barangs.nama_barang', 'barangs.jumlah_stok', 'suppliers.nama_supplier as suppliers')
            ->get();
        return response()->json([
            'success' => true,
            'message' => 'data barang',
            'data' => $barang,
        ], 200);
    }

}
