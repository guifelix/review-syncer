@extends('layouts.public.home')

@push('styles')
@endpush

@push('scripts')
@endpush

@section('title', 'Home')

@section('content')

<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md" class="bold-font">
            Welcome to <strong style="font-weight: 980">Bold</strong> Reviews!
        </div>
        <a href="{{ route('reviews.index') }}" class="btn btn-danger btn-lg subtitle" style="text-decoration: none">Look into our reviews</a>
    </div>
</div>

@endsection

@push('scripts')
    <script>
    </script>
@endpush