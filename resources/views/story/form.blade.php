<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Title"
    value="{{ old('title', $story->title) }}"
    >
    @error('title')
    <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
    <label for="body">Body</label>
    <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="2">{{ old('body', $story->body) }}</textarea>
    @error('body')
    <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>
<div class="form-group">
<label for="exampleFormControlSelect1">Type</label>
<select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
    <option value="">-</option>
    <option value="short" {{ 'short' == old('type', $story->type) ? 'selected'  : '' }}>Short</option>
    <option value="long"  {{ 'long' == old('type', $story->type) ? 'selected'  : '' }}>Long</option>
</select>
@error('type')
    <span class="invalid-feedback" role="alert">{{ $message }}</span>
@enderror
</div>
<div class="form-group">
    <legend><h6>Status</h6></legend>
    <div class="form-check @error('status') is-invalid @enderror">
        <input type="radio" class="form-check-input" name="status" value="1" {{ '1' == old('status', $story->status) ? 'checked' : '' }} />
        <label for="active" class="form-check-label">Yes</label>
    </div>
    <div class="form-check @error('status') is-invalid @enderror">
        <input type="radio" class="form-check-input" name="status" value="0" {{ '0' == old('status', $story->status) ? 'checked' : '' }} />
        <label for="active" class="form-check-label">No</label>
    </div>
    @error('status')
    <span class="invalid-feedback" role="alert">{{ $message }}</span>
    @enderror
</div>