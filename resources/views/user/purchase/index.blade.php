@extends('layouts.web')

@section('link')
<link rel="stylesheet" type="text/css" href="/assets/frontEnd/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="/assets/frontEnd/styles/responsive.css">
@endsection

@section('content')
<div class="container" style="margin-top: 200px">
    <div class="row">
        <div class="col-lg-12">
            @if (session()->exists('success'))
            <div class="alert alert-primary" role="alert">
                {{session()->get('success')}}
            </div>
            @elseif(session()->exists('failure'))
            <div class="alert alert-danger" role="alert">
                {{session()->get('failure')}}
            </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            @foreach ($purchases as $purchase)
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="card-title">Order #{{ $purchase->id }}</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <tr>
                                    <th width="20%">
                                        Image
                                    </th>
                                    <th width="35%">
                                        Title
                                    </th>
                                    <th width="15%">
                                        Price
                                    </th>
                                    <th width="15%">
                                        Quantity
                                    </th>
                                    <th width="15%">
                                        Total
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchase->products as $product)
                                <tr>
                                    <td>
                                        <img class="img-fluid" width="100px" src="/upload/{{ $product->image }}" alt="">
                                    </td>
                                    <td>
                                        <a href="{{ route('web.product.show',['id' => $product->product_id]) }}">
                                            {{ $product->title }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $product->price }}
                                    </td>
                                    <td>
                                        {{ $product->quantity }}
                                    </td>
                                    <td>
                                        {{ $product->price * $product->quantity }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                            <p>Total : {{ $purchase->total }}</p>
                            <p>Buyer : {{ $purchase->user->name }}</p>
                            <p>Date : {{ $purchase->created_at }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection