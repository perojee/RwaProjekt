<!DOCTYPE html>
<html>
   <head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}" type="">
    <title>Projekt</title>
    
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.css')}}" />
    
    <link href="{{asset('home/css/font-awesome.min.css')}}" rel="stylesheet" />
    
    <link href="{{asset('home/css/style.css')}}" rel="stylesheet" />
    
    <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet" />
      <style>
        body{
    margin-top:20px;
    background:#eee;
}
.ui-w-40 {
    width: 40px !important;
    height: auto;
}

.card{
    box-shadow: 0 1px 15px 1px rgba(52,40,104,.08);    
}

.ui-product-color {
    display: inline-block;
    overflow: hidden;
    margin: .144em;
    width: .875rem;
    height: .875rem;
    border-radius: 10rem;
    -webkit-box-shadow: 0 0 0 1px rgba(0,0,0,0.15) inset;
    box-shadow: 0 0 0 1px rgba(0,0,0,0.15) inset;
    vertical-align: middle;
}
      </style>
   </head>
   <body>
    @include('home.header')
    <div class="container px-3 my-5 clearfix">
        @if(!(empty($cart)))
        <div class="card">
            <div class="card-header">
                <h2 style="font-size: 20px">Košarica</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered m-0">
                    <thead>
                      <tr>
                        <th class="text-center py-3 px-4" style="min-width: 400px;">Naziv</th>
                        <th class="text-center py-3 px-4" style="width: 120px;">Količina</th>
                        <th class="text-right py-3 px-4" style="width: 140px;">Cijena</th>
                        <th class="text-center align-middle py-3 px-0" style="width: 40px;"><a href="#" class="shop-tooltip float-none text-light" title="" data-original-title="Clear cart"><i class="ino ion-md-trash"></i></a></th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                            $total=0;

                         ?>
                        @foreach ($cart as $cart)
                      <tr>
                        <td class="p-4">
                          <div class="media align-items-center">
                            <img src="/artikal/{{$cart->slika}}" class="d-block ui-w-40 ui-bordered mr-4" alt="">
                            <div class="media-body">
                              <a href="{{url('detalji_artikla',$cart->artikal_id)}}" class="d-block text-dark">{{$cart->naziv_artikla}}</a>
                              
                            </div>
                          </div>
                        </td>
                        
                        <td class="align-middle p-4">{{$cart->kolicina}}</td>
                        <td class="text-right font-weight-semibold align-middle p-4">{{$cart->cijena}} KM</td>
                        <td class="text-center align-middle px-0"><a href="{{url('obrisi_kosara', $cart->id)}}" onclick="obrisi(event)" class="shop-tooltip close float-none text-danger" title="" data-original-title="Remove">×</a></td>
                      </tr>
                      <?php
                      $total=$total + $cart->cijena;
                      
                      ?>
                     @endforeach
                    
                    </tbody>
                  </table>
                </div>
                
        
                <div class="d-flex flex-wrap justify-content-end align-items-right pb-4">
                  
                  
                    <div class="text-right mt-4 align-items-right">
                      <label class="text-muted font-weight-normal m-0 " >Ukupno: </label>
                      <div class="text-large"><strong>{{$total}} KM</strong></div>
                
          
                    </div>
                  </div>
                
            
                    <div class="float-right  align-items-right">
                        <button type="button" class="btn btn-primary" style="color: black" data-toggle="modal" data-target="#exampleModal">Naruči</button>
                    </div>
                    <div class="text-right mt-12 align-items-right">
                      <h3 style="font-size: 14px">(Plaćanje pri preuzimanju)</h3>
                    </div>
                </div>
              </div>
          </div>
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Potvrdi narudžbu</h5>
                  <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                @if(!(empty($cart->address)))
                <div class="modal-body mt-7" style="font-size: 14px">Adressa: </div>
                <div class="modal-body" >{{$cart->address}}</div>
                <div class="modal-body mt-7" style="font-size: 14px">Ukupno: </div>
                <div class="modal-body" >{{$total}} KM</div>
                <div class="modal-body mt-7" style="font-size: 14px">Način plaćanja: </div>
                <div class="modal-body">Plaćanje pri preuzimanju </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary"  style="color: black"data-dismiss="modal">Izađi</button>
                  <a type="button" href="{{url('naruci')}}" class="btn btn-primary" style="color: black">Potvrdi</a>
                </div>
              </div>
            </div>
            @endif
          </div>
      </div>
      </div>
    
     
          
      @else
      
          
    
          
      
      @endif
    </div>
    </div>
      
        @include('home.footer')
        <script>
          function obrisi(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');  
            console.log(urlToRedirect); 
            swal({
                title: "Da li želite izbrisati ovaj artikal iz košarice?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                buttons: ['Otkaži', 'Izbriši']
            })
            .then((willCancel) => {
                if (willCancel) {
    
    
                     
                    window.location.href = urlToRedirect;
                   
                }  
    
    
            });
    
            
        }
    </script>
      
      <script src="{{asset('home/js/jquery-3.4.1.min.js')}}"></script>
      
      <script src="{{asset('home/js/popper.min.js')}}"></script>
      
      <script src="{{asset('home/js/bootstrap.js')}}"></script>
      
      <script src="{{asset('home/js/custom.js')}}"></script>
   </body>
</html>