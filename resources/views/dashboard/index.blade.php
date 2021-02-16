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
                    Stories
                    <span class="float-right">
                        <a href="{{ route('dashboard.index') }}">All</a> |
                        <a href="{{ route('dashboard.index', ['type'=>'short']) }}">Short</a> |
                        <a href="{{ route('dashboard.index', ['type'=>'long']) }}">Long</a>
                    </span>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Type</th>
                            <th scope="col">Author</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @if(!empty($stories))
                                @foreach ($stories as $k => $item)
                                <tr>
                                    <td scope="row">{{ $k+1 }}</td>
                                    <td><img src="{{ $item->thumbnail }}" width="150" alt="{{ $item->title }}" /></td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->type }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-primary btn-sm" href="{{ route('dashboard.show', [$item]) }}">View</a>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                            <p>No data found.</p>
                            @endif
                        </tbody>
                    </table>
                    {{ $stories->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- {{ dd(DB::getQueryLog()) }} --}}