<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <a href="/category/create" class="btn btn-primary">Create New Category</a>
    <div class="container" >
    <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">id#</th>
      <th scope="col">title</th>
      <th scope="col">description</th>
      <th scope="col">Created_at</th>
      <th scope="col">Updated_at</th>
      <th scope="col">Edit</th>
      <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $category)
    <tr>
   
      <th>{{$category->id}}</th>
      <td>{{$category->title}}</td>
      <td>{{$category->des}}</td>
      <td>{{$category->created_at}}</td>
      <td>{{$category->updated_at}}</td>
      <td><a class="btn btn-info" href="/category/edit/{{$category->id}}">Edit</a></td>
      <td><a class="btn btn-info" href="/category/delete/{{$category->id}}">Delete</a></td>
    </tr>
  @endforeach
  </tbody>
</table>
    </div>
</body>
</html>