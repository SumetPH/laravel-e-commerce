@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            @if (session()->exists('failure'))
            <div class="alert alert-primary" role="alert">
                {{session()->get('failure')}}
            </div>
            @elseif(session()->exists('success'))
            <div class="alert alert-primary" role="alert">
                {{session()->get('success')}}
            </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <form action="/admin/product" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>title</label>
                    <input class="form-control" name="title" type="text">
                </div>
                <div class="form-group">
                    <label>description</label>
                    <input class="form-control" name="description" type="text">
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
                    <input class="form-control" name="category" type="text">
                </div>
                <div class="form-group">
                    <label>image</label>
                    <input class="form-control" name="image" type="file">
                </div>
                <div class="form-group">
                    <label>file</label>
                    <input class="form-control" name="file" type="file">
                </div>
                <div class="form-group">
                    <label>price</label>
                    <input class="form-control" name="price" type="number">
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
            </form>
        </div>
    </div>
</div>
@endsection