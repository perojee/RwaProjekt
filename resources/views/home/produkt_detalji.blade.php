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
      <div class="hero_area">
         @include('home.header')
        
         <div class="img-box">
            <div class="row">
           <div style= "margin-left: 10%; width= 50%; padding: 30px; float: left">
           
              <img src="/artikal/{{$artikal->slika}}" width="550px" height="500px"alt="">
            </div>
            </div>
           <div class="flex-row" style="padding-left: 35px"> 
              <h1 style="font-size: 30px">{{$artikal->ime}}</h1>
              <h6>Kategorija: {{$artikal->kategorija}}</h6>
              <h6>Opis: {{$artikal->opis}}</h6>
              <h6>Dostupna količina: {{$artikal->kolicina}}</h6>
              <br>
              <h5>{{$artikal->cijena}} KM</h5>
           </div>
              <form action="{{url('dodaj_kosara',$artikal->id)}}" method="post">
               @csrf
               <div class="d-flex flex-row" style="padding-top: 30px; padding-bottom: 30px; padding-left: 30px">
                  <div class="p-2">
                     <input type="number" name="kolicina" value="1" min="1" style="width: 100px">
                  </div>
                     <div class="p-2">
                     <input type="submit" value="Dodaj u košaricu">
                  </div>
                  </div>
               </div>
             </form>
             
            
            </div>
            
           </div>
        </div>
        <div class="detail-box" style="padding-left: 30px">
        <div class="ml-9 pt-7 float-left" style="font-size: 20px">Komentari za {{$artikal->ime}}</div>
        <form action="{{url('komentiraj', $artikal->id)}}" method="post">
         @csrf
         <div class="col-md-4">
            <textarea placeholder="Upišite komentar" autocapitalize="off" name="komentar" style="height: 150px; width: 450px"></textarea>
            <div class="pb-3">
               <input type="submit" value="Komentiraj" class="btn btn-primary">
            </div>
         </div>
        </form>
        <div class="box pl-9">
            <div>
               @foreach($komentar as $komentar)
               <div class="row">
               <strong>{{$komentar->ime}}</strong> <div class="pl-3 justify-content-center" style="font-size: 80%">{{$komentar->created_at}}</div>
               </div>
                  <div class="col-md-4 pb-9">
                     {{$komentar->komentar}}
                  </div>  
            </div>
            
            @endforeach
            
        </div>
      </div>
      </div>
      
     
    </div>
        @include('home.footer')
      
      
        <script src="{{asset('home/js/jquery-3.4.1.min.js')}}"></script>
      
        <script src="{{asset('home/js/popper.min.js')}}"></script>
        
        <script src="{{asset('home/js/bootstrap.js')}}"></script>
        
        <script src="{{asset('home/js/custom.js')}}"></script>
   </body>
</html>