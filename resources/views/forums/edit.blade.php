@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Forum</div>

                <div class="card-body">
                    <x-alert />
                    <form action="{{ route('forums.update', $forum) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <input type="text" name="title" value="{{ old('title') ?? $forum->title }}"
                                class="form-control @error('title') is-invalid @enderror" placeholder="Title">
                            @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                                cols="30" rows="4" placeholder="Description...">{{ $forum->description }}</textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            @if($forum->image)
                            <div class="image mb-2">
                                <img src="{{ $forum->imageForum }}" class="w-50" alt="gambar">
                            </div>
                            @endif
                            <input type="file" name="image" id="image">
                            @error('image')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary font-weight-bold btn-block">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
