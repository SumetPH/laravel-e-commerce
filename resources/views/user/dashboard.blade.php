@extends('layouts.web')

@section('link')
<link rel="stylesheet" type="text/css" href="/assets/frontEnd/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="/assets/frontEnd/styles/responsive.css">
@endsection

@section('content')
<div class="container" style="margin-top: 200px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection