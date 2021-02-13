
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ ucwords($story->title) }}
                    <a href="{{ route('story.index') }}" class="btn btn-primary btn-sm float-right">Back</a>
                </div>

                <div class="card-body">
                    {{ ucfirst($story->body) }} <br/><br/>
                    Status: {{ $story->status == true ? 'Active' : 'Inactive' }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection