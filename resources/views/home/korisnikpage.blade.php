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
         @if(session()->has('message'))
         <div class="alert alert-success alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-label="close">&times;</button>
             {{session()->get('message')}}
             
         </div>
         @endif
         @include('home.pocetna')
         
         @include('home.product')

         
  
         @include('home.o_nama')
      
        @include('home.footer')
      
      


      </div>
        <script>
         document.addEventListener("DOMContentLoaded", function(event) { 
             var scrollpos = localStorage.getItem('scrollpos');
             if (scrollpos) window.scrollTo(0, scrollpos);
         });
 
         window.onbeforeunload = function(e) {
             localStorage.setItem('scrollpos', window.scrollY);
         };
     </script>
         
         <script src="{{asset('home/js/jquery-3.4.1.min.js')}}"></script>
      
         <script src="{{asset('home/js/popper.min.js')}}"></script>
         
         <script src="{{asset('home/js/bootstrap.js')}}"></script>
         
         <script src="{{asset('home/js/custom.js')}}"></script>
   </body>
</html>