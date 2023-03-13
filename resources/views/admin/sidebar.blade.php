<div class="container-scroller">
 <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <a class="sidebar-brand brand-logo" href="{{url('/redirect')}}"><img src="/admin/assets/images/logo.png" alt="logo" /></a>
     
    </div>
    <ul class="nav">
     
      <li class="nav-item nav-category">
        <span class="nav-link">Navigacija</span>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{url('/redirect')}}">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">Naslovna</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-icon">
            <i class="mdi mdi-laptop"></i>
          </span>
          <span class="menu-title">Artikli</span>
          
        </a>
        <div id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{url('/view_artikl')}}">Dodaj artikle</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{url('/show_artikl')}}">Prikaži artikle</a></li>
            
          </ul>
        </div>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{url('view_kategorija')}}">
          <span class="menu-icon">
            <i class="mdi mdi-playlist-play"></i>
          </span>
          <span class="menu-title">Kategorija</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{url('narudzba')}}">
          <span class="menu-icon">
            <i class="mdi mdi-contacts"></i>
          </span>
          <span class="menu-title">Narudžbe</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{url('korisnici')}}">
          <span class="menu-icon">
            <i class="mdi mdi-account-box"></i>
          </span>
          <span class="menu-title">Korisnici</span>
        </a>
      </li>
      <li class="nav-item menu-items">
        <a class="nav-link" href="{{url('komentari')}}">
          <span class="menu-icon">
            <i class="mdi mdi-file-document-box"></i>
          </span>
          <span class="menu-title">Komentari</span>
        </a>
      </li>
    </div>
    
    </ul>
  </nav>
