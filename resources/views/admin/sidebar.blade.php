<div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="admin/img/admin-logo.png" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">The Velvet Spoon</h1>
            <p>Admin Pannel</p>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Side Bar</span>
        <ul class="list-unstyled">
                <li class="active"><a href="{{ url('home') }}"> <i class="icon-home"></i>Home </a></li>
                <li>
    <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse">
        <i class="icon-chart"></i> Food
    </a>
    <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
        <li>
            <a href="{{ url('add_food') }}">
                <i class="fa fa-plus-circle"></i> Add Food
            </a>
        </li>
        <li>
            <a href="{{ url('view_food') }}">
                <i class="fa fa-eye"></i> View Food
            </a>
        </li>
    </ul>
</li>
                <li><a href="{{ url('orders') }}"> <i class="fa fa-shopping-cart"></i> Orders </a></li>
                <li><a href="{{ url('reservations') }}"> <i class="fa fa-users"></i> Reservations </a></li>
       
      </nav>
      <!-- Sidebar Navigation end-->