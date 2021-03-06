
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Create Story
                    <a href="{{ route('story.index') }}" class="btn btn-primary btn-sm float-right">Back</a>
                </div>

                <div class="card-body">
                    @if(session('status'))<div class="alert alert-success">{{ session('status') }}</div>@endif
                    {{-- @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif --}}
                    <form action="{{ route('story.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf()
                        @include('story.form')
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection