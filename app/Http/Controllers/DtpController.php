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
    public function view()
    {   
        //pada model kita panggil fungsi yang sudah kita buat sbg relationship dengan tabel lain
        $data = karyawan::with('pendidikan','pekerjaan')->get();
        return view('dashboard',compact('data'));
    }
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
        return back();
    }

    public function delete($id)
    {
        DB::table('karyawan')->where('ktp',$id)->delete();
        DB::table('pendidikan')->where('ktp',$id)->delete();
        DB::table('pekerjaan')->where('ktp',$id)->delete();
        return back();
    }

    public function edit($id)
    {
        //pada model kita panggil fungsi yang sudah kita buat sbg relationship dengan tabel lain
        $data = karyawan::with('pendidikan','pekerjaan')->get();
        return view('edit', compact('data'));
    }

    public function post_edit(Request $req, $id)
    {

        //dikarenakan khawatir nomor ktp berubah, dan mencegah tidak samanya PK dengan FK, makan data turunan dari karyawan di hapus dahulu, untuk kemudian di tulis ulang
        DB::table('pendidikan')->where('ktp',$id)->delete();
        DB::table('pekerjaan')->where('ktp',$id)->delete();

        //untuk antisipasi nomor ktp berubah, maka kita request lagi
        $no_ktp = $req->ktp;

        //proses update pada data karyawan (kecuali pendidikan dan pekerjaan)
        $edit = karyawan::findOrFail($id);
        $edit->nama = $req->nama;
        $edit->alamat = $req->alamat;
        $edit->ktp = $no_ktp;
        $edit->update();

       
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
        return redirect('edit='.$no_ktp.'');
    }
}
