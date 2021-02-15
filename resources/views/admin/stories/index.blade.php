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
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($stories as $k => $item)
                        <tr>
                            <td>{{ $k+1 }}</th>
                            <td>{{ $item->title }}</td>
                            <td width="30%">{{ $item->body }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>
                                <form action="{{ route('admin.story.restore', ['id' => $item->id]) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-sm btn-primary">Restore</button>
                                </form>
                                <form action="{{ route('admin.story.destroy', ['id' => $item->id]) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
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