@extends('layout.main')
@section('content')
@foreach($projects as $project)
<div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 custom-col-xl">
    <div class="card">
        <div class="chocolat-parent">
            <div class="img-fluid position-relative">
                <img alt="{{ $project->name }}" src="{{ $project->image_link}}" class="img-fluid">
                <a href="{{ $project->demo_link }}">
                    <p class="text-overlay">{{ $project->name }}</p>
                </a>
                <p class="price-overlay">$ {{ $project->price }}</p>
                <div class="buttons">
                    <a href="{{ $project->paid_link }}" class="btn btn-lg btn-danger">Buy</a>
                    <a href="{{ $project->free_link }}" class="btn btn-lg btn-danger">Free</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
