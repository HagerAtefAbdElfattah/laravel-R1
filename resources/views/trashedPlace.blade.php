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
            <th>Place Title</th>
            <th>Content</th>
            <th>Price Fromr</th>
            <th>Price To</th>
            <th>Published</th>
            <th>Edit</th>
            <th>Place Details</th>
            <th>Restore</th>
          </tr>
        </thead>
        <tbody>
          <tr> 
            @foreach($places as $place)
            <td>{{ $place->title }}</td>
            <td>{{ $place->content }}</td>
            <td>{{ $place->priceFrom }}</td>
            <td>{{ $place->priceTo }}</td>
            <td>
                @if( $place->published)
                yes
                @else
                no
                @endif
            </td>

            <td><a href="restorePlace/{{ $place->id }}">Restore</a></td>
          
          </tr>
            @endforeach
        </tbody>
      </table>
    </div>
    
    </body>
    </html>
