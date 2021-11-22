<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="{{ asset('css/viewProductsAdmin.css') }}" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div class="con">
    <div id="app">
        <nav style="position:fixed; top:0; left:0; z-index:9999; width: 100%; background: #000000; height: 80px; padding-left: 20px;" class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div    class="container">
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

 <!-- jQuery CDN - Slim version (=without AJAX) -->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <link href="{{ asset('sass/test.css') }}" rel="stylesheet">


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
                <a href="#">Dashboard</a>
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
                <a href="#">Manage Orders</a>
            </li>
            <li>
                <a href="#">Profile Page</a>
            </li>
        </div>
        </ul>
    </nav>

<!-- Page Content -->


<?php
use App\Models\Product;
$products=Product::all();
?>

<div class="combine">
<br><br> 

<div class="d-flex justify-content-center h-100">
    <div style="margin-left:100px;" class="search"> <input  onchange="searchProduct()" id="searchBar" style=" padding-right:750px; padding-bottom:6px; padding-top:4px;" type="text" class="search-input" placeholder="Enter Product Name...." name=""> <button style="border-color:#32CD32; color:#32CD32;" onclick="searchProduct2()" type="button" onmouseover="this.style.background='#32CD32'; this.style.color='white';"  onmouseout="this.style.background='white'; this.style.color='#32CD32';" class="btn btn-outline-primary">Search Product</button> <i class="fa fa-search"></i> </a> </div>
</div>

<br>

<script type="text/javascript">
    window.scrollTo(0, 0);
function searchProduct()
{
    var link= "/searchProducts/"+document.getElementById("searchBar").value;
    document.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            location.replace(link);
        }
    });
}

function searchProduct2()
{
    var link= "/searchProducts/"+document.getElementById("searchBar").value;
    if(document.getElementById("searchBar").value!="")
    {
        location.replace(link);
    }
}
</script>


<div style="margin-left=-120px;" class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
            @foreach($products as $product)
            <div class="row p-2 bg-white border rounded">
                <div class="col-md-3 mt-1"><img  style="width:300px; height: 150px;" class="img-fluid img-responsive rounded product-image" src="{{URL::asset('storage/images/products/'.$product->Product_Image)}}"></div>
                <div class="col-md-6 mt-1">
                    <h4>{{$product->Product_Name}}</h4>
                    <div class="mt-1 mb-1 spec-1"><span style="font-size:17px;">Type Of {{$product->Product_Type}}</span><span style="background:#32CD32" class="dot"></span><span style="font-size:17px;">${{$product->Product_Price}}</div>
                    <div class="mt-1 mb-1 spec-1"><span style="font-size:17px;">Supplied By {{$product->Product_Supplier}}</span></div>
                    <p style="color:black;" class="text-justify text-truncate para mb-0">{{$product->Product_Desc}}<br><br></p>
                </div>
                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                    <div class="d-flex flex-row align-items-center">
                        <h4>{{$product->Product_Quantity}} <span style="color:red;">  In   Stock</span></h4>
                    </div>
                    <a style="padding-left:44px; padding-right:44px; border-color:#32CD32; background:#32CD32" href="/increaseQuantity/{{ $product->Product_ID }}" class="btn btn-primary btn-sm" >+</a>
                    <a style="padding-left:44px; padding-right:44px; border-color:#32CD32; background:#32CD32" href="/decreaseQuantity/{{ $product->Product_ID }}"  class="btn btn-primary btn-sm" >-</a>
                    <div class="d-flex flex-column mt-4"><a style="border-color:#32CD32; background:#32CD32"  class="btn btn-primary btn-sm" href="/editProduct/{{ $product->Product_ID }}">Edit</a><a onmouseover="this.style.background='#32CD32'; this.style.color='white';"  onmouseout="this.style.background='white'; this.style.color='#32CD32';" style="border-color:#32CD32; color:#32CD32;" class="btn btn-outline-primary btn-sm mt-2" href="/deleteProduct/{{ $product->Product_ID }}" onclick= "return myFunction();">Delete</a></div>
                </div>
            </div>
                <script type="text/javascript">
                function myFunction() 
                {
                    if (confirm("Are you sure you want to delete?")) {

                    return true;

                    } else {

                        return false;
                    }

                }
             </script>
            <br>
            @endforeach
        </div>
    </div>
</div>
<div>
</div>  

            </body>
            </html>