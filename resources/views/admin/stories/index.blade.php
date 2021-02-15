@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(session('status'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    Deleted Stories
                </div>
                <div class="card-body">
                    @if(count($stories) > 0)
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">User</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($stories as $k => $item)
                        <tr>
                            <th scope="row">{{ $k+1 }}</th>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->body }}</td>
                            <td>{{ $item->user->name }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $stories->links() }}
                    @else
                    <tr>
                    <td>No data found.</td>
                    </tr>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection