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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
   
 <!-- jQuery CDN - Slim version (=without AJAX) -->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <link href="{{ asset('sass/test.css') }}" rel="stylesheet">


   @include('admin/adminheader')


<?php
use App\Models\Product;
$products = $product;
$s = $search
?>

<div class="combine">
<br><br>
<div class="d-flex justify-content-center h-100">
    <div style="margin-left:100px;" class="search"> <input value="{{$s}}" onchange="searchProduct()" id="searchBar" style=" padding-right:750px; padding-bottom:6px; padding-top:4px;" type="text" class="search-input" placeholder="Enter Product Name...." name=""> <button style="border-color:#32CD32; color:#32CD32;" onmouseover="this.style.background='#32CD32'; this.style.color='white';"  onmouseout="this.style.background='white'; this.style.color='#32CD32';" onclick="searchProduct2()" type="button" class="btn btn-outline-primary">Search Product</button> <i class="fa fa-search"></i> </a> </div>

</div>

<br>

<script type="text/javascript">
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



<br>

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
                    
                <div style="text-align:center"><h4 style="color:red;"><span style="color:#32CD32;">In Stock: </span>{{$product->Product_Quantity}} </h4></div>

                {{-- <div class="d-flex flex-row align-items-center">
                    </div> --}}
                    {{-- <a style="padding-left:44px; padding-right:44px; border-color:#32CD32; background:#32CD32" href="/increaseQuantity/{{ $product->Product_ID }}" class="btn btn-primary btn-sm" >+</a> --}}
                    {{-- <a style="padding-left:44px; padding-right:44px; border-color:#32CD32; background:#32CD32" href="/decreaseQuantity/{{ $product->Product_ID }}"  class="btn btn-primary btn-sm" >-</a> --}}
                    <div class="container py-4">
                        <div class="row">
                            <div>
                                <div style="bottom:15%" class="input-group">
                                    <span class="input-group-prepend">
                                        <button type="button" onmouseover="this.style.background='#32CD32'; this.style.color='white';" onmouseout="this.style.background='white'; this.style.color='#32CD32';" style="  padding-left:12px; padding-right:12px; bottom:17%; height:38px; border-color:#32CD32; color:#32CD32;" class="btn btn-outline-primary btn-sm mt-2" onclick="decreaseFunction('{{$product->Product_ID}}')" data-type="minus" data-field="quant[1]">
                                            <span class="fa fa-minus"> - </span>
                                        </button>
                                        <input onchange="changeQuantity('{{$product->Product_ID}}')" id="inputBar" style="border-radius:0px; text-align: center;" type="text" name="quant[1]" class="form-control input-number" value="{{$product->Product_Quantity}}">
                                        <button type="button" onmouseover="this.style.background='#32CD32'; this.style.color='white';" onmouseout="this.style.background='white'; this.style.color='#32CD32';" style="  padding-left:12px; padding-right:12px; bottom:17%; border-color:#32CD32; color:#32CD32;" class="btn btn-outline-primary btn-sm mt-2" onclick="increaseFunction('{{$product->Product_ID}}')" data-type="minus" data-field="quant[1]">
                                            <span class="fa fa-plus"> + </span>
                                        </button>
                                    </span>
                                    
                                    {{-- <a  id="confirm" hidden style="padding-left:80px; padding-right:80px; border-color:red; background:red"  class="btn btn-primary btn-sm" href="">Confirm</a> --}}
                                </div>
                              <a style="padding-left:93px; padding-right:93px; border-color:#32CD32; background:#32CD32"  class="btn btn-primary btn-sm" href="/editProduct/{{ $product->Product_ID }}">Edit</a> 
                              <br><a onclick="return myFunction()" onmouseover="this.style.background='#32CD32'; this.style.color='white';"  onmouseout="this.style.background='white'; this.style.color='#32CD32';" style="padding-left:84px; padding-right:84px; border-color:#32CD32; color:#32CD32;" class="btn btn-outline-primary btn-sm mt-2" href="/deleteProduct/{{ $product->Product_ID }}" >Delete</a>

                            </div>
                        </div>
                    </div> 
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

                function increaseFunction(z)
                {
                    // var x=document.getElementById("inputBar").value;
                    // y=parseInt(x)+1;
                    // document.getElementById("inputBar").value=y;
                    // document.getElementById("confirm").removeAttribute("hidden");
                    location.replace("/increaseQuantity/"+z);
                }

                function decreaseFunction(z)
                {
                    // var x=document.getElementById("inputBar").value;
                    // y=parseInt(x)-1;
                    // document.getElementById("inputBar").value=y;
                    location.replace("/decreaseQuantity/"+z);
                }

                function changeQuantity(z)
                {
                    var x=document.getElementById("inputBar").value;
                    if (confirm("Are you sure you want to delete?")) {

                        location.replace("/changeQuantity/"+z+"/"+x);

                            } else {

                                return false;
                            }

                }

               
                
               

             </script>
            <br>

            

            @endforeach

            @if ($products->count()==0)
            <div style="left:40%" class="col-md-3 mt-1"><img  style="" class="img-fluid img-responsive rounded product-image" src="{{URL::asset('storage/images/magGlass.png')}}"></div>
            <br/> <br/>
            <h1 style="margin-left: 30%">No Results Were Found</h1>


            

            @endif
        </div>
       

    </div>
</div>
<div>
</div>  
</body>
</html>
