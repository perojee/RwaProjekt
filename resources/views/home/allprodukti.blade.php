<!DOCTYPE html>
<html>
   <head>
     
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
   </head>
   <body>
      @include('sweetalert::alert')
    @include('home.header')
      
         
         <section class="product_section layout_padding">
           
  
  
  
  
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Filteri</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{url('pretraga')}}" method="get">
                @csrf
                <select class="boja_text_artikl" name="kategorija" id="">
                    <option value="" selected="">Odaberi kategoriju</option>
                    @foreach($kategorija as $kategorija)
                        <option value="{{$kategorija->ime_kategorije}}">{{$kategorija->ime_kategorije}}</option>
                    @endforeach
                </select>
                <div class="w-100"></div>
                <input class="mt-2 mb-2" style="height: 35px; width: 30%" type="text" placeholder="Cijena od" name="min_cijena">  KM
                <div class="w-100"></div>
                <input class="m2-2 mb-2" style="height: 35px; width: 30%" type="text" placeholder="Cijena do" name="max_cijena">  KM
                <div class="w-100"></div>
                
                <input style="height: 35px; width: 30%" type="text" value="{{$pretraga}}" placeholder="Naziv artikla" name="pretraga">
                
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" style="color: black" data-dismiss="modal">Izađi</button>
          
          <button type="submit" class="btn btn-primary"  style="color: black">Osvježi</button>
           </form>
        </div>
      </div>
    </div>
  </div>



            <div class="container">
                <div class="ml-9">
                    <button type="button" class="btn btn-success" data-toggle="modal" style="color: black" data-target="#exampleModal">Filteri</button>
                    </div>
                    
               <div class="row">
                 @foreach($artikal as $artikali)
                  <div class="col-sm-6 col-md-4 col-lg-4">
                     <div class="box">
                        <div class="option_container">
                           <div class="options">
                              <a href="{{url('detalji_artikla',$artikali->id)}}" class="option1">
                              Detalji
                              </a>
                              <form action="{{url('dodaj_kosara',$artikali->id)}}" method="post">
                                @csrf
                                <div class="row">
                                   <div class="col-md-4">
                                      <input type="number" name="kolicina" value="1" min="1" style="width: 100px">
                                   </div>
                                   <div class="col-md-4">
                                      <input type="submit" value="Dodaj u košaricu">
                                   </div>
                                </div>
                              </form>
                           </div>
                        </div>
                        <div class="img-box">
                           <img src="/artikal/{{$artikali->slika}}" alt="">
                        </div>
                        <div class="detail-box">
                           <h5>
                              {{$artikali->ime}}
                           </h5>
                           <h6>
                              {{$artikali->cijena}} KM
                           </h6>
                        </div>
                     </div>
                  </div>
                 @endforeach
                 
             </div>
             <span style="padding-top: 20px">
               {!!$artikal->withQueryString()->links('pagination::bootstrap-5')!!}
           </span>
            </div>
           <br>
         </section>
        @include('home.footer')
      
      
        <script src="{{asset('home/js/jquery-3.4.1.min.js')}}"></script>
      
        <script src="{{asset('home/js/popper.min.js')}}"></script>
        
        <script src="{{asset('home/js/bootstrap.js')}}"></script>
        
        <script src="{{asset('home/js/custom.js')}}"></script>
   </body>
</html>