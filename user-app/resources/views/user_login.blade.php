<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .login-container {
            max-width: 400px;
            margin: auto;
            margin-top: 100px;
        }

        .login-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .login-card-header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .login-card-body {
            padding: 20px;
        }

        .login-form {
            margin-bottom: 20px;
        }

        .login-btn {
            background-color: #007bff;
            color: #fff;
        }

        .login-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="container login-container">
        <div class="card login-card">
            <div class="card-header login-card-header">
                <h3>User Login</h3>
            </div>
            <div class="card-body login-card-body">
                <form class="login-form" method="post" action="{{route('user.auth')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your username" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter your password" name="password">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary login-btn">Login</button>
                    
                </form>
                <div style="color:crimson;">{{session('error')}}</div>
                <p class="text-center">Don't have an account? <a href="/signup">Sign up</a></p>
                <p class="text-center">Login to Admin Dashboard <a href="/admin">Admin Login</a></p>
            </div>
        </div>
    </div>


</body>

</html>
