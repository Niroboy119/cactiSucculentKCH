@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Product') }}</div>

                <div class="card-body">
                    <form action="/addProduct" method="POST" >

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                <input id="quantity" type="quantity" class="form-control @error('quantity') is-invalid @enderror" name="quantity" required autocomplete="quantity">

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
                                <input id="Type" type="Type" class="form-control @error('Type') is-invalid @enderror" name="Type" required autocomplete="Type">

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
                                <input id="Desc" type="Desc" class="form-control @error('Desc') is-invalid @enderror" name="Desc" required autocomplete="Desc">

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
                                <input id="Price" type="Price" class="form-control @error('Price') is-invalid @enderror" name="Price" required autocomplete="Price">

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
                                <input id="Supplier" type="Supplier" class="form-control @error('Supplier') is-invalid @enderror" name="Supplier" required autocomplete="Supplier">

                                @error('Supplier')
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
                                    {{ __('Add Product') }}
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
