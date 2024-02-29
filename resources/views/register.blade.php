<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<style>
    .main{
        box-sizing: border-box;
        height: 100vh;
        /* background-color: aqua; */
    }
    .login-box{
        width: 500px;
        border: 1px solid;
    }
</style>
<body>
    
    <div class="main d-flex justify-content-center align-items-center flex-column">

        @if ($errors->any())
        <div class="alert alert-danger" style="width: 500px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="width: 500px"></button>
        </div>
        @endif
       <div class="login-box">
        <form action="register" method="post" class="border p-3">
            @csrf
            <div>
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control">
            </div>
            <div>
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control mb-3" >
            </div>
            <div>
                <label for="password" class="form-label">Phone</label>
                <input type="text" name="phone" id="phone" class="form-control mb-3">
            </div>
            <div>
                <label for="address" class="form-label">Address</label>
                <textarea type="text" name="address" id="adress" rows="5" class="form-control mb-3"></textarea>
            </div>
            <div>
                <button type="submit" class="btn btn-primary form-control">Register</button>
            </div>
            <div class="d-flex justify-content-center">
                already have an account?<a href="login">Login</a>
            </div>
        </form>
       </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>