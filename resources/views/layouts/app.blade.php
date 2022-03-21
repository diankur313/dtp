<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

<script src="{{asset('js/app.js')}}" type="text/javascript"></script>

<script>
    $(document).ready(function(){  
                  var i=1;  
                  $('#add').click(function(){  
                       i++;  
                       $('#dynamic_field').append('<tr id="row'+i+'"><td><div class="row"><div class="col-md-3"><input type="text" name="row[]" placeholder="Nama Sekolah / Universitas" class="form-control name_list" required /></div><div class="col-md-3"><input type="text" name="row[]" placeholder="Jurusan" class="form-control name_list" required /></div><div class="col-md-3"><input type="number" name="row[]" placeholder="Tahun Masuk" class="form-control name_list" required /></div><div class="col-md-3"><input type="number" name="row[]" placeholder="Tahun Lulus" class="form-control name_list" required /></div></div></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove"><h4>-</h4></button></td></tr>');
                  });  
                  $(document).on('click', '.btn_remove', function(){  
                       var button_id = $(this).attr("id");   
                       $('#row'+button_id+'').remove();  
                  });  
    });  


    $(document).ready(function(){  
                  var i=1;  
                  $('#add2').click(function(){  
                       i++;  
                       $('#dynamic_field_2').append('<tr id="row'+i+'"><td><div class="row"><div class="col-md-3"><input type="text" name="row[][perusahaan]" placeholder="Perusahaan" class="form-control name_list" required /></div><div class="col-md-3"><input type="text" name="row[][jabatan]" placeholder="Jabatan" class="form-control name_list" required /></div><div class="col-md-3"><input type="number" name="row[][tahun]" placeholder="Tahun" class="form-control name_list" required /></div><div class="col-md-3"><input type="text" name="row[][keterangan]" placeholder="Keterangan" class="form-control name_list" required /></div></div></td><td style="border: 1px solid black; width:10px"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove"><h4>-</h4></button></td></tr>');
                  });  
                  $(document).on('click', '.btn_remove', function(){  
                       var button_id = $(this).attr("id");   
                       $('#row'+button_id+'').remove();  
                  });  
    });  
</script>

</html>
