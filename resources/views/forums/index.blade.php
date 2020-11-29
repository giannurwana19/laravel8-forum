@extends('layouts.app')
@section('title','Forum')
@section('content')
<div class="container">
    <div class="jumbotron bg-white border" id="tc_jumbotron">
        <div class="card-body" id="xx">
            <div class="text-center">
                <h1 class="font-weight-bold">Gi-FORUM</h1>
                <h4><em>"Kepp Spirit & Keep Coding"</em></h4>
                <h5>Forum sharing ilmu & berdiskusi untuk menemukan solusi!</h5>
                </h5>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12" id="tc_container_wrap">
            <div class="card" id="tc_paneldefault">
                <div class="card-body" id="tc_panelbody">
                    <div class="row">
                        <div class="col-md-8"><br>
                            <table class="table table-bordered table-responsive">
                                <thead class="bg-light text-center" id="tc_thead">
                                    <tr>
                                        <th scope="col">Thread</th>
                                        <th scope="col">Comments</th>
                                        <th scope="col">Views</th>
                                        <th scope="col">Author</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($forums as $forum)
                                    <tr>
                                        <td width="453">
                                            <div class="forum_title">
                                                <h4> <a href="{{ route('forums.show', $forum) }}">{{ $forum->title }}</a></h4>
                                                <p>{!! Str::limit($forum->description, 50, '...') !!}</p>
                                                <div>
                                                    @foreach($forum->tags as $tag)
                                                    <a href="#"
                                                        class="badge badge-primary tag_label">#{{ $tag->name }}</a>
                                                    @endforeach
                                                </div>
                                                @if($forum->image)
                                                <div class="image my-2">
                                                    <img src="{{ asset('storage/' . $forum->image) }}" width="150px"
                                                        alt="">
                                                </div>
                                                @else
                                                <div class="badge badge-primary tag_label_image"><i
                                                        class="fa fa-image"></i></div>
                                                @endif
                                            </div>
                                        </td>
                                        <td style="text-align: center"><small> {{ $forum->comments()->count() }}</small></td>
                                        <td style="text-align: center"><small> {{ $forum->getCounterValue('number_of_visitors') }}</small></td>
                                        <td>
                                            <div class="forum_by">
                                                <small
                                                    style="margin-bottom: 0; color: #666">{{ $forum->created_at->diffForHumans() }}</small>
                                                <small>by <a href="#">{{ $forum->user->name }}</a></small>

                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- pagination -->
                            <div class="d-flex justify-content-center">
                            {{ $forums->links() }}
                            </div>
                        </div>
                        <div class="col-md-4"> <br>
                            <div class="card">
                                <div class="card-header">Popular</div>
                                <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action" id="index_hover">What is
                                        Lorem Ipsum?
                                        <a href="#" class="list-group-item list-group-item-action"
                                            id="index_hover">Where does it come from?
                                        </a>
                                </div>
                            </div>
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
</div><br><br>
@endsection
