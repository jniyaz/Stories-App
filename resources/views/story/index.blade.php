@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Stories</div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Type</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created At</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($stories as $k => $item)
                            <tr>
                                <th scope="row">{{ $k+1 }}</th>
                                <td>{{ ucwords($item->title) }}</td>
                                <td>{{ $item->body }}</td>
                                <td>{{ $item->type }}</td>
                                <td>{{ $item->status == true ? 'Active' : 'Inactive' }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $stories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
