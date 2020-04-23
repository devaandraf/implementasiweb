<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Ruangan;
use App\User;
use App\Exports\BarangExport;
use Maatwebsite\Excel\Facades\Excel;


class BarangController extends Controller
{
    public function index(Request $request){

    	$barang = Barang::when($request->search, function($query) use($request){
            $query->where('nama_barang', 'LIKE', '%'.$request->search.'%');
        })->paginate(5);
        $ruangan = Ruangan::all();
        $user = User::all();

        return view('barang.index', compact('ruangan', 'barang', 'user'));
    }

    public function tambahBarang()
    {
        $barang = Barang::all();
        $ruangan = Ruangan::all();
        return view ('barang.create', compact('ruangan', 'barang'));
    }

    public function createBarang(Request $request){
        $validateData = $request->validate
        ([
            'nama_barang' => 'required|max:255',
            'total' => 'required',
            'rusak' => 'required',
            'gambar' => 'required'
        ]);

    	$barang = new Barang;
    	$barang->id_ruangan = $request->id_ruangan;
    	$barang->nama_barang = $request->nama_barang;
    	$barang->total = $request->total;
    	$barang->broken = $request->rusak;
    	$barang->created_by = $request->created_by;
        $barang->gambar = $request->gambar;
    	if ($request->hasFile('gambar')){
            $request->file('gambar')->move('img/', $request->file('gambar')->getClientOriginalName());
            $barang->gambar = $request->file('gambar')->getClientOriginalName();
            $barang->save();
        }
    	return redirect('/barang');
    }

    public function deleteBarang($id){
        $barang = Barang::find($id);
        $barang->delete();
        return redirect('/barang');
    }

    public function editBarang($id){
        $barang = Barang::find($id);
        $ruangan = Ruangan::all();
        return view('barang.edit', compact('ruangan', 'barang'));
    }

    public function updateBarang($id, Request $request){
        $validateData = $request->validate
        ([
            'nama_barang' => 'required|max:255',
            'total' => 'required',
            'rusak' => 'required',
            'gambar' => 'required'
        ]);
        
        $barang = Barang::find($id);
        $barang->id_ruangan = $request->id_ruangan;
        $barang->nama_barang = $request->nama_barang;
        $barang->total = $request->total;
        $barang->broken = $request->rusak;
        $barang->created_by = $request->created_by;
        $barang->updated_by = $request->updated_by;
        $barang->gambar = $request->gambar;
        if ($request->hasFile('gambar')){
            $request->file('gambar')->move('img/', $request->file('gambar')->getClientOriginalName());
            $barang->gambar = $request->file('gambar')->getClientOriginalName();
            $barang->save();
        }

        return redirect('/barang');
    }

    public function export()
    {
        return Excel::download(new BarangExport, 'barang.xlsx');
    }
}
