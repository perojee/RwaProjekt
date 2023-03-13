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
            <h1 class="h1_dizajn">Narudžbe</h1>
            <div class="d-flex justify-content-center pb-4">
              <form action="{{url('search_order')}}" method="get">
                @csrf
                <input type="text" style="color: black" name="search" placeholder="Pretraga">
                <input type="submit" value="Pretraga" class="btn btn-primary">
              </form>
            </div>
            <table class="table_deg">
                <tr style="background: skyblue">
                    <th style="padding: 10px">Ime</th>
                    <th style="padding: 10px">Email</th>
                    <th style="padding: 10px">Adresa</th>
                    <th style="padding: 10px">Broj</th>
                    <th style="padding: 10px">Artikal</th>
                    <th style="padding: 10px; width:1px">Kolicina</th>
                    <th style="padding: 10px">Cijena</th>
                    <th style="padding: 10px">Status dostave</th>
                    <th style="padding: 10px">Slika</th>
                    <th style="padding: 10px">Naredba</th>
                

                </tr>
                @forelse($order as $order)
                <tr>
                    <td>{{$order->ime}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->adresa}}</td>
                    <td>{{$order->broj}}</td>
                    <td>{{$order->naziv_artikla}}</td>
                    <td>{{$order->kolicina}}</td>
                    <td>{{$order->cijena}}</td>
                    <td>{{$order->dostava_status}}</td>
                    <td><img src="/artikal/{{$order->slika}}" style="height: 130px; width: 150px" alt=""></td>
                    <td>
                        @if($order->dostava_status == "Procesiranje")
                        <a href="{{url('odobreno', $order->id)}}" onclick="return confirm('Da li želite odobriti ovaj zahtjev i poslati artikal u dostavu?')" class="btn btn-primary">Odobri</a>
                        <a href="{{url('odbijeno', $order->id)}}" onclick="return confirm('Da li želite poništiti ovaj zahtjev?')"class="btn btn-danger">Odbij</a>
                        @else
                        <a href="{{url('posalji_mail', $order->id)}}" class="btn btn-info">Pošalji mail</a>
                        @endif
                    </td>

                </tr>
                @empty
                <div>
                  <tr>
                    <td colspan="16">Ne postoje upisani podaci</td>
                  </tr>
                </div>
                @endforelse
            </table>
        </div>
    </div>
    @include ('admin.script')
  </body>
</html>