@extends('layouts.app')

@section('content')
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
        </div>
        <br>
        <div class="col-md-12">
            <button type="submit" class="btn btn-success btn-block">Simpan</button>
        </div>
        <br>
    </div>
</form>
@endsection
