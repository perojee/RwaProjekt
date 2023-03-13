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
            <h2 class="velicina">Svi artikli</h2>
            <table style="width: 100%"  class="tabla">
                <tr class="th_boja">
                    <th class="th_dizajn">Naziv artikla</th>
                    <th class="th_dizajn">Opis</th>
                    <th class="th_dizajn">Kolicina</th>
                    <th class="th_dizajn">Kategorija</th>
                    <th class="th_dizajn">Cijena</th>
                    <th class="th_dizajn">Slika</th>
                    <th class="th_dizajn">Obriši</th>
                    <th class="th_dizajn">Uredi</th>
                </tr>
                @foreach($artikal as $artikal)
                <tr>
                    <td>{{$artikal->ime}}</td>
                    <td>{{$artikal->opis}}</td>
                    <td>{{$artikal->kolicina}}</td>
                    <td>{{$artikal->kategorija}}</td>
                    <td>{{$artikal->cijena}}</td>
                    <td>
                        <img class="vel_slika" src="/artikal/{{$artikal->slika}}">
                    </td>
                    <td>
                        <a href="{{url('obrisi_artikl', $artikal->id)}}" onclick="return confirm('Da li želite izbrisati ovaj artikal?')"class="btn btn-danger">Obriši</a>
                    </td>
                    <td>
                        <a href="{{url('uredi_artikl',$artikal->id)}}" class="btn btn-success">Uredi</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    
    @include ('admin.script')
  </body>
</html>