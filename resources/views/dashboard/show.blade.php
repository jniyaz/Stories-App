
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ $story->title }}
                    <a href="{{ route('dashboard.index') }}" class="btn btn-primary btn-sm float-right">Back</a>
                </div>

                <div class="card-body">
                    {{ $story->body }} <br/><br/>
                    <p>Status: {{ $story->status == true ? 'Active' : 'Inactive' }}</p>
                    <p class="font-italic">{{ $story->footnote }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection