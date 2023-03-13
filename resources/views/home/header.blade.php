<header class="header_section">
   <style>
      body {
        font-family: Arial;
      }
      
      * {
        box-sizing: border-box;
      }
      
      form.example input[type=text] {
        padding: 10px;
        font-size: 17px;
        border: 1px solid grey;
        float: left;
        width: 80%;
        background: #f1f1f1;
      }
      
      form.example button {
        float: left;
        width: 20%;
        padding: 10px;
        background: #2196F3;
        color: white;
        font-size: 17px;
        border: 1px solid grey;
        border-left: none;
        cursor: pointer;
      }
      
      form.example button:hover {
        background: #0b7dda;
      }
      
      form.example::after {
        content: "";
        clear: both;
        display: table;
      }
      li{
         padding-top: 10px;
      }
      </style>
  <div class="container"> 
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{('/')}}"><img width="250" height="75" src="/images/logo.png" alt="#" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
        <div class="content row">
             <ul class="navbar-nav">

               <form class="example justify-content-center pt-1" action="{{'pretraga'}}" method="get" style="max-width:450px">
                  @csrf
                  
                  <input style="height: 45px" type="text" placeholder="Pretraga..." name="pretraga">
                  <button style="height: 45px;" type="submit"><i class="fa fa-search"></i></button>
                  
                </form>
                

                <li class="nav-item active">
                   <a class="nav-link" href="{{('/')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="{{'/#onama'}}">O nama</a>
               </li>
                
                <li class="nav-item">
                   <a class="nav-link" href="{{url('svi_produkti')}}">Produkti</a>
                </li>
               
                <li class="nav-item">
                   <a class="nav-link" href="{{url('pokazi_kosaru')}}">Košara</a>
                </li>

                
               
                @if (Route::has('login'))

                @auth
                <li class="nav-item">
                <x-app-layout>
    
                </x-app-layout>
                </li>
                 @else
                 
                 <div class="float-right">
                <li class="nav-item">
                    <a class="btn btn-primary" id="logincss" href="{{ route('login') }}">Prijava</a>
                 </li>
               </div>
               <div class="float-right">
                 <li class="nav-item">
                    <a class="btn btn-success" href="{{ route('register') }}">Registracija</a>
                 </li>
               </div>
                 @endauth
                 @endif
               
             </ul>
          </div>
          
       </nav>
    </div>
    
 </header>