
@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ $story->title }}
                    <a href="{{ route('dashboard.index') }}" class="btn btn-primary btn-sm float-right">Back</a>
                </div>

                <div class="card-body">
                    <div class="text-center">
                        <img src="{{ $story->thumbnail }}" height="200" alt="{{ $story->title }}" />
                    </div>
                    <div class="py-2">{{ $story->body }}</div>
                    <div class="d-flex justify-content-between align-items-center py-4">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">{{ $story->user->name }}</button>
                        </div>
                        <small class="text-muted">{{ $story->type }}</small>
                    </div>
                    <p class="font-italic py-4">{{ $story->footnote }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection