<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Ruangan;
use App\User;

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

         $this->validate($request, [
            'id_ruangan' => 'required|max:255',
            'total' => 'required',
            'rusak' => 'required',
            'gambar' => 'required'
        ]);

        $upgambar = 'barang-'.date('Ymdhis').'.'.$request->gambar->getClientOriginalExtension();
        $request->gambar->move('img/', $upgambar);

    
    	$barang = new Barang;
    	$barang->id_ruangan = $request->id_ruangan;
    	$barang->nama_barang = $request->nama_barang;
    	$barang->total = $request->total;
    	$barang->broken = $request->rusak;
        $barang->gambar =  $upgambar;
    	$barang->created_by = $request->created_by;
    	
        $barang->save();

        
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

         $this->validate($request, [
            'id_ruangan' => 'required|max:255',
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
        if( $request->gambar){
            $upgambar = 'barang-'.date('Ymdhis').'.'.$request->gambar->getClientOriginalExtension();
            $request->gambar->move('img/', $upgambar);
            $barang->gambar = $upgambar;
        }
        $barang->save();
        
        return redirect('/barang');
    }
}
