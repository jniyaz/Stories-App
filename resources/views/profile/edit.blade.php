
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit Profile
                </div>

                <div class="card-body">
                    @if(session('status'))<div class="alert alert-success">{{ session('status') }}</div>@endif
                    <form action="{{ route('profile.update', [$user]) }}" method="POST" >
                        @csrf()
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="title">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name"
                            value="{{ old('name', $user->name) }}"
                            >
                            @error('name')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title">Email</label>
                            <input type="text" readonly class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email"
                            value="{{ old('email', $user->email) }}"
                            >
                            @error('email')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Phone"
                            value="{{ old('phone', $user->profile->phone ?? '') }}"
                            >
                            @error('phone')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="biography">Biography</label>
                            <textarea class="form-control @error('biography') is-invalid @enderror" id="biography" name="biography" rows="2">{{ old('biography', $user->profile->biography ?? '') }}</textarea>
                            @error('biography')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="2">{{ old('address', $user->profile->address ?? '') }}</textarea>
                            @error('address')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                            
                        <button type="submit" class="btn btn-primary btn-sm">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection