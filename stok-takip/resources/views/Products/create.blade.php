@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }} <a href="{{route('products.create')}}" class="btn btn-secondary float-right">Ürün Ekle</a></div>


                <div class="p-2">

                    <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlFile1">Ürün Resmi</label>
                            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Ürün Adı</label>
                            <input type="text" name="name" class="form-control" placeholder="Ürün Adı"> 
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ürün Miktarı</label>
                            <input type="number" name="stock" class="form-control" id="exampleInputPassword1" placeholder="Miktar">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Ürün Fiyatı</label>
                            <input type="number" name="price"  class="form-control" id="exampleInputPassword1" placeholder="Fiyat">
                        </div>


                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Ürün Açıklaması</label>
                            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>


                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection