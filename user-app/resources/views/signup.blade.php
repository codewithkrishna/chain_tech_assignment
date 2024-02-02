<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up Page</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .signup-container {
            max-width: 400px;
            margin: auto;
            margin-top: 100px;
        }

        .signup-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .signup-card-header {
            background-color: #28a745;
            color: #fff;
            text-align: center;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .signup-card-body {
            padding: 20px;
        }

        .signup-form {
            margin-bottom: 20px;
        }

        .signup-btn {
            background-color: #28a745;
            color: #fff;
        }

        .signup-btn:hover {
            background-color: #218838;
        }
        .error{
            color:crimson;
        }

        /* For Chrome */
            input[type="number"]::-webkit-inner-spin-button,
            input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
            }

            /* For Firefox */
            input[type="number"] {
            -moz-appearance: textfield;
            }
    </style>


</head>

<body>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>

    {{-- <script>
        setTimeout(function(){
            window.location.href = "{{ route('dashboard') }}";
        }, 5000); 
    </script> --}}
@endif
    <div class="container signup-container">
        <div class="card signup-card">
            <div class="card-header signup-card-header">
                <h3>User Sign Up</h3>
            </div>
            <div class="card-body signup-card-body">
                <form class="signup-form" method="post" action="{{route('user.insert')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="fullname" placeholder="Enter your full name" name="name" value="{{ old('name') }}">
                        <div class="error">
                            @error('name')
                            {{$message}}
                            @enderror
                        </div>
                       
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" value="{{ old('email') }}">
                        <div class="error">
                            @error('email')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password">
                        <div class="error">
                            @error('password')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="number" class="form-control" id="phone" placeholder="Enter your mobile" name="mobile" value="{{ old('mobile') }}">
                        <div class="error">
                            @error('mobile')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" id="age" placeholder="Enter your age" name="age" value="{{ old('age') }}">
                        <div class="error">
                            @error('age')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" id="gender" name="gender">
                            <option value="" selected disabled>Select your gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                        <div class="error">
                            @error('gender')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" placeholder="Enter your city" name="city" value="{{ old('city') }}">
                        <div class="error">
                            @error('city')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">State</label>
                        <input type="text" class="form-control" id="state" placeholder="Enter your state" name="state" value="{{ old('state') }}">
                        <div class="error">
                            @error('state')
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success signup-btn" name="submit">Sign Up</button>
                </form>
                <p class="text-center">Already have an account? <a href="{{url('/')}}">Login</a></p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
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
</body>

</html>
