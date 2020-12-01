<div class="form-group">
    <input type="text" name="name" value="{{ old('name') ?? $tag->name }}" class="form-control" placeholder="Tag name">
    @error('name')
    <div class="text-danger">
        {{ $message }}
    </div>
    @enderror
</div>
