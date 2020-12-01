@extends('layouts.app')
@section('title', "My Profile")
@section('content')
<div class="container">
    <div class="jumbotron bg-white border" id="tc_jumbotron_profile">
      <div class="card-body">
        <div class="text-center">
         <div class="profile_img my-3">
           <img src="{{ $user->getImage() }}" style="width: 150px" class="rounded-circle">
         </div>
          <div id="user_name">
            <h3>{{$user->name}}</h3>
            <br>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="card" style="border: none; text-align: center;">
            <div class="card-header">
              <div class="footer_sosial_profile">
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
  </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12" id="tc_container_wrap">
           <div class="card" id="tc_paneldefault">
              <div class="card-body" id="tc_panelbody" style="background: #f9f9f9;">
                 <div class="card">
                    <div class="card-header">
                      <div class="menu_a" style="float: left;">
                      <a href="#">{{$user->name}} Threads</a>
                      </div>
                 </div>
              </div>
          <div class="row">
           <div class="col-md-12">
            <table class="table table-bordered">
            <tbody>
               <tr>
                <td>Title disini.., <i style="font-size: 10px;"> 2 min ago, 2 Comments, 2 Views</i>
                 </td>
                <td width="10"><a href="#" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</a></td>
                <td width="10">
                <form action="#" method="post">
                 @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Delete</button>
                 </form>
                </td>
                <td width="10"><a href="#" class="btn btn-sm btn-info text-white"><i class="fa fa-eye"></i> View</a></td>
              </tr>
              </tbody>
                  </table>
                   </div>
                   </div>
                    <div class="card" style="border: none;">
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
