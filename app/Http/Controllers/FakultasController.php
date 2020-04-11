<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fakultas;

class FakultasController extends Controller
{
    public function index(Request $request)
    {
        //pagination
        // numbering
        $fakultas = Fakultas::when($request->search, function($query) use($request){
            $query->where('nama_fakultas', 'LIKE', '%'.$request->search. '%');
        })->paginate(5);

        return view('fakultas.index', compact('fakultas'));
    }

    public function tambahFakultas()
    {
        return view ('fakultas.create');
    }

    public function createFakultas(Request $request)
    {
        Fakultas::create([
            'nama_fakultas' => $request->nama_fakultas
        ]);

        return redirect('fakultas');
    }

    public function editFakultas($id)
    {
        $fakultas = Fakultas::find($id);

        return view('fakultas.edit', compact('fakultas'));
    }

    public function updateFakultas($id, Request $request)
    {
        $fakultas = Fakultas::find($id);
        $fakultas->nama_fakultas = $request->nama_fakultas;
        $fakultas->save();

        return redirect('fakultas');
    }

    public function deleteFakultas($id)
    {
        $fakultas = Fakultas::find($id);
        $fakultas->delete($fakultas);

        return redirect('fakultas');
    }

}
