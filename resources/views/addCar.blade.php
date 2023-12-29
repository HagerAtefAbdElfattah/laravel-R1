<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{__('messages.pageTitle')}}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div>
    <a href="{{ LaravelLocalization::getLocalizedURL('en') }}">English</a>
    <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}">Arabic</a>
</div>
  <h2>{{__('messages.pageTitle')}}</h2>
  <form action="{{route ('storeCar') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="title">{{__('messages.carTitle')}}</label>
      <input type="text" class="form-control" id="title" placeholder="{{__('messages.carPlaceholder')}}" name="carTitle" value="{{old('carTitle')}}">
      @error('carTitle')
      <div class="alert alert-warning" role="alert">
       {{$message}}
      </div>
      @enderror
    </div>
    <div class="form-group">
      <label for="price">{{__('messages.priceTitle')}}</label>
      <input type="number" class="form-control" id="price" placeholder="{{__('messages.pricePlaceholder')}}" name="price" value="{{old('price')}}">
         @error('price')
         <div class="alert alert-warning" role="alert">
          {{$message}}
         </div>
         @enderror
    </div>
    <div class="form-group">
        <label for="description">{{__('messages.descriptionTitle')}}</label>
        <textarea class="form-control" rows="5" id="description" placeholder="{{__('messages.descriptionPlaceholder')}}" name="description">{{old('description')}}</textarea>
        @error('description')
         <div class="alert alert-warning" role="alert">
          {{$message}}
         </div>
        @enderror
      </div> 
      <div class="form-group">
            <label for="image">{{__('messages.imageTitle')}}</label>
            <input type="file" class="form-control" id="image" placeholder="{{__('messages.imagePlaceholder')}}" name="image" value="{{ old('image') }}">
            @error('image')
            <div class="alert alert-warning" role="alert">
              {{$message}}
             </div>
            @enderror
        </div>  
        <div class="form-group">
           <label for="category">{{__('messages.categoryTitle')}}</label>
              <select name="category_id" id="category_id" >
                 <option value="">{{__('messages.categoryPlaceholder')}}</option>
                   @foreach($categories as $category)
                 <option value="{{$category->id}}">{{$category->categoryName}}</option>
                   @endforeach
             </select>
                 @error('category_id')
                  <div class="alert alert-warning" role="alert">
                   {{$message}}
                 </div>
                 @enderror
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name="published" value="{{old('published')}}">{{__('messages.publishedTitle')}}</label>
        </div>
    <button type="submit" class="btn btn-default">{{__('messages.submitTitle')}}</button>
  </form>
</div>

</body>
</html>
