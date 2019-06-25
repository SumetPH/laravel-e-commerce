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
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Product Table</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <tr>
                                    <th>
                                        Title
                                    </th>
                                    <th>
                                        Author
                                    </th>
                                    <th>
                                        Category
                                    </th>
                                    <th class="text-right">
                                        Price
                                    </th>
                                    <th>
                                        Edit
                                    </th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>
                                        <a href="{{ route('web.product.show', ['id' => $product->id]) }}">
                                            {{ $product->title }}
                                        </a>
                                    </td>
                                    <td>
                                        {{ $product->author }}
                                    </td>
                                    <td>
                                        {{ $product->category }}
                                    </td>
                                    <td class="text-right">
                                        {{ $product->price }}
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.product.edit', ['id' => $product->id]) }}">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.product.destroy', ['id' => $product->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                onclick="return confirm('Would you like to delete it?')"
                                                class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ route('admin.product.create') }}" class="btn btn-primary">Create</a>
        </div>
    </div>
</div>
@endsection