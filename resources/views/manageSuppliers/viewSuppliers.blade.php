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
   
 <!-- jQuery CDN - Slim version (=without AJAX) -->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <link href="{{ asset('sass/test.css') }}" rel="stylesheet">


    @include('admin/adminheader')

<!-- Page Content -->


<?php
use App\Models\Supplier;
$suppliers=Supplier::all();
?>

<div class="combine">
<br><br> 

<div class="d-flex justify-content-center h-100">
    <div style="margin-left:100px;" class="search"> <input  onchange="searchSupplier()" id="searchBar" style=" padding-right:750px; padding-bottom:6px; padding-top:4px;" type="text" class="search-input" placeholder="Enter Supplier Name...." name=""> <i class="fa fa-search"></i> </a> <button style="border-color:#32CD32; color:#32CD32;" onclick="location.href='{{ url('addSupplierForm') }}'" type="button" onmouseover="this.style.background='#32CD32'; this.style.color='white';"  onmouseout="this.style.background='white'; this.style.color='#32CD32';" class="btn btn-outline-primary">Add New Supplier</button></div>
</div>

<br>

<script type="text/javascript">
    window.scrollTo(0, 0);
function searchSupplier()
{
    var link= "/searchSuppliers/"+document.getElementById("searchBar").value;
    document.addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            location.replace(link);
        }
    });
}

function searchSupplier2()
{
    var link= "/searchSuppliers/"+document.getElementById("searchBar").value;
    if(document.getElementById("searchBar").value!="")
    {
        location.replace(link);
    }
}
</script>


<div style="margin-left=-120px;" class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
            @foreach($suppliers as $supplier)
            <div class="row p-2 bg-white border rounded">
                <div class="col-md-3 mt-1"><img  style="width:300px; height: 150px;" class="img-fluid img-responsive rounded product-image" src="{{URL::asset('storage/images/suppliers/'.$supplier->Supplier_Image)}}"></div>
                <div class="col-md-6 mt-1">
                    <h4>{{$supplier->Supplier_Name}}</h4>
                    <div class="mt-1 mb-1 spec-1"><span style="font-size:17px;">Email: {{$supplier->Supplier_Email}}</span><span style="background:#32CD32" class="dot"></span><span style="font-size:17px;">Mobile: {{$supplier->Supplier_PhoneNo}}</div>
                    <p style="color:black;" class="text-justify text-truncate para mb-0">{{$supplier->Supplier_Address}}<br><br></p>
                </div>
                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                    <br/>    
                    <div class="d-flex flex-column mt-4"><a style="border-color:#32CD32; background:#32CD32"  class="btn btn-primary btn-sm" href="/editSupplier/{{ $supplier->Supplier_ID }}">Edit</a><a onmouseover="this.style.background='#32CD32'; this.style.color='white';"  onmouseout="this.style.background='white'; this.style.color='#32CD32';" style="border-color:#32CD32; color:#32CD32;" class="btn btn-outline-primary btn-sm mt-2" href="/deleteSupplier/{{ $supplier->Supplier_ID }}" onclick= "return myFunction();">Delete</a></div>
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