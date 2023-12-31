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
  <h2>Update car</h2>
  <form action="{{route('updateCar',$car->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter title" name="carTitle" value="{{$car->carTitle}}">
      @error('carTitle')
                {{ $message }}
      @enderror
    </div>
    <div class="form-group">
      <label for="price">Price:</label>
      <input type="number" class="form-control" id="price" placeholder="Enter Price" name="price" value="{{$car->price}}" >
      @error('price')
                {{ $message }}
      @enderror
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" rows="5" id="description" name="description" >{{$car->description}}</textarea>
        @error('description')
                {{ $message }}
        @enderror
    </div> 
    {{-- task--11 --}}
    <div class="form-group">
      <label for="category">Category:</label>
      <select name="category_id" id="category">
       <option  value="{{$car->category_id}}">{{$car->category->categoryName }}</option>
         @foreach($categories as $cat)
           <option value="{{$cat->id}}">{{$cat->categoryName}}</option>
         @endforeach
      </select>
    </div> 
    {{-- end task-- 11---}}
    <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" class="form-control" id="image" name="image" value="{{ $car->image }}" >
        <img src="{{asset ('assets/images/'.$car->image)}}" alt="cars" width="200px" >
        <!-- the hidden input for the image so it won't be updated if there is no new value -->
        <input type="hidden" name="oldImage" value="{{$car->image}}">
            @error('image')
                {{ $message }}
            @enderror
    </div>  
    <div class="checkbox">
      <label><input type="checkbox" name="published" @checked($car->published) > Published</label>
    </div>
    <button type="submit" class="btn btn-default">update</button>
  </form>
</div>

</body>
</html>
