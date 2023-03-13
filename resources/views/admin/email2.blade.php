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
            <h1 style="text-align: center; font-size: 25px"> Pošalji email za {{$korisnik->email}} </h1>
           
            <form action="{{url('posalji_korisniku_email2', $korisnik->id)}}" method="post" name="saljiemail">
                @csrf
                <div class="d-flex">
                <div style="padding-left: 5%; padding-top: 40px">
                  <textarea name="saljiemail" id="saljiemail" style="height: 600px; width: 750px; color: black"></textarea>
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