@extends('admin/layout')

@section('page_title','Users List')
@section('container')
<div class="pagetitle">
    <h1>All Users</h1>
 
  </div><!-- End Page Title -->
  @if(session('message'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i>
      {{ session('message') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <table class="table datatable">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Mobile</th>
        <th scope="col">Age</th>
        <th scope="col">Gender</th>
        <th scope="col">City</th>
        <th scope="col">State</th>        
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($data as $list)
      <tr>
        <th scope="row">{{$list->id}}</th>
        <td>{{$list->name}}</td>
        <td>{{$list->email}}</td>
        <td>{{$list->mobile}}</td>
        <td>{{$list->age}}</td>
        <td>{{$list->gender}}</td>
        <td>{{$list->city}}</td>
        <td>{{$list->state}}</td>        
        <td>
          
          @if($list->status==1)
            <a href="{{url('admin/userslist/status/0')}}/{{$list->id}}"><span class="badge bg-success">Active</span></a>
          
            @elseif($list->status==0)
              <a href="{{url('admin/userslist/status/1')}}/{{$list->id}}"><span class="badge bg-warning">Deactive</span></a>

          @endif


          
         <a href="{{url('admin/userslist/delete/')}}/{{$list->id}}"><span class="badge bg-danger">Delete</span></a> 
        
        </td>
      </tr>
     @endforeach
    </tbody>
  </table>
@endsection