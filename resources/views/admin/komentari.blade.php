<!DOCTYPE html>
<html lang="en">
  <head>
    @include ('admin.head')
  </head>
  <body>
    <div class="container-scroller">
    @include ('admin.sidebar')
    @include ('admin.navbar')
    <div class="main-panel">
        <div class="content-wrapper">
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
                    {{session()->get('message')}}
                    
                </div>
                @endif
            <h2 class="velicina">Komentari</h2>
            <table style="width: 100%" class="tabla">
                <tr style="height: 1px" class="th_boja">
                    <th style="width: 15%"class="">Korisnicko ime</th>
                    <th style="width: 15%"class="">Naziv artikla</th>
                    <th class="th_dizajn">Komentar</th>
                    <th style="width: 10%"class="th_dizajn">Obriši</th>
                </tr>
                @foreach($komentari as $komentari)
                <tr>
                    <td class="pt-2 pb-1">{{$komentari->ime}}</td>
                    <td class="pt-2 pb-1">{{$komentari->artikli->ime}}</td>
                    <td class="pt-2 pb-1">{{$komentari->komentar}}</td>
                    
                    <td class="pt-2 pb-1">
                        <a href="{{url('obrisi_komentar', $komentari->id)}}" class="btn btn-danger" onclick="return confirm('Da li želite izbrisati ovaj komentar?')">Obriši</a>
                    </td>
                </tr>
                @endforeach
        </div>
    </div>
    
    @include ('admin.script')
  </body>
</html>