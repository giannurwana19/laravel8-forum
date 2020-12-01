@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $title }}</div>

                <div class="card-body">
                    <x-alert />

                    <form action="{{ route('tags.update', $tag) }}" method="post">
                        @csrf
                        @method('PATCH')

                        @include('tags._form')

                        <button type="submit" class="btn btn-primary font-weight-bold btn-block">Update</button>

                    </form>
                    <hr>

                    @include('tags.tags-table')

                </div>


            </div>
        </div>
    </div>
</div>
@endsection
