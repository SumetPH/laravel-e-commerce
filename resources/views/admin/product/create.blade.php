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
                    <h5 class="card-title">Create Product</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>title</label>
                            <input class="form-control" name="title" type="text">
                        </div>
                        <div class="form-group">
                            <label>author</label>
                            <input class="form-control" name="author" type="text">
                        </div>
                        <div class="form-group">
                            <label>publisher</label>
                            <input class="form-control" name="publisher" type="text">
                        </div>
                        <div class="form-group">
                            <label>category</label>
                            <select class="form-control" name="category">
                                @foreach ($categories as $category)
                                <option value="{{ $category->category }}">{{ $category->category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>price</label>
                            <input class="form-control" name="price" type="number">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success" id="imageBtn">Image</button>
                            <button class="btn btn-success" id="fileBtn">File</button>
                            <input class="form-control" id="imageInput" name="image" type="file" style="display: none">
                            <input class="form-control" id="fileInput" name="file" type="file" style="display: none">
                        </div>
                        <div class="form-group">
                            <label>description</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Save</button>
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