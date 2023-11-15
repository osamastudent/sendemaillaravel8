<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
    <title>Notification</title>
</head>
<body>
<div class="container mt-5">
<div class="card">
<div class="card-header">
<h1>Send Notification</h1>
</div>

<h1><a href="https://wa.me/923412804405" target="_blank">whatsapp</a></h1>
<div class="card-body">
<form action="{{route('SendNotification')}}" method="post" enctype="multipart/form-data">
    @csrf
<input type="text" name="url" class="mt-3 form-control" placeholder="url">
<input type="text" name="subject" class="mt-3 form-control" placeholder="Subject">
<input type="body" name="body" class="mt-3 form-control" placeholder="Body">
<input type="file" name="myfiles[]" multiple class="mt-3 form-control">

<input type="submit" name="" class="mt-3 btn btn-primary">
</form>
</div>
</div>
</div>
    
</body>
</html>