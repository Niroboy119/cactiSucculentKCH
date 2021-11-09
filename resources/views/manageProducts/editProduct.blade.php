@extends('layouts.app')

@section('content')
<?php
use App\Models\Product;
$product = Product::where([ 'Product_ID' => $id ]);
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Product') }}</div>

                <div class="card-body">
                    <form action="/updateProduct/{{$product->value('Product_ID')}}" method="POST" enctype="multipart/form-data">
                   
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$product->value('Product_Name')}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="quantity" class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>

                            <div class="col-md-6">
                                <input id="quantity" type="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{$product->value('Product_Quantity')}}" name="quantity" required autocomplete="quantity">

                                @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="Type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                            <div class="col-md-6">
                                <input id="Type" type="Type" class="form-control @error('Type') is-invalid @enderror" name="Type" value="{{$product->value('Product_Type')}}" required autocomplete="Type">

                                @error('Type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Desc" class="col-md-4 col-form-label text-md-right">{{ __('Desc') }}</label>

                            <div class="col-md-6">
                                <input id="Desc" type="Desc" value="{{$product->value('Product_Desc')}}" class="form-control @error('Desc') is-invalid @enderror" name="Desc" required autocomplete="Desc">

                                @error('Desc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="Price" type="Price" value="{{$product->value('Product_Price')}}" class="form-control @error('Price') is-invalid @enderror" name="Price" required autocomplete="Price">

                                @error('Price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Supplier" class="col-md-4 col-form-label text-md-right">{{ __('Supplier') }}</label>

                            <div class="col-md-6">
                                <input id="Supplier" type="Supplier" value="{{$product->value('Product_Supplier')}}" class="form-control @error('Supplier') is-invalid @enderror" name="Supplier" required autocomplete="Supplier">

                                @error('Supplier')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input  id="profile-img" onchange="readURL(this);" type="file" name="file" required>
                                <img src="{{URL::asset('storage/images/products/'.$product->value('Product_Image'))}}" id="profile-img-tag" width="200px" />

                                <script type="text/javascript">
                                    function readURL(input) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();
                                            
                                            reader.onload = function (e) {
                                                $('#profile-img-tag').attr('src', e.target.result);
                                            }
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }
                                    $("#profile-img").change(function(){
                                        readURL(this);
                                    });
                                </script>

                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{ csrf_field() }}

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Product') }}
                                </button>
                            </div>
                        </div>
                        

                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
