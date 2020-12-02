@extends('layouts.app')
@section('title','Tags')
@section('content')
<div class="container">
    <div class="jumbotron bg-primary" id="tc_jumbotron">
        <div class="card-body">
            <div class="text-center text-white">
                <h1 style="font-size: 3.5rem;">Tags</h1>
                <p>Pilih thread berdasarkan tag. </p>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12" id="tc_container_wrap">
            <div class="card">
                <div class="card-body" style="background: #f9f9f9;">
                    @include('partials._popular-search')
                    <br>
                    <div class="row">
                        <div class="col-md-8">
                            @foreach($tags as $tag)
                            <a href="{{ route('tags.show', $tag) }}" class="btn btn-primary btn-sm mb-2">{{$tag->name}} ({{ $tag->forums->count() }}
                                <small>thread</small>)</a>
                            @endforeach
                        </div>
                        <div class="col-md-4">
                            @include('partials._popular')
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header"></div>
                        <div class="card-body" style="background: rgb(90, 90, 90)"></div>
                        <div class="card-header"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endsection
