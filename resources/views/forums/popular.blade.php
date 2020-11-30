@extends('layouts.app')
@section('title','Popular')
@section('content')
<div class="container">
    <div class="jumbotron bg-white border" id="tc_jumbotron">
        <div class="card-body" id="xx">
            <div class="text-center">
                <h1 style="font-size: 3.5rem;">Popular</h1>
                <p>Menampilkan thread populer. </p>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
    <div class="col-md-12" id="tc_container_wrap">
            <div class="card" id="tc_paneldefault">
                <div class="card-body" id="tc_panelbody">
                    @include('partials._popular-search')
                    <div class="card" style="background: #f9f9f9;">
                        <div class="list-group">
                            @foreach($populars as $popular)
                            <a href="{{ route('forums.show', $popular) }}" class="list-group-item"
                                id="index_hover">{{$popular->title}}</a>
                            @endforeach
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header"></div>
                        <div class="card-body" style="background: rgb(90, 90, 90)"></div>
                        <div class="card-header"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
