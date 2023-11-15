<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>verification</title>
</head>
<body>
<div class="container mt-5">
<h1>verify Your Email</h1>
<form action="{{route('verification.send')}}" method="post">
@csrf
  <button type="submit" class="btn btn-primary">Resend Email</button>
</form>
</div>
</body>
</html>