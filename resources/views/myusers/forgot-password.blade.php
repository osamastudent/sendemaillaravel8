<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Forgot Password</title>
</head>
<body>
<div class="container mt-5">
<a href="register"></a>
@if(session('status'))
<div class="alert">
{{session('status')}}
</div>
@else
<div class="alert">
{{session('email')}}
</div>
@endif
<div class="card">
    <div class="card-header ">
    <b>Reset Password</b>
    </div>
    <div class="card-body">
<div class="card-title">

</div>

    <form action="{{route('password.email')}}" method="post">

@csrf



  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
     </div>
 

     @error('email')
{{$message}}
     @enderror
  </div>
  <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
</form>
    </div>
</div>

</div>
</body>
</html>