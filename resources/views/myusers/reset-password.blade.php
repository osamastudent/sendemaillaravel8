<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Reset Pasword</title>
</head>
<body>
<div class="container mt-5">
<a href="register">register</a>
@if(session('status'))
<div class="alert">
{{session('status')}}
</div>
@else
<div class="alert">
{{session('email')}}
</div>
@endif
<form action="{{route('password.update')}}" method="post">

@csrf

<input type="hidden" name="token" value="{{$token}}">

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
     </div>

  @error('email')
{{$message}}
  @enderror
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>

  @error('password')
{{$message}}
  @enderror

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1">
  </div>
  
  @error('password_confirmation')
{{$message}}
  @enderror
  <input type="submit" class="btn btn-primary mt-3" value="Reset Password">
</form>

</div>
</body>
</html>