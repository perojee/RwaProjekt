<!DOCTYPE html>
<html lang="en">
  <head>
    
    @include ('admin.head')
    <style>
        label
        {
            display: inline-block;
            width: 200px;
        }
    </style>
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
            <div class="centar_artikl">
                <h1 class="font_artikl">Uredi artikal</h1>
                <form action="{{url('/izmjeni_artikl',$artikl->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="dizajn">
                    <label>Naziv artikla : </label>
                    <input class="boja_text_artikl" type="text" name="naziv" placeholder="Napišite naziv" required="" value="{{$artikl->ime}}">
                </div>
                <div class="dizajn">
                    <label>Opis artikla : </label>
                    <input class="boja_text_artikl" type="text" name="opis" placeholder="Napišite opis" required="" value="{{$artikl->opis}}">
                </div>
                <div class="dizajn">
                    <label>Cijena artikla : </label>
                    <input class="boja_text_artikl" type="number" name="cijena" placeholder="Upišite cijenu" required="" value="{{$artikl->cijena}}">
                </div>
                <div class="dizajn"> 
                    <label>Količina artikla : </label>
                    <input class="boja_text_artikl" type="number" min="0" name="kolicina" placeholder="Upišite količinu" required="" value="{{$artikl->kolicina}}">
                </div>
                <div class="dizajn">
                    <label>Kategorija artikla : </label>
                    <select class="boja_text_artikl" name="kategorija"required="" >

                        <option value="{{$artikl->kategorija}}" selected="">{{$artikl->kategorija}}</option>
                        @foreach($kategorija as $kategorija)
                        <option value="{{$kategorija->ime_kategorije}}">{{$kategorija->ime_kategorije}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="dizajn">
                    <label>Trenutna slika artikla : </label>
                    <img height="150" width="150" style="margin:auto" src="/artikal/{{$artikl->slika}}" alt="">
                </div>
                <div class="dizajn">
                    <label>Izmjeni sliku artikla : </label>
                    <input  type="file" name="slika" value="">
                </div>
                <div class="dizajn">
                    <input type="submit" value="Ažuriraj Artikal" class="btn btn-primary">
                </div>
                </form>
            </div>
        </div>
    </div>
    @include ('admin.script')
  </body>
</html>