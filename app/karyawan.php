<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    protected $table ='karyawan';
    protected $primaryKey = 'ktp';


	public function pendidikan()
	{
		return $this->hasOne('App\pendidikan','ktp');
	}

	public function pekerjaan()
	{
		return $this->hasOne('App\pengalaman_kerja','ktp');
	}

}
