@extends('layouts.app')

@section('content')

<section class="jumbotron text-center">
    <div class="container">
        <p class="lead text-muted">Great stories from the famous authors</p>
        <p>
        <a href="{{ route('dashboard.index') }}" class="btn btn-primary my-2">All</a>
        <a href="{{ route('dashboard.index', ['type'=>'short']) }}" class="btn btn-secondary my-2">Short</a>
        <a href="{{ route('dashboard.index', ['type'=>'long']) }}" class="btn btn-secondary my-2">Long</a>
        </p>
    </div>
</section>

<div class="album py-5 bg-light">
    <div class="container">

        <div class="row">
        @if(!empty($stories))
            @foreach ($stories as $k => $item)
            <div class="col-md-4">
            <div class="card mb-4 box-shadow">
                <a href="{{ route('dashboard.show', [$item]) }}">
                <img class="card-img-top" src="{{ $item->thumbnail }}" height="160" alt="{{ $item->title }}" />
                </a>
                <div class="card-body">
                <p class="card-text">{{ $item->title }}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">{{ $item->user->name }}</button>
                    </div>
                    <small class="text-muted">{{ $item->type }}</small>
                </div>
                </div>
            </div>
            </div>
            @endforeach
        @else
            <p>No data found.</p>   
        @endif
        </div>
        {{ $stories->withQueryString()->links() }}
    </div>
</div>
@endsection

{{-- {{ dd(DB::getQueryLog()) }} --}}

@section('styles')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection