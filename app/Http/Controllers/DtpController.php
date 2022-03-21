<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\karyawan;
use App\pendidikan;
use App\pengalaman_kerja;
use Carbon\Carbon;

class DtpController extends Controller
{
    public function post(Request $req)
    {

    	//inisiasi data primary berdasarkan ktp
    	$no_ktp = $req->ktp;
    	
    	// input data dasar karyawan
    	$karyawan = new \App\karyawan;
    	$karyawan->nama = $req->nama;
    	$karyawan->alamat = $req->alamat;
    	$karyawan->ktp = $no_ktp;
    	$karyawan->save();

    	//input riwayat pendidikan
    	$post = $req->row;
    	for ($i=0; $i<count($post);)
    	{ 
    		$insert = array('ktp'=>$no_ktp,'nama_sekolah'=>$post[$i++],'jurusan'=> $post[$i++],'th_masuk'=> $post[$i++],'th_lulus'=> $post[$i++], 'created_at'=>Carbon::now(),'updated_at'=>Carbon::now());
    			DB::table('pendidikan')->insert($insert);
    	}

        //input pengalaman pekerjaan
        $post2 = $req->row2;
        for ($i=0; $i<count($post2);)
        { 
            $insert2 = array('ktp'=>$no_ktp,'perusahaan'=>$post2[$i++],'jabatan'=> $post2[$i++],'tahun'=> $post2[$i++],'keterangan'=> $post2[$i++],'created_at'=>Carbon::now(),'updated_at'=>Carbon::now());
                DB::table('pekerjaan')->insert($insert2);
        }
    }
}
