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
                <div class="div_center">
                    <h2 class="h2font">Dodaj kategoriju </h2>
                    <form action="{{url('/dodaj_kategoriju')}}" method="POST">
                        @csrf
                        <input type="text" class="input_boja" name="kategorija" placeholder="Upišite ime kategorije">
                        <input type="submit" class="btn btn-primary" name="submit" value="Dodaj kategoriju">
                    </form>
                </div>
                <table class="centar">
                  <tr>
                    <td>Ime kategorije</td>
                    <td>Naredba</td>
                  </tr>
                  @foreach($data as $data)
                  <tr>
                    <td>{{$data->ime_kategorije}}</td>
                    <td><a onclick="return confirm('Da li želite obrisati ovu kategoriju?')"class ="btn btn-danger"href="{{url('obrisi_kategoriju', $data->id)}}">Obriši</a></td>
                  </tr>
                  @endforeach
                </table>
            </div>
       </div>
    @include ('admin.script')
  </body>
</html>