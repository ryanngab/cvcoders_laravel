@extends('layout.main')
@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-calculator"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Project</h4>
                </div>
                <div class="card-body">
                    {{ $projects->count() }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="hero bg-primary text-white">
    <div class="hero-inner">
        <h2>Welcome, {{ auth()->user()->name ?? 'Guest' }}!</h2>
        <p class="lead">Welcome to CvCoders, the most comprehensive website for downloading source codes of web,
            android, and ios applications.</p>
        <p>
            Here, you can also order the web, ios, or android application you need. If interested, please contact us via
            WA <a href="https://wa.me/6283137991102" style="text-decoration: none;color: white">083137991102</a> atau via email <a href="mailto:cvcoders.id@gmail.com" style="text-decoration: none;color: white">cvcoders.id@gmail.com</a>.</p>
        </p>
        <div class="mt-4">
            <a href="{{ route('login') }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-sign-in-alt"></i> Login</a>
        </div>
    </div>
</div>


@endsection
