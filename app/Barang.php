<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ruangan;


class Barang extends Model
{
    protected $table = 'barang';
    protected $fillable = ['id_ruangan', 'nama_barang', 'total', 'broken', 'created_by', 'updated_by','gambar'];

    public function ruangan()
    {
    	return $this->belongsTo(Ruangan::class, 'id_ruangan');
    }
    public function getGambar()
    {
    	if(!$this->gambar){
    		return asset('img/millos.jpg');
    	}
    	return asset('img/'.$this->gambar);
    }
}
