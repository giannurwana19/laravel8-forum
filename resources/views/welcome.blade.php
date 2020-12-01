@extends('layouts.app')
@section('title','Home')
@section('content')
<div class="container">
    <div class="jumbotron bg-primary" id="tc_jumbotron">
        <div class="card-body">
            <div class="text-center text-white">
                <h1>WELCOME</h1>
                <p>Love beautiful code? We do too. </p>
            </div>
        </div>
        <div class="card" style="border: none;">
            <div class="panel-header rounded" style="background: #f5f8fa;">
                <div class="footer_sosial p-2 text-center">
                    <a href="" class="mr-3"><i class="fa fa-2x fa-edit"></i></a>
                    <a href="" class="mr-3"><i class="fas fa-2x fa-list"></i></a>
                    <a href="" class="mr-3"><i class="fas fa-2x fa-search"></i></a>
                    <a href="" class="mr-3"><i class="fab fa-2x fa-facebook-f"></i></a>
                    <a href="" class="mr-3"><i class="fab fa-2x fa-twitter"></i></a>
                    <a href="" class="mr-3"><i class="fab fa-2x fa-instagram"></i></a>
                    <a href="" class="mr-3"><i class="fab fa-2x fa-google-plus"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12" id="tc_container_wrap">
        </div>
    </div>
</div>
@endsection
