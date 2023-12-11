<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update car</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>PLACES</h2>
  <table class="table table-hover">
    <thead>
      <tr>
        <th>place Name</th>
        <th>place date </th>
        <th>Content</th> 
        <th>Price From</th>
        <th>Price To</th>
        <th>Published</th>
        <th>Edit</th>
        <th>Showaplace</th>
        <th>Delete</th>
      </tr>
    </thead>
    {{-- as an exercise  --}}
  @each('includes.placeTableRows', $places, 'place')
  </table>
</div>

</body>
</html>
