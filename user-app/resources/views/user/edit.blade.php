@extends('user/layout')

@section('page_title','Edit Details')
@section('container')
<div class="pagetitle">
    <h1>Edit Details</h1>
    
  </div><!-- End Page Title -->


  <div class="card-body">
    <form class="row g-3"  method="post" action="{{route('user.update')}}">
        @csrf
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Your Name</label>
          <input type="text" class="form-control" id="inputNanme4" name="name" value="{{$name}}">
        </div>
        <div class="col-12">
          <label for="inputEmail4" class="form-label">Email</label>
          <input type="email" class="form-control" id="inputEmail4" name="email" value="{{$email}}">
          <div class="error">
            @error('email')
            {{$message}}
            @enderror
        </div>
        </div>
        <div class="col-12">
          <label for="inputPassword4" class="form-label">Password</label>
          <input type="password" class="form-control" id="inputPassword4" name="password">
        </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">Mobile</label>
          <input type="number" class="form-control" id="phone" name="mobile" value="{{$mobile}}">
        </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">Age</label>
          <input type="number" class="form-control" id="age" name="age" value="{{$age}}">
        </div>
        <div class="col-12">
            <label for="gender" class="form-label">Gender</label>
            <select class="form-select" id="gender" name="gender">
                <option value="" disabled>Select your gender</option>
                <option value="Male" {{ $gender == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ $gender == 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Other" {{ $gender == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>
        <div class="col-12">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" id="city" name="city" value="{{$city}}">
          </div>

          <div class="col-12">
            <label for="state" class="form-label">State</label>
            <input type="text" class="form-control" id="state" name="state" value="{{$state}}">
          </div>
        <div class="text-center">
          <button type="submit" name="submit" class="btn btn-primary">Update</button>
          <a href="{{url('/user/dashboard')}}"><button type="button" class="btn btn-secondary">Back</button></a>
        </div>
        <input type="hidden" name="id" value="{{$id}}">
      </form>
  </div>

  <script>
    //validation for mobile
    var maxLengthforcontact = 10;

        document.getElementById("phone").addEventListener("input", function () {   
            var length = this.value.length;
            if (length > maxLengthforcontact) {
                this.value = this.value.substr(0, maxLengthforcontact);
            }
        });
</script>
@endsection

