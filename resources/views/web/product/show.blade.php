@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <img class="img-fluid" src="/upload/{{$product->image}}" alt="">
        </div>
    </div>
</div>
@endsection