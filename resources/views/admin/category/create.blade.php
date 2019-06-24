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
                    <h5 class="card-title">Create Category</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>category</label>
                            <input class="form-control" name="category" type="text">
                        </div>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection