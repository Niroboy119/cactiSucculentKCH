<div class="con">
    <div id="app">
        <nav style="position:fixed; top:0; left:0; z-index:9999; width: 100%; background: #000000; height: 80px; padding-left: 20px;" class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a style="color:#32CD32;" class="navbar-brand" href="{{ url('/') }}">
                    Cacti Succulent KCH
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link btn btn-outline-success mr-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link btn btn-outline-success" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        
    </div>
</div>

 

<div class="wrapper">

<!-- Sidebar -->
<nav id="sidebar">
    <div class="sidebar-header">
        <h4>Admin Management</h4>
    </div>

    <ul  class="list-unstyled components">
        <p>Administrator</p>
        <div>
        <li>
            <a href="/dashboard">Dashboard</a>
        </li>
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Manage Products</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="/manageProducts">View Products List</a>
                </li>
                <li>
                    <a href="/addProductForm">Add New Product</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Manage Suppliers</a>
            <ul class="collapse list-unstyled" id="pageSubmenu2">
                <li>
                    <a href="/manageSuppliers">View Suppliers List</a>
                </li>
                <li>
                    <a href="/addSupplierForm">Add New Supplier</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="/manageOrders">Manage Orders</a>
        </li>
        <li>
            <a href="adminProfile">Profile Page</a>
        </li>
    </div>
    </ul>
</nav>
