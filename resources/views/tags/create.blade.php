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
                    <form action="" method="post">
                        @csrf

                        @include('tags._form')

                        <button type="submit" class="btn btn-primary font-weight-bold btn-block">Submit</button>

                    </form>
                    <hr>

                    @include('tags.tags-table')

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
