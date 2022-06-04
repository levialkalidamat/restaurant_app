<div class="hero_area" style="background-color:black;">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{ route('base_home') }}">
            <span>
              Waîla restaurant
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  mx-auto ">
              <li class="nav-item">
              <a class="nav-link" href="{{ route('base_home') }}">Home </a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="{{ route('base_menu') }}">Menu <span class="sr-only">(current)</span> </a>
              </li>
              <li>
              <a style="color:white;" class="nav-link fa fa-shopping-cart" href="#"></a>
              </li> 
            </ul>
            @if (Route::has('login'))
              <div class="user_option">
                <form class="form-inline">
                  <input type="text">
                  <button class="" type="submit">Rechercher</button>
                </form>
                @auth
                  <a href="{{ url('/dashboard') }}" class="">Dashboard</a>
                @else
                  <a href="{{ route('login') }}">login</a>
                  @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                  @endif
                @endauth
              </div>
              @endif
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>