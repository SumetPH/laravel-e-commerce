@extends('layouts.web')

@section('link')
<link rel="stylesheet" type="text/css" href="/assets/frontEnd/plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="/assets/frontEnd/styles/single_styles.css">
<link rel="stylesheet" type="text/css" href="/assets/frontEnd/styles/single_responsive.css">
@endsection

@section('content')
<div class="container single_product_container">
    <div class="row">
        <div class="col">
            <!-- Breadcrumbs -->
            <div class="breadcrumbs d-flex flex-row align-items-center">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li class="active">
                        <a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i>Cart</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $cart)
                    <tr>
                        <td>
                            <img class="img-fluid" width="100px" src="/upload/{{ $cart->product->image }}" alt="">
                        </td>
                        <th>
                            <a href="{{ route('web.product.show', ['id' => $cart->product_id]) }}">
                                {{ $cart->product->title }}
                            </a>
                        </th>
                        <th>
                            {{ $cart->product->price }}
                        </th>
                        <th>
                            {{ $cart->quantity }}
                        </th>
                        <th>
                            {{ $cart->product->price * $cart->quantity }}
                        </th>
                        <th>
                            <form action="{{ route('user.cart.destroy', ['id' => $cart->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Would you like to remove it?')"
                                    type="submit">Remove</button>
                            </form>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @if (count($carts) > 0)
    <div class="row justify-content-end mt-4">
        <div class="col-lg-4">
            <div>
                <h4 class="card-title">Cart Total</h4>
                <hr>
                <p class="d-flex justify-content-between">
                    <span>Subtotal</span><span>{{ $total }}</span>
                </p>
                <p class="d-flex justify-content-between">
                    <span>Shipping</span><span>Free</span>
                </p>
                <p class="d-flex justify-content-between" style="font-size: 20px">
                    <span>Total</span><b>{{ $total }}</b>
                </p>
                <div class="d-flex justify-content-center">
                    <a href="{{ route('user.checkout',['total' => $total]) }}" class="btn btn-primary">Proceed to
                        checkout</a>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection