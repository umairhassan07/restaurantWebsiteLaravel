  <!-- partial:partials/_sidebar.html -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-category">Main</li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin') }}">
          <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('sliders') }}">
          <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
          <span class="menu-title">Sliders</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('about-us') }}">
          <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
          <span class="menu-title">About Us</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('our-menu') }}">
          <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
          <span class="menu-title">Our Menu</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('our-cheff') }}">
          <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
          <span class="menu-title">Our CHEFS</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('contact') }}">
          <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
          <span class="menu-title">Contact us</span>
        </a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="{{ route('reservations') }}">
          <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
          <span class="menu-title">Reservations</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('meals') }}">
          <span class="icon-bg"><i class="mdi mdi-cube menu-icon"></i></span>
          <span class="menu-title">Meals</span>
        </a>
      </li>
     
     
    
      {{-- <li class="nav-item sidebar-user-actions">
        <div class="sidebar-user-menu">
          <a href="#" class="nav-link"><i class="mdi mdi-settings menu-icon"></i>
            <span class="menu-title">Settings</span>
          </a>
        </div>
      </li> --}}
      
      <li class="nav-item sidebar-user-actions">
        <div class="sidebar-user-menu">
          <a href="#" class="nav-link"><i class="mdi mdi-logout menu-icon"></i>
            <span class="menu-title">Log Out</span></a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- partial -->