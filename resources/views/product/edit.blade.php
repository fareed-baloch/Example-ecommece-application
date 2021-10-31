<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/">Admin panel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="/product">Product <span class="sr-only"></span></a>
    </div>
  </div>
</nav>
    <div class="container">
        <br>
        <a href="/product" class="btn btn-primary">view all products</a>
        <br>
    <form action="{{route('product-update')}}" method="post">
        @csrf
        <input type="hidden" value="{{$data->id}}" name="id">
        <label for="">Title</label>
        <input type="text" class="form-control" value="{{$data->title}}" name="title" id="">
        <label for="">des</label>
        <input type="text" class="form-control" value="{{$data->des}}"  name="des" id="">
        <br>
        <button class="btn btn-primary" type="submit">Update</button>
    </form>

    </div>
</body>
</html>