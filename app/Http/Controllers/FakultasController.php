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
        $data = Fakultas::when($request->search, function($query) use($request){
            $query->where('nama_fakultas', 'LIKE', '%'.$request->search.'%');
        })->paginate(10);

        return view('fakultas.index', compact('data'));
    }


    public function create()
    {
    	$fakultas = new Fakultas;
    	$fakultas->nama_fakultas = $request->nama_fakultas;
    	$fakultas->save();
        return view('/fakultas');
    }

  public function delete($id){
        $fakultas = Fakultas::findOrFail($id);
        $fakultas->delete();
        return redirect('fakultas.index');
    }

    public function store(Request $request)
    {
        Fakultas::create(['name' => $request->name]);

        return redirect()->route('fakultas.index');
    }

   
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Fakultas::find($id);

        return view('fakultas.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Fakultas::whereId($id)->update(['name' => $request->name]);

        return redirect()->route('fakultas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Fakultas::whereId($id)->delete();

        return redirect()->route('fakultas.index');
    }
}
