@extends('user/layout')

@section('page_title','User Dashboard')
@section('container')
<div class="pagetitle">
    <h1>Dashboard</h1>
 
  </div><!-- End Page Title -->
  @if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
      <i class="bi bi-check-circle me-1"></i>
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif


  <div class="row">
    <div class="col-lg-12">

  

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Welcome, {{$data->name}}! Here are your profile details.</h5>

          <!-- List group with Links and buttons -->
          <div class="list-group">
            <button type="button" class="list-group-item list-group-item-action" aria-current="true">
                <strong>Name:</strong> &nbsp; {{$data->name}}
            </button>
            <button type="button" class="list-group-item list-group-item-action"><strong>Email:</strong> &nbsp; {{$data->email}}</button>
            <button type="button" class="list-group-item list-group-item-action"><strong>Mobile:</strong> &nbsp;{{$data->mobile}}</button>
            <button type="button" class="list-group-item list-group-item-action"><strong>Gender:</strong> &nbsp;{{$data->gender}}</button>           
            <button type="button" class="list-group-item list-group-item-action" ><strong>City:</strong> &nbsp;{{$data->city}}</button>
            <button type="button" class="list-group-item list-group-item-action" ><strong>State:</strong> &nbsp;{{$data->state}}</button>
          </div><!-- End List group with Links and buttons -->
          <div class="text-center mt-3">
            <a href="{{url('user/edit/')}}/{{$data->id}}"><button class="btn btn-primary">Edit</button></a>
          </div>
        </div>
        
      </div>

     

    

     

      

    </div>

   

  </div>
@endsection