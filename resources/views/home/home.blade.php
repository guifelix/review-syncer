@extends('layouts.public.home')

@push('styles')
@endpush

@push('scripts')
@endpush

@section('title', 'Home')

@section('content')

<section class="image-slider slider-all-controls controls-inside parallax pt0 pb0 height-40">
    <ul class="slides">
        <li class="overlay image-bg">
            <div class="background-image-holder">
                <img alt=" - " class="background-image" src="{{ URL::asset('images/analytics.jpg') }}">
            </div>
            <div class="container v-align-transform">
                <div class="row text-center">
                    <div class="col-md-10 col-md-offset-1">
                        <h1 class="title-h2 mb-xs-16 main-header">
                            We help <strong>tens of thousands</strong> of eCommerce stores <strong><br class="hidden-xs">increase their online sales</strong> every day.
                        </h1>
                        <a class="btn btn-lg btn-filled inner-link" href="{{ route('reviews.index') }}"> See our reviews</a>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</section>

@endsection

@push('scripts')
    <script>
    </script>
@endpush