<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use App\Fakultas;
use DB;

class JurusanController extends Controller
{
    public function search(Request $request)
    {
        $fakultas = Fakultas::all();
        $search = $request->search;
        $searchFakultas = DB::table('fakultas')
                            ->select('id')
                            ->where('nama_fakultas', 'LIKE', '%'.$search.'%')
                            ->first();

        if(is_object($searchFakultas)){
            $src = get_object_vars($searchFakultas);
            $data = DB::table('Jurusan')->where('id_fakultas', '=', $src)->paginate(10);

            return view('jurusan.index', compact('data','fakultas'));
        }
    }

    public function index(Request $request){
        $data = Jurusan::paginate(10);
        $fakultas = Fakultas::all();

        return view('jurusan.index', compact('data','fakultas'));
    }

    public function tambahJurusan()
    {
        $fakultas = Fakultas::all();
        return view ('jurusan.create', compact('fakultas'));
    }

    public function createJurusan(Request $request)
    {
        Jurusan::create([
            'nama_jurusan' => $request->nama_jurusan,
            'id_fakultas' => $request->id_fakultas
        ]);

        return redirect('jurusan');
    }

    public function editJurusan($id)
    {
        $fakultas = Fakultas::all();
        $jurusan = Jurusan::find($id);

        return view('jurusan.edit', compact('jurusan', 'fakultas'));
    }

    public function updateJurusan($id, Request $request)
    {
        $jurusan = Jurusan::find($id);
        $jurusan->id_fakultas = $request->id_fakultas;
        $jurusan->nama_jurusan = $request->nama_jurusan;
        $jurusan->save();

        return redirect('jurusan');
    }

    public function deleteJurusan($id)
    {
        $jurusan = Jurusan::find($id);
        $jurusan->delete($jurusan);

        return redirect('jurusan');
    }
}
