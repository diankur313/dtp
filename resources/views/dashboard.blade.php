@extends('layouts.app')

@section('content')
<!-- Menu post data -->
    <form method="POST" action="{{url('post-data')}}">
        {{csrf_field()}}
        <div class="card">
        <div class="col-md-12">
            <br>
            <center><h4>Form Biodata</h4></center>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label>Nama:</label>
                <input type="text" class="form-control" name="nama" required >
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label>Alamat:</label>
                    <textarea type="text" class="form-control" name="alamat" rows="3" ></textarea>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <label>Nomor KTP:</label>
                <input type="number" class="form-control" name="ktp" required>
                </div>
            </div>
            <br>
            <!-- Tabel Riwayat Pendidikan -->
            <div class="row">
                <div class="col-md-12">
                    <label>Riwayat Pendidikan:</label>
                    <table class="table table-bordered" id="dynamic_field">  
                        <tr>  
                            <td>
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" name="row[]" class="form-control" placeholder="Nama Sekolah / Universitas" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="row[]" class="form-control" placeholder="Jurusan" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="row[]" class="form-control" placeholder="Tahun Masuk" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="row[]" class="form-control" placeholder="Tahun Lulus" required>
                                    </div>
                                </div>
                            </td>  
                            <td><button type="button" name="add" id="add" class="btn btn-success"><h2>+</h2></button></td>  
                        </tr>  
                    </table> 
                </div>
            </div>
            <br>
            <br>
        <!-- Tabel Pengalaman Pekerjaan -->
            <div class="row">
                <div class="col-md-12">
                    <label>Pengalaman Pekerjaan:</label>
                    <table class="table table-bordered" id="dynamic_field_2">  
                        <tr>  
                            <td>
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="text" name="row2[]" class="form-control" placeholder="Perusahaan" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="row2[]" class="form-control" placeholder="Jabatan" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="number" name="row2[]" class="form-control" placeholder="Tahun" required>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="row2[]" class="form-control" placeholder="Keterangan">
                                    </div>
                                </div>
                            </td>  
                            <td><button type="button" name="add" id="add2" class="btn btn-success"><h2>+</h2></button></td>  
                        </tr>  
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

<!-- View data dari DB -->
@foreach($data as $a)
    <div class="card" style="margin-bottom: 2%">
        <div class="col-md-12" style="margin-top: 1%;">
            <h3><p><center>Biodata Karyawan</center></p></h3>
            <h5><p>Nama: {{$a->nama}}</p></h5>
            <h5><p>Alamat: {{$a->alamat}}</p></h5>
            <h5><p>No. KTP: {{$a->ktp}}</p></h5>
            <h5><p>Pendidikan:</p></h5>
            <table class="table table-bordered table-hover dataTable no-footer" role="grid" style="width:100%;">
                <thead>
                    <tr class="warning">
                        <th><center>Nama Sekolah / Universitas</center></th>
                        <th><center>Jurusan</center></th>
                        <th><center>Tahun Masuk</center></th>
                        <th><center>Tahun Lulus</center></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($a->pendidikan as $b)
                        <tr>
                            <td>{{$b->nama_sekolah}}</td>
                            <td>{{$b->jurusan}}</td>
                            <td>{{$b->th_masuk}}</td>
                            <td>{{$b->th_lulus}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <h5><p>Pengalaman Kerja:</p></h5>
            <table class="table table-bordered table-hover dataTable no-footer" role="grid" style="width:100%;">
                <thead>
                    <tr class="warning">
                        <th><center>Perusahaan</center></th>
                        <th><center>Jabatan</center></th>
                        <th><center>Tahun</center></th>
                        <th><center>Keterangan</center></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($a->pekerjaan as $c)
                            <tr>
                                <td>{{$c->perusahaan}}</td>
                                <td>{{$c->jabatan}}</td>
                                <td>{{$c->tahun}}</td>
                                <td>{{$c->keterangan}}</td>
                            </tr>
                        @endforeach
                    </tr>
                </tbody>
            </table>
             <div class="row">
                <!-- Form untuk menghapus data-->
                <form action="delete={{$a->ktp}}" id="delete{{$a->ktp}}" method="POST">{{csrf_field()}}</form>
                <div class="col-md-6">
                    <a type="button" href="edit={{$a->ktp}}" class="btn btn-info btn-block">Edit</a>
                </div>
                <div class="col-md-6">
                    <button type="submit" form="delete{{$a->ktp}}" class="btn btn-danger btn-block">Hapus</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection
