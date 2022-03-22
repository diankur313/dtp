<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pendidikan extends Model
{
    protected $table = 'pendidikan';
    protected $primaryKey = 'id';
    protected $fillable = [
    						'nama_sekolah',
    						'jurusan',
    						'th_masuk',
    						'th_lulus',
    		
    					  ];
}
