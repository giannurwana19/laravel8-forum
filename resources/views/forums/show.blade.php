@extends('layouts.app')
@section('title',"$forum->title")
@section('content')
<div class="container">
    <div class="jumbotron bg-primary" id="tc_jumbotron">
        <div class="card-body" id="xx">
            <div class="tc_head_title text-center text-white">
                <h2>{{$forum->title}}</h2>
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
                        <div class="col-md-8">
                            <x-alert />
                            <div class="card">
                                <div class="card-body">
                                    <div class="forum_info">
                                        <span class="d-flex justify-content-end">
                                            <a href="#" class="mr-2"> <i class="fab fa-facebook-f"></i></a>
                                            <a href="#" class="mr-2"> <i class="fab fa-twitter"></i></a>
                                            <a href="#" class="mr-2"> <i class="fab fa-instagram"></i></a>
                                        </span>
                                        <a href="{{ route('profile.index', $forum->user->name) }}" class="badge badge-primary">{{ $forum->user->name }}</a> |
                                        <small>{{$forum->created_at->diffForHumans()}}</small> |
                                        <small>{{ $forum->getCounterValue('number_of_visitors') }} views</small> |
                                        <small>{{ $forum->comments()->count() }} Comments</small> |
                                        @foreach($forum->tags as $tag)
                                        <div class="badge badge-primary">#{{$tag->name}}</div>
                                        @endforeach
                                        @if (empty($forum->image))
                                        @else
                                        <div class="badge badge-primary"><i class="fa fa-image"></i></div>
                                        @endif
                                        <h3 class="my-3">{{$forum->title}}</h3>
                                    </div>
                                    <hr style="margin-top: 0; margin-bottom: 5px;">
                                    <div class="forum_description">
                                        @if (empty($forum->image))
                                        @else
                                        <br>
                                        <div class="tc_if_empty">
                                            <a data-toggle="collapse" data-target="#open_modal"><i class="fa fa-image"
                                                    id="zoom_image"></i></a>
                                            <div id="open_modal" class="collapse">
                                                <div class="bg">
                                                    <img src="{{ asset('storage/'.$forum->image) }}" alt="">
                                                    <div class="overlay">
                                                        <a href="#myModal" data-toggle="modal" data-target="#myModal">
                                                            <h2>Zoom</h2>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        <p>{!!$forum->description!!}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Screenshot:</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="modal_img">
                                            <img src="{{ asset('storage/' . $forum->image) }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="panel panel-default" style="background-color: #f9f9f9;">
                                <div class="panel-body">
                                    <div class="add_comment">
                                        <div class="open_comment">
                                            <div class="h1">
                                                <h4>Add a Comment</h4>
                                            </div>
                                        </div>
                                        @auth
                                        <div class="comment-show">
                                            <form action="{{ route('comments.store', $forum) }}" method="post">
                                                @csrf

                                                <div class="form-group">
                                                    <input type="text" name="content" id="Your-Answer"
                                                        placeholder="Your Comment:" required="required">
                                                    <label for="Your-Comment">Your Comment:</label>
                                                </div>
                                                <div class="button-gg">
                                                    <button class="btn btn-primary btn-sm" type="submit">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                        @else
                                        <div class="comment-show mt-5"><a href="{{ route('login') }}" class="badge badge-primary">Login</a> to comment!</div>
                                        @endauth
                                    </div>
                                </div>
                            </div>

                            <hr>

                            @forelse ($forum->comments as $comment)
                            <div class="card mb-3">
                                <div class="card-header"><i class="fa fa-clock-o"></i>
                                    <small>{{ $comment->created_at->diffForHumans() }}</small></div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2" id="img_comment">
                                            <div class="user-profile text-center">
                                                <img src="{{asset('storage/images/avatar/default.png')}}"
                                                    class="rounded-circle" width="30%">
                                                <div class="comment_user mt-1">
                                                    <small><b>{{ $comment->user->name }}</b></small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            {!! $comment->content !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer link_a d-flex justify-content-between">
                                    <div class="info_comment">
                                        <a style="cursor: pointer" data-toggle="collapse"
                                            data-target="#collapse1info-{{ $comment->id }}"
                                            class="badge badge-primary p-2"><i class="fa fa-info-circle"></i> Info</a>
                                    </div>
                                    <div class="reply_comment">
                                        <a style="cursor: pointer" data-toggle="collapse"
                                            data-target="#collapse1reply-{{ $comment->id }}"
                                            class="badge badge-primary p-2"><i class="fas fa-comment"></i> Reply</a>
                                    </div>
                                </div>

                                <div id="collapse1info-{{ $comment->id }}" class="collapse">
                                    <div class="card-body">*Klik 'Reply' untuk melihat atau membuat komentar balasan.
                                    </div>
                                </div>
                                <div id="collapse1reply-{{ $comment->id }}" class="card-collapse collapse">
                                    <div class="card-body">
                                        <!-- forelse reply-->
                                        @forelse ($comment->comments as $reply)
                                        <div class="card">
                                            <div class="card-header">
                                                <i class="fa fa-clock-o"></i>
                                                <small>{{ $reply->created_at->diffForHumans() }}</small>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        {{ $reply->content }}
                                                    </div>
                                                    <div class="col-md-2" id="img_comment_reply">
                                                        <div class="user-profile text-center">
                                                            <img src="{{asset('storage/images/avatar/default.png')}}"
                                                                class="rounded-circle" width="30%">
                                                            <div class="comment_user mt-1">
                                                                <small><b>{{ $reply->user->name }}</b></small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @empty

                                        @endforelse
                                    </div>
                                    <hr>
                                    <div class="px-4 mb-3">
                                        <form action="{{ route('comments.reply', $comment->id) }}" method="post">
                                            @csrf

                                            <div class="form-group">
                                                <input type="text" name="content" class="form-control" id="input_reply"
                                                    placeholder="Reply here..">
                                            </div>
                                            <button class="btn btn-primary btn-sm font-weight-bold"
                                                type="submit">Submit</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                            @empty
                            <p>No Comment</p>
                            @endforelse
                        </div>
                        <div class="col-md-4">
                            <a href="{{route('forums.create')}}" class="btn btn-primary font-weight-bold btn-block mb-3">Buat
                                Pertanyaan Forum</a>
                            @include('partials._popular')
                        </div>
                    </div>
                    <hr style="margin-top: 0;">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style type="text/css">
    input {
        font-family: inherit;
        -webkit-appearance: none;
        -moz-appearance: none;
        border: 0;
        border-bottom: 1px solid #AAAAAA;
        font-size: 16px;
        color: #000;
        border-radius: 0;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        height: 40px;
        background: transparent;
    }

    button,
    input:focus {
        outline: 0;
    }

    ::-webkit-input-placeholder {
        font-size: 16px;
        font-weight: 300;
        letter-spacing: -0.00933333em;
    }

    .form-group {
        position: relative;
        padding-top: 15px;
        margin-top: 10px;
    }

    label {
        position: absolute;
        top: 0;
        opacity: 1;
        -webkit-transform: translateY(5px);
        transform: translateY(5px);
        color: #aaa;
        font-weight: 300;
        font-size: 13px;
        letter-spacing: -0.00933333em;
        transition: all 0.2s ease-out;
    }

    input:placeholder-shown+label {
        opacity: 0;
        -webkit-transform: translateY(15px);
        transform: translateY(15px);
    }

    .h1 {
        color: #999;
        opacity: 0.8;
        margin: 0;
        font-size: 15px;
        font-weight: 400;
        transition: all 770ms cubic-bezier(0.51, 0.04, 0.12, 0.99);
        text-align: center;
        cursor: pointer;
    }

    .open .h1 {
        -webkit-transform: translateX(200px) translateZ(0);
        transform: translateX(165px) translateZ(0);
    }

    .h2 {
        color: #000;
        font-size: 20px;
        letter-spacing: -0.00933333em;
        font-weight: 600;
        padding-bottom: 15px;
    }

    .add_comment {
        height: 160px;
        border-radius: 4px;
        overflow: hidden;
        position: relative;
    }

    .open_comment {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: all 770ms cubic-bezier(0.51, 0.04, 0.12, 0.99);
        overflow: hidden;
    }

    .open_comment img {
        object-fit: cover;
        width: 100%;
        height: 100%;
        display: block;
        transition: all 770ms cubic-bezier(0.51, 0.04, 0.12, 0.99);
        object-position: left;
    }

    .open .open_comment img {
        -webkit-transform: translateX(280px) translateZ(0);
        transform: translateX(280px) translateZ(0);
    }

    .open .open_comment {
        -webkit-transform: translateX(-400px) translateZ(0);
        transform: translateX(-400px) translateZ(0);
    }

    .comment-show {
        position: absolute;
        top: 0;
        right: 0;
        width: 457px;
        -webkit-transform: translateX(400px) translateZ(0);
        transform: translateX(468px) translateZ(0);
        transition: all 770ms cubic-bezier(0.51, 0.04, 0.12, 0.99);
    }

    .open .comment-show {
        -webkit-transform: translateX(0px) translateZ(0);
        transform: translateX(0px) translateZ(0);
    }

    input[type="checkbox"] {
        cursor: pointer;
        margin: 0;
        height: 22px;
        position: relative;
        width: 22px;
        -webkit-appearance: none;
        transition: all 180ms linear;
    }

    input[type="checkbox"]:before {
        border: 1px solid #aaa;
        background-color: #fff;
        content: '';
        width: 20px;
        height: 20px;
        display: block;
        border-radius: 2px;
        transition: all 180ms linear;
    }

    input[type="checkbox"]:checked:before {
        background: linear-gradient(198.08deg, #B4458C 45.34%, #E281E7 224.21%);
        border: 1px solid #C359AA;
    }

    input[type="checkbox"]:after {
        content: '';
        border: 2px solid #fff;
        border-right: 0;
        border-top: 0;
        display: block;
        height: 4px;
        left: 4px;
        opacity: 0;
        position: absolute;
        top: 6px;
        -webkit-transform: rotate(-45deg);
        transform: rotate(-45deg);
        width: 12px;
        transition: all 180ms linear;
    }

    input[type="checkbox"]:checked:after {
        opacity: 1;
    }

    .button-gg {
        margin-top: 20px;
    }

    .bg,
    .overlay {
        text-align: center;
    }

    .bg .overlay a {
        text-decoration: none;
    }

    img,
    .overlay {
        transition: .3s all;
        border-radius: 3px;
    }

    .bg {
        /*float: left;*/
        max-width: 31%;
        position: relative;
        margin: .5%;
    }

    .bg img {
        width: 100%;
        margin-bottom: -4px;
    }

    .bg .overlay {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        width: 100%;
        background: rgba(0, 0, 0, 0.2);
        color: #fff;
        opacity: 0;
    }

    .bg .overlay h2 {
        padding-top: 14%;
        color: #fff;
    }

    .bg .overlay p {
        font-family: 'Julius Sans One', sans-serif;
    }

    .bg:hover .overlay {
        opacity: 1;
    }

    .bg:hover img {
        -webkit-filter: blur(2px);
        filter: blur(2px);
    }

    @media screen and (max-width: 1148px) {
        .bg {
            max-width: 48%;
            margin: 1%;
        }
    }

    @media screen and (max-width: 768px) {
        .bg {
            float: none;
            max-width: 80%;
            margin: 1% auto;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    var openComment = document.querySelector('.h1');
    var addComment = document.querySelector('.add_comment');
    openComment.addEventListener('click', function(){
    addComment.classList.toggle('open');
});
</script>
@endpush
