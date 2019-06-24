@extends('layouts.admin')

@section('content')
<div class="container">
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
            @foreach ($orders as $order)
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Order #{{ $order['bill']->id }}</h4>
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
                                @foreach ($order['products'] as $product)
                                <tr>
                                    <td>
                                        <img class="img-fluid" width="150px" src="/upload/{{ $product->image }}" alt="">
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
                                        {{ $product->total }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>
                            <p>Total : {{ $order['bill']->total }}</p>
                            <p>Buyer : {{ $order['bill']->name }}</p>
                            <p>Date : {{ $order['bill']->created_at }}</p>
                            <button class="btn btn-success btn-sm">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection