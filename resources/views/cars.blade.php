<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cars</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Hover Rows</h2>
  <p>The .table-hover class enables a hover state on table rows:</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>CarName</th>
        <th>Price</th>
        <th>Content</th>
        <th>Published</th>
        <th>category</th>
        <th>Edit</th>
        <th>ShowaCar</th>
        <th>Delete</th>
        <th>ForceDelete</th>
      </tr>
    </thead>
    <tbody>
      <tr> 
        @foreach($cars as $car)
        <td>{{ $car->carTitle }}</td>
        <td>{{ $car->price }}</td>
        <td>{{ $car->description }}</td>
        <td>
            @if( $car->published)
            yes
            @else
            no
            @endif
        </td>
        <td>{{ $car->category->categoryName }}</td>
        <td><a href="editCar/{{ $car->id }}">Edit</a></td>
        <td><a href="carDetails/{{ $car->id }}">CarDetails</a></td>
        <td><a href="deleteCar/{{ $car->id }}">Delete</a></td>
        <td><a href="forceDelete/{{ $car->id }}">ForceDelete</a></td>
      </tr>
        @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
