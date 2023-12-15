@extends('layouts.app')
<style>
    .container {
        max-width: 1200px;
    }

    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6);
        transition: box-shadow 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card-body {
        padding: 2px;
    }

    .alert {
        margin-bottom: 10px;
    }

    h6 {
        margin-bottom: 10px;
        padding: 10px;
    }

    ul {
        list-style-type: none;
        padding: 0;
    }

    ul li {
        margin-bottom: 10px;
    }

    ul li a {
        text-decoration: none;
        color: #000;
        font-weight: bold;
    }

    ul li a:hover {
        text-decoration: underline;
    }

    /* Responsive adjustments */
    @media (max-width: 767px) {
        .card {
            width: 94%;
            margin-left: auto;
            margin-right: auto;
        }
    }
</style>

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif

            @if (Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}</div>
            @endif

            <div style="margin-top: 55px;"></div>

            <div class="row justify-content-center">

            </div>

            <div class="row justify-content-center">

            </div>

            <div class="row justify-content-center">

            </div>
        </div>
    </div>
    </div>
@endsection
