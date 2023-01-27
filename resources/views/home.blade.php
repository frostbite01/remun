@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Selamat Datang, {{auth()->user()->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (auth()->user()->role === "admin")
                    <div class="alert alert-success" role="alert">
                        <a href="{{ route('dashboard-admin') }}">Masuk ke Dashboard</a>
                    </div>
                    @elseif( auth()->user()->role === "employee")
                    <div class="alert alert-success" role="alert">
                        <a href="{{ route('dashboard-employee') }}">Masuk ke Dashbaord</a>
                    </div>
                    @endif
                    {{-- {{ dd(auth()->user()->role === "employee") }} --}}

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
