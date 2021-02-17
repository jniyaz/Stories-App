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
                    My Stories
                    @can('create', 'App\Models\Story')
                    <a href="{{ route('story.create') }}" class="btn btn-primary btn-sm float-right">Add</a>
                    @endcan
                </div>
                <div class="card-body">
                    @if(count($stories) > 0)
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Type</th>
                            <th scope="col">Tags</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($stories as $k => $item)
                        <tr>
                            <th scope="row">{{ $k+1 }}</th>
                            <td>{{ $item->title }}</td>
                            <td width="30%">{{ $item->body }}</td>
                            <td>{{ $item->type }}</td>
                            <td>@foreach($item->tags as $tag) {{ $tag->name }} @endforeach</td>
                            <td>{{ $item->status == true ? 'Active' : 'Inactive' }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                            <td class="text-center">
                                @can('view', $item)
                                <a class="btn btn-primary btn-sm" href="{{ route('story.show', [$item]) }}">View</a>
                                @endcan
                                @can('update', $item)
                                <a class="btn btn-warning btn-sm" href="{{ route('story.edit', [$item]) }}">Edit</a>
                                @endcan
                                @can('delete', $item)
                                <form action="{{ route('story.destroy', [$item]) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?');" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                @endcan
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