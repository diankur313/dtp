<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengalaman_kerja extends Model
{
    protected $table='kerja';
    protected $primaryKey = 'id';
    protected $fillable = [
    						'perusahaan',
    						'jabatan',
    						'tahun',
    						'keterangan'
    					  ];
}
