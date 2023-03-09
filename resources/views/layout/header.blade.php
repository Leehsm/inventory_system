<!-- Header -->
<header class="header trans_300">
    <!-- Top Navigation -->
    <div class="main_nav_container">
        <div class="container">
        <div class="row">
            <div class="col-lg-12 text-right">
            <div class="logo_container">
                <a href="{{ url('/') }}">Sahira<span> Inventory</span></a>
            </div>
            <nav class="navbar">
                <ul class="navbar_menu">
                <li><a href="{{ route('inventory') }}">Inventory</a></li>
                <li><a href="{{ route('skincare') }}">Skincare DB</a></li>
                <li><a href="{{ route('clothing') }}">Clothing DB</a></li>
                <li><a href="{{ route('order') }}">Order</a></li>
                </ul>
                <div class="hamburger_container">
                <i class="fa fa-bars" aria-hidden="true"></i>
                </div>
            </nav>
            </div>
        </div>
        </div>
    </div>
</header>

<div class="hamburger_menu">
    <div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
    <div class="hamburger_menu_content text-right">
      <ul class="menu_top_nav">
        <li class="menu_item"><a href="{{ route('inventory') }}">Inventory</a></li>
        <li class="menu_item"><a href="{{ route('skincare') }}">Skincare DB</a></li>
        <li class="menu_item"><a href="{{ route('clothing') }}">Clothing DB</a></li>
        <li class="menu_item"><a href="{{ route('order') }}">Order</a></li>
      </ul>
    </div>
</div>