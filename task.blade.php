<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

  <h2>Add Task</h2>
  <form   action = "{{ url('/storetask')}}"  method="post">

   @csrf

  <div class="form-group">
    <label for="exampleInputName">Title</label>
    <input type="text" class="form-control" name="title" value="{{ old('title')}}" id="exampleInputName" aria-describedby="" placeholder="Enter Title">
  </div>

  <div class="form-group">
    <label for="exampleInputName">Description</label>
    <input type="text" class="form-control" name="dis" value="{{ old('description')}}" id="exampleInputName" aria-describedby="" placeholder="Enter Discription">
  </div>


  <div class="form-group">
    <label for="exampleInputName">Start Date</label>
    <input type="date" class="form-control" name="start" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
  </div>

  <div class="form-group">
    <label for="exampleInputName">End Date</label>
    <input type="date" class="form-control" name="end" id="exampleInputName" aria-describedby="" placeholder="Enter Name">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword">Image</label>
    <input type="file"   class="form-control" name="image" value="{{ old('image') }}" id="exampleInputPassword1">
  </div>


  <button type="submit" class="btn btn-primary">Save</button>
</form>
</div>

</body>
</html>
