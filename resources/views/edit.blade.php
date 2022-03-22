@extends('layouts.app')

@section('edit')
<!-- Menu post data -->
@foreach($data as $a)
    <form method="POST" action="post-edit={{$a->ktp}}">
        {{csrf_field()}}
        <div class="card">
        <div class="col-md-12">
            <br>
            <center><h4>Form Biodata</h4></center>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label>Nama:</label>
                <input type="text" class="form-control" value="{{$a->nama}}" name="nama" required >
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label>Alamat:</label>
                    <input type="text" class="form-control" name="alamat" value="{{$a->alamat}}"></input>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label>Nomor KTP:</label>
                <input type="number" class="form-control" value="{{$a->ktp}}" name="ktp" required>
                </div>
            </div>
            <br>
            <!-- Tabel Riwayat Pendidikan -->
            <div class="row">
                <div class="col-md-12">
                    <label>Riwayat Pendidikan:</label>
                    <table class="table table-bordered" id="dynamic_field_3">  
                        @foreach($a->pendidikan as $b)
                        		<tr>  
		                            <td>
		                                <div class="row">
		                                    <div class="col-md-3">
		                                        <input type="text" name="row[]" value="{{$b->nama_sekolah}}" class="form-control" placeholder="Nama Sekolah / Universitas" required>
		                                    </div>
		                                    <div class="col-md-3">
		                                        <input type="text" name="row[]" value="{{$b->jurusan}}" class="form-control" placeholder="Jurusan" required>
		                                    </div>
		                                    <div class="col-md-3">
		                                        <input type="number" name="row[]" value="{{$b->th_masuk}}" class="form-control" placeholder="Tahun Masuk" required>
		                                    </div>
		                                    <div class="col-md-3">
		                                        <input type="number" name="row[]" value="{{$b->th_lulus}}" class="form-control" placeholder="Tahun Lulus" required>
		                                    </div>
		                                </div> 
		                        </tr>  
                        @endforeach
                    </table> 
                </div>
            </div>
            <br>
            <br>
        <!-- Tabel Pengalaman Pekerjaan -->
            <div class="row">
                <div class="col-md-12">
                    <label>Pengalaman Pekerjaan:</label>
                    <table class="table table-bordered" id="dynamic_field_3">  
                        @foreach($a->pekerjaan as $c)
                        		<tr>  
		                            <td>
		                                <div class="row">
		                                    <div class="col-md-3">
		                                        <input type="text" name="row2[]" value="{{$c->perusahaan}}" class="form-control" placeholder="Nama Sekolah / Universitas" required>
		                                    </div>
		                                    <div class="col-md-3">
		                                        <input type="text" name="row2[]" value="{{$c->jabatan}}" class="form-control" placeholder="Jurusan" required>
		                                    </div>
		                                    <div class="col-md-3">
		                                        <input type="text" name="row2[]" value="{{$c->tahun}}" class="form-control" placeholder="Tahun Masuk" required>
		                                    </div>
		                                    <div class="col-md-3">
		                                        <input type="text" name="row2[]" value="{{$c->keterangan}}" class="form-control" placeholder="Keterangan">
		                                    </div>
		                                </div> 
		                        </tr>  
                        @endforeach
                    </table> 
                </div>
            </div>
            <br>
            </div>
        </div>
        <br>
        <div class="col-md-12">
            <button type="submit" class="btn btn-success btn-block">Simpan</button>
        </div>
        <br>
    </div>
</form>
@endforeach
@endsection