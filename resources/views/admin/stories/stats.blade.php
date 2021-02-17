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
                    Stats
                </div>
                <div class="card-body">
                    @if(count($stories) > 0)
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Story Title</th>
                            <th scope="col">User</th>
                            <th scope="col">Created At</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($stories as $k => $item)
                        <tr>
                            <td>{{ $k+1 }}</th>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->created_at }}</td>
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