<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Send Email</title>
</head>
<body>
<div class="container mt-5">

@if(session('status'))
<div class="alert">
{{session('status')}}
</div>

@endif
<div class="card">
    <div class="card-header ">
    <b>Send Email</b>
    </div>
    <div class="card-body">
<div class="card-title">

</div>

    <form action="{{route('sendEmailToUser')}}" method="post" enctype="multipart/form-data">

@csrf



  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Send Email</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
     </div>
 

     @error('email')
{{$message}}
     @enderror

       
     <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Subject</label>
    <input type="text" name="subject" class="form-control">
     </div>
 

     @error('title')
{{$message}}
     @enderror


<textarea name="body" id="" cols="30" rows="5" class="form-control">

</textarea>

    <input type="file" name="myfiles[]" multiple class="form-control mt-3" id="exampleInputEmail1" aria-describedby="emailHelp">
     
 

     @error('image')
{{$message}}
     @enderror






  </div>
  <button type="submit" class="btn btn-primary">Send Email</button>
</form>
    </div>
</div>

</div>
</body>
</html>