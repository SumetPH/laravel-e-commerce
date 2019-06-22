@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Products</h3>
    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="/upload/{{$product->image}}" alt="">
                <div class="card-body">
                    <h5>{{$product->title}}</h5>
                    <a class="btn btn-primary btn-sm" href="/product/{{$product->id}}">{{$product->price}} THB</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection