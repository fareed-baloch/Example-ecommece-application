<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<form action="{{ route('category-create') }}" method="post">
    @csrf
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" >
  </div>
  <div class="form-group">
    <label>Discription</label>
    <input type="text" class="form-control" name="des" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    
</body>
</html>