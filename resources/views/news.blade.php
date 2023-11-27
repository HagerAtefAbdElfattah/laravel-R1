<!DOCTYPE html>
<html lang="en">
<head>
  <title>News</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>News</h2>
  <p>The .table-hover class enables a hover state on table rows:</p>            
  <table class="table table-hover">
    <thead>
      <tr>
        <th>News Title</th>
        <th>Content</th>
        <th>Author</th>
        <th>Published</th>
        <th>Edit</th>
        <th>NewsDetails</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <tr> 
        @foreach($showNews as $news)
        <td>{{ $news->title }}</td>
        <td>{{ $news->content }}</td>
        <td>{{ $news->author }}</td>
        <td>
            @if( $news->published)
            yes
            @else
            no
            @endif
        </td>
        <td><a href="editNews/{{ $news->id }}">Edit</a></td>
        <td><a href="newsDetails/{{ $news->id }}">Details</a></td>
        <td><a href="deleteNews/{{ $news->id }}">Delete</a></td>
      </tr>
        @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
