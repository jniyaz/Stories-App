
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit Story
                    <a href="{{ route('story.index') }}" class="btn btn-primary btn-sm float-right">Back</a>
                </div>

                <div class="card-body">
                    @if(session('status'))<div class="alert alert-success">{{ session('status') }}</div>@endif
                    <form action="{{ route('story.update', [$story]) }}" method="POST">
                        @csrf()
                        @method('PUT')
                        @include('story.form')
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection