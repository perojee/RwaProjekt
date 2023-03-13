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
            <h1 style="text-align: center; font-size: 25px"> Pošalji email za {{$order->email}} </h1>
           
            <form action="{{url('posalji_korisniku_email', $order->id)}}" method="post" name="saljiemail">
                @csrf
                <div class="d-flex">
                <div style="padding-left: 5%; padding-top: 40px">
                  @if($order->dostava_status == "Odobreno")
                <textarea name="saljiemail" id="saljiemail" style="height: 600px; width: 750px; color: black">Poštovani,


Vaša narudzba je odobrena!

Korisnik: {{$order->ime}}
Adresa: {{$order->adresa}}

Zahvaljujemo se na povjerenju!
Vaš Web Store.

Matice hrvatske bb,
Mostar 88000.
                  @elseif($order->dostava_status == "Poništeno")
                  <textarea name="saljiemail" id="saljiemail" style="height: 600px; width: 750px; color: black">Poštovani,


Nažalost vaša narudžba nije odobrena.
Izvinjavamo se radi neuspjeha te se nadamo da ćete ostati sa nama.

Online web store,
Matice hrvatske bb,
Mostar 88000.
                  @else
                  <textarea name="saljiemail" id="saljiemail" style="height: 600px; width: 750px; color: black">
                  @endif
                </textarea>
                <div class="">
                <input type="submit" value="Pošalji" class="btn btn-primary">
                </div>
                </div>
              </div>
            </form>
        </div>
    </div>
        
    
    
    @include ('admin.script')
  </body>
</html>