@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-white">
                <h1>Home Page Staff {{ Auth::user()->role }}</h1>
            </div>
        </div>
    </div>
@endsection
