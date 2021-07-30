<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset ('bootstrap/css/bootstrap.css')}}">
    <title>Test PT Sinergi Mitra Groserindo | Tugas Pertama</title>
</head>
<body>
<div class="container" style="padding-top: 100px; padding-bottom: 5px; padding-left: 150px;">
<div class="card text-center " style="width: 50rem;">
  <h5 class="card-header">Tugas Pertama</h5>
  <div class="card-body">
    <h5 class="card-title">Masukan Nilai : </h5>
    <form class="card-text" action="/test/proses" method="post">
            <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
            <input class="form-control form-control-sm" name="nilai" type="number" placeholder="Masukan nilai " aria-label="masukan nilai">
            <button class="btn btn-primary btn-sm mt-4" type="submit">Jalankan Program</button>
              <h5 class="card-title mt-4">Nilai yang anda masukan adalah : {{ $nilai }} </h5>
              
              {!! $text !!}
              
              </div>
    </form>
  </div>
</div>
</div>
<script type="text/javascript" src="{{ asset ('jquery/jquery-3.6.0.slim.min.js')}}"></script>
<script type="text/javascript" src="{{ asset ('bootstrap/js/bootstrap.js')}}"></script>	
</body>
</html>