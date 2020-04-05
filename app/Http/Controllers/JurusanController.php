<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use App\Fakultas;


class JurusanController extends Controller
{
    // Admin Panel

    public function search(Request $request){
    	$fakultas = Fakultas::all();
        $search = $request->search;
        $searchFakultas = DB::table('Fakultas')
        					->select('id')
                            ->where('nama_fakultas', 'LIKE', '%'.$search.'%')
                            ->first();

        if(is_object($searchFakultas)){
            $src = get_object_vars($searchFakultas);
            $data = DB::table('Jurusan')->where('id_fakultas', '=', $src)->paginate(10);

            return view('Jurusan.index', compact('data','fakultas'));
        }
    }

    public function index(Request $request){
    	$data = Jurusan::paginate(10);
        $fakultas = Fakultas::all();

        return view('Jurusan.index', compact('data','fakultas'));
    }

    public function add(Request $request){
    	$jurusan = new Jurusan;
    	$jurusan->id_fakultas = $request->id_fakultas;
    	$jurusan->nama_jurusan = $request->nama_jurusan;
    	$jurusan->save();
    	return redirect('/jurusan');
    }

    public function delete($id){
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->delete();
        return redirect('/jurusan');
    }

    public function edit($id){
        $jurusan = Jurusan::findOrFail($id);
        $fakultas = Fakultas::all();
        return view('Jurusan.edit', compact('jurusan','fakultas'));
    }

    public function update($id, Request $request){
        $jurusan = Jurusan::find($id);
        $jurusan->id_fakultas = $request->id_fakultas;
        $jurusan->nama_jurusan = $request->nama_jurusan;
        $jurusan->save();
        return redirect('/jurusan');
    }
}
