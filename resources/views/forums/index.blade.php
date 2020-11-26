@extends('layouts.app')
@section('title','Forum')
@section('content')
<div class="container">
    <div class="jumbotron bg-white border" id="tc_jumbotron">
        <div class="card-body" id="xx">
            <div class="text-center">
                <h1 class="font-weight-bold">Gi-FORUM</h1>
                <h5>Forum sharing ilmu, tanya jawab. Membantu, Mencari Solusi Selesaikan Masalah <em>Coding</em> Mu. </h5>
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
                        <div class="col-md-8" style="padding-right: 0;"><br>
                            <table class="table table-bordered">
                                <thead class="bg-light text-center" id="tc_thead">
                                    <tr>
                                        <th scope="col">Thread</th>
                                        <th scope="col">Comments</th>
                                        <th scope="col">Views</th>
                                        <th scope="col">Author</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td width="453">
                                            <div class="forum_title">
                                                <h4> <a href="#">What is Lorem Ipsum?</a></h4>
                                                <p> Lorem Ipsum is simply dummy text of the printing and typesetting
                                                    industry...</p>
                                                <a href="#" class="badge badge-primary tag_label">#php</a>
                                                <div class="badge badge-primary tag_label_image"><i
                                                        class="fa fa-image"></i></div>
                                            </div>
                                        </td>
                                        <td style="text-align: center"><small> 2</small></td>
                                        <td style="text-align: center"><small> 2</small></td>
                                        <td>
                                            <div class="forum_by">
                                                <small style="margin-bottom: 0; color: #666">2 min ago</small>
                                                <small>by <a href="#">telukcoding</a></small>

                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td width="453">
                                            <div class="forum_title">
                                                <h4> <a href="#">Where does it come from?</a></h4>
                                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It
                                                    has roots in a piece of classical Latin..</p>
                                                <a href="#" class="badge badge-primary tag_label">#php</a>
                                                <div class="badge badge-primary tag_label_image"><i
                                                        class="fa fa-image"></i></div>
                                            </div>
                                        </td>
                                        <td style="text-align: center"><small> 2</small></td>
                                        <td style="text-align: center"><small> 2</small></td>
                                        <td>
                                            <div class="forum_by">
                                                <small style="margin-bottom: 0; color: #666">2 min ago</small>
                                                <small>by <a href="#">telukcoding</a></small>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- pagination -->
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
