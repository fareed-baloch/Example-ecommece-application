<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Prodcuts</title>
    <!-- CSS only -->
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
<a href="/product/create" class="btn btn-primary">Create +</a>
<br>
    <table class="table">
        <tr>
            <th>id</th>
            <th>title</th>
            <th>description</th>
            <th>created</th>
            <th>updated</th>
            <th>edit</th>
            <th>delete</th>
        </tr>

@foreach($data as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->title}}</td>
            <td>{{$product->des}}</td>
            <td>{{$product->created_at}}</td>
            <td>{{$product->updated_at}}</td>
            <td> <a class="btn btn-outline-primary"  href="/product/edit/{{$product->id}}">edit</a></td>
            <td> <a class="btn btn-outline-danger" href="/product/delete/{{$product->id}}">delete</a></td>
        </tr>
@endforeach
    </table>
    </div>
</body>
</html>