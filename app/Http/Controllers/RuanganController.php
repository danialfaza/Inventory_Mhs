<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ruangan;
use App\Jurusan;

class RuanganController extends Controller
{
    public function index(Request $request){

    	$ruangan = Ruangan::when($request->search, function($query) use($request){
            $query->where('nama_ruangan', 'LIKE', '%'.$request->search.'%');
        })->paginate(5);
        $jurusan = Jurusan::all();

        return view('ruangan.index', compact('ruangan', 'jurusan'));
    }

     public function tambahRuangan()
    {
        $jurusan = Jurusan::all();
        $ruangan = Ruangan::all();
        return view ('ruangan.create', compact('ruangan', 'jurusan'));
    }

    public function createRuangan(Request $request){
    	$ruangan = new Ruangan;
    	$ruangan->id_jurusan = $request->id_jurusan;
    	$ruangan->nama_ruangan = $request->nama_ruangan;
    	$ruangan->save();
    	return redirect('/ruangan');
    }

    public function deleteRuangan($id){
        $ruangan = Ruangan::find($id);
        $ruangan->delete();
        return redirect('/ruangan');
    }

    public function editRuangan($id){
        $ruangan = Ruangan::find($id);
        $jurusan = Jurusan::all();
        return view('ruangan.edit', compact('ruangan', 'jurusan'));
    }

    public function updateRuangan($id, Request $request){
        $ruangan = Ruangan::find($id);
        $ruangan->id_jurusan = $request->id_jurusan;
        $ruangan->nama_ruangan = $request->nama_ruangan;
        $ruangan->save();
        return redirect('/ruangan');
    }}
