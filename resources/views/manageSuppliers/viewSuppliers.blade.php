@extends('layouts.app')

@section('content')

<?php
use App\Models\Supplier;
$suppliers=Supplier::all();
?>


<br><br>
<div class="d-flex justify-content-center h-100">
    <div class="search"> <input onchange="searchSupplier()" id="searchBar" style=" padding-right:700px; padding-bottom:6px; padding-top:4px;" type="text" class="search-input" placeholder="Enter Supplier Name...." name=""> <button onclick="searchSupplier2()" type="button" class="btn btn-outline-primary">search</button> <i class="fa fa-search"></i> </a> </div>
</div>

<br>

<script type="text/javascript">
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
    var search=document.getElementById("searchBar").value;
    var link= "/searchSuppliers/"+search;
    if(!search.isEmpty())
    {
        location.replace(link);
    }
}
</script>

<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
            @foreach($suppliers as $supplier)
            <div class="row p-2 bg-white border rounded">
                <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="{{URL::asset('storage/images/suppliers/'.$supplier->Supplier_Image)}}"></div>
                <div class="col-md-6 mt-1">
                    <h5>{{$product->Product_Name}}</h5>
                    <div class="d-flex flex-row">
                        <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span>Type Of {{$product->Product_Type}}</span>
                    </div>
                    <div class="d-flex flex-row">
                        <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span>{{$product->Product_Quantity}} In Stock</span>
                    </div>
                    <div class="d-flex flex-row">
                        <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span>Supplied By {{$product->Product_Supplier}}</span>
                    </div>
                    <div class="d-flex flex-row">
                        <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></div><span>{{$product->Product_Desc}}</span>
                    </div>
                </div>
                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                    <div class="d-flex flex-row align-items-center">
                        <h4 class="mr-1">${{$product->Product_Price}}</h4>
                    </div>
                    <a href="/increaseQuantity/{{ $product->Product_ID }}" class="btn btn-primary btn-sm" >+</a>
                    <a href="/decreaseQuantity/{{ $product->Product_ID }}"  class="btn btn-primary btn-sm" >-</a>
                    <div class="d-flex flex-column mt-4"><a class="btn btn-primary btn-sm" href="/editProduct/{{ $product->Product_ID }}">Edit</a><a class="btn btn-outline-primary btn-sm mt-2" href="/deleteProduct/{{ $product->Product_ID }}">Delete</a></div>
                </div>
            </div>

            function confirmDelete() {
    return confirm('Are you sure you want to delete?');
}
            <br>
            @endforeach
        </div>
    </div>
</div>
@endsection