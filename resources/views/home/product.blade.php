<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Izdvojeni <span>artikli</span>
          </h2>
       </div>
       <div class="row">
         @foreach($artikal as $artikal)
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="{{url('detalji_artikla',$artikal->id)}}" class="option1">
                      Detalji
                      </a>
                      <form action="{{url('dodaj_kosara',$artikal->id)}}" method="post">
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
                   <img src="/artikal/{{$artikal->slika}}" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      {{$artikal->ime}}
                   </h5>
                   <h6>
                      {{$artikal->cijena}} KM
                   </h6>
                </div>
             </div>
          </div>
         @endforeach
      
    </div>
 </section>