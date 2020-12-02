@extends('layouts.app')
@section('title',"$tag->name tag")
@section('content')
<div class="container">
    <div class="jumbotron bg-primary" id="tc_jumbotron">
        <div class="card-body" id="xx">
            <div class="text-center text-white">
                <p>Tag</p>
                <h1 style="font-size: 3.5rem;">{{$tag->name}}</h1> ({{ $tag->forums->count() }} posts)
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12" id="tc_container_wrap">
            <div class="card" id="tc_paneldefault">
                <div class="card-body" id="tc_panelbody" style="background: #f9f9f9;">
                    @include('partials._popular-search')
                </div>
                <div class="row">
                    <div class="col-md-8" style="padding-right: 0;"><br>
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-bordered table-responsive">
                                    <thead id="tc_thead">
                                        <tr>
                                            <th scope="col">Thread</th>
                                            <th scope="col">Comments</th>
                                            <th scope="col">Views</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody style="background: #f9f9f9;">
                                        @foreach($tag->forums as $forum)
                                        <tr>
                                            <td width="453">
                                                <div class="forum_title">
                                                    <h4> <a href="">{{ $forum->title, 45 }}</a>
                                                    </h4>
                                                    <p>{!! strip_tags(Str::limit($forum->description, 60)) !!}</p>
                                                    @foreach($forum->tags as $tag)
                                                    <a href="{{ route('tags.show', $tag) }}"
                                                        class="badge badge-success tag_label">#{{$tag->name}}</a>
                                                    @endforeach
                                                    @if (empty($forum->image))
                                                    @else
                                                    <div class="badge badge-success tag_label_image"><i
                                                            class="fa fa-image"></i></div>
                                                    @endif
                                                </div>
                                            </td>
                                            <td style="text-align: center"><small>2</small>
                                            </td>
                                            <td style="text-align: center"><small>3</small></td>
                                            <td>
                                                <div class="forum_by">
                                                    <small
                                                        style="margin-bottom: 0; color: #666">{{$forum->created_at->diffForHumans()}}</small>
                                                    <small>by <a href="#">{{$forum->user->name}}</a></small>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4"> <br>
                        @include('partials._popular')
                    </div>
                </div>
                <hr style="margin-top: 0;">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body" style="background: rgb(90, 90, 90)"></div>
                    <div class="card-header"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div><br>
@endsection
