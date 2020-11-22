@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <x-alert />
                    <form action="{{ route('forums.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <input type="text" name="title" value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Title">
                            @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <textarea name="description" class="form-control @error('name') is-invalid @enderror"
                                cols="30" rows="4" placeholder="Description..."></textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Image: </label>
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
