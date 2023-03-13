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
            <h2 class="velicina">Korisnici</h2>
            <table style="width: 100%"  class="tabla">
                <tr class="th_boja">
                    <th class="th_dizajn">Korisnicko ime</th>
                    <th class="th_dizajn">Email</th>
                    <th class="th_dizajn">Broj</th>
                    <th class="th_dizajn">Adresa</th>
                    <th class="th_dizajn">Obriši</th>
                    <th class="th_dizajn">Pošalji email</th>
                </tr>
                @foreach($korisnici as $korisnici)
                <tr>
                    <td class="pt-2 pb-1">{{$korisnici->name}}</td>
                    <td class="pt-2 pb-1">{{$korisnici->email}}</td>
                    <td class="pt-2 pb-1">{{$korisnici->phone}}</td>
                    <td class="pt-2 pb-1">{{$korisnici->address}}</td>
                    <td class="pt-2 pb-1">
                        <a href="{{url('obrisi_korisnika', $korisnici->id)}}" class="btn btn-danger" onclick="return confirm('Da li želite izbrisati ovog korisnika?')">Obriši</a>
                    </td>
                    <td class="pt-2 pb-1">
                        <a href="{{url('posalji_mail2', $korisnici->id)}}" class="btn btn-info">Pošalji email</a>
                    </td> 
                </tr>
                @endforeach
        </div>
    </div>
    
    @include ('admin.script')
  </body>
</html>