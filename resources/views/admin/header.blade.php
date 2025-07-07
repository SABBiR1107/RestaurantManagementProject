<header class="header">   
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex align-items-center justify-content-between">
          <div class="navbar-header">
            <!-- Navbar Header--><a href="{{ url('home') }}" class="navbar-brand">
              <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary" href="{{ url('home') }}">Admin</strong></div>
              <div class="brand-text brand-sm"><strong class="text-primary">D</strong><strong>A</strong></div></a>
            <!-- Sidebar Toggle Btn-->
            <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
          </div>
          <div class="right-menu list-inline no-margin-bottom">    
            <!-- Log out               -->
            <div class="list-inline-item logout">
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <input class="btn btn-primary" type="submit" value="logout">
                </form>
            </div>
          </div>
        </div>
      </nav>
    </header>