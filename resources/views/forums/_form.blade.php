{{-- form --}}
<div class="form-group">
    <input type="text" name="title" value="{{ old('title') ?? $forum->title }}" class="form-control"
        placeholder="Title">
    @error('title')
    <div class="text-danger">
        {{ $message }}
    </div>
    @enderror
</div>

<div class="modal-collapse mb-2">
    <a class="text-decoration-none text-dark" style="cursor: pointer" data-toggle="collapse"
        data-target="#description-collapse">Description</a>
    <div id="description-collapse" class="collapse">
        <div class="form-group">
            <textarea name="description" class="form-control" cols="30" rows="4">{{ $forum->description }}</textarea>
            @error('description')
            <div class="text-danger">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>

<div class="form-group">
    <label for="tags">Tag</label>
    <select multiple name="tags[]" id="tags" class="form-control select2">
        @foreach ($tags as $tag)
        <option @if($forum->tags()->find($tag->id)) selected @endif
            value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
    </select>
</div>

<div class="modal-collapse mb-2">
    <a data-toggle="collapse" style="cursor: pointer" class="text-decoration-none text-dark"
        data-target="#image-collapse">Upload gambar</a>
    <div id="image-collapse" class="collapse mt-2">
        <div class="form-group">
            <input type="file" name="image" id="image">
            @error('image')
            <div class="text-danger">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    @if($forum->image)
    <div class="image my-2">
        <img src="{{ $forum->imageForum }}" class="w-50" alt="gambar">
    </div>
    @else
    <div>
        <small>Belum ada gambar / screenshot pada postingan ini</small>
    </div>
    @endif
</div>
