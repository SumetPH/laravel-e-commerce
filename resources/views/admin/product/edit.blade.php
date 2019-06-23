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
                    <h5 class="card-title">Edit Product</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('product.update', ['id' => $product->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label>title</label>
                            <input class="form-control" name="title" type="text" value="{{ $product->title }}">
                        </div>
                        <div class="form-group">
                            <label>author</label>
                            <input class="form-control" name="author" type="text" value="{{ $product->author }}">
                        </div>
                        <div class="form-group">
                            <label>publisher</label>
                            <input class="form-control" name="publisher" type="text" value="{{ $product->publisher }}">
                        </div>
                        <div class="form-group">
                            <label>category</label>
                            <select class="form-control" name="category">
                                @foreach ($categories as $category)
                                <option value="{{ $category->category }}"
                                    selected="{{ $category->category == $product->category ? 'selected' : null }}">
                                    {{ $category->category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>price</label>
                            <input class="form-control" name="price" type="number" value="{{ $product->price }}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" id="imageBtn">Image</button>
                            <button class="btn btn-success" id="fileBtn">File</button>
                            <input class="form-control" id="imageInput" name="image" type="file" style="display: none">
                            <input class="form-control" id="fileInput" name="file" type="file" style="display: none">
                        </div>
                        <div class="form-group">
                            <label>description</label>
                            <textarea class="form-control" name="description">{{ $product->description }}</textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#imageBtn').click(function (e) { 
            e.preventDefault();
            $('#imageInput').click()
        });
        $('#fileBtn').click(function (e) { 
            e.preventDefault();
            $('#fileInput').click()
        });
    });
</script>
@endsection