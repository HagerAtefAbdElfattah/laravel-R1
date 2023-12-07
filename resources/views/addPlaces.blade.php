<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Insert a place</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
	</head>

	<body>
		<div class="container">
			<form method="POST" action="{{route ('storePlaces') }}" class="m-auto" style="max-width:600px" enctype="multipart/form-data">
            @csrf
				<h3 class="my-4">Insert a place</h3>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="title2" class="col-md-5 col-form-label"> PLACE TITLE</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="title2" name="title" value="{{ old('title') }}"></div>
					@error('title')
                     <div class="alert alert-warning" role="alert">
                        {{$message}}
                     </div>
                    @enderror
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="content4" class="col-md-5 col-form-label">CONTENT</label>
					<div class="col-md-7"><textarea class="form-control form-control-lg" id="content4" name="content" >{{ old('content') }}</textarea></div>
					@error('content')
                     <div class="alert alert-warning" role="alert">
                      {{$message}}
                     </div>
                    @enderror
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="price6" class="col-md-5 col-form-label">PRICE FROM</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="price6"  name="priceFrom" value="{{ old('priceFrom') }}"></div>
					@error('priceFrom')
                     <div class="alert alert-warning" role="alert">
                      {{$message}}
                     </div>
                    @enderror
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="price6" class="col-md-5 col-form-label">PRICE TO</label>
					<div class="col-md-7"><input type="text" class="form-control form-control-lg" id="price6"  name="priceTo" value="{{ old('priceTo') }}"></div>
					@error('priceTo')
                     <div class="alert alert-warning" role="alert">
                      {{$message}}
                     </div>
                    @enderror
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="price6" class="col-md-5 col-form-label">IMAGE</label>
					<div class="col-md-7"><input type="file" class="form-control form-control-lg" id="image"  name="image" value="{{ old('image') }}"></div>
					@error('image')
                     <div class="alert alert-warning" role="alert">
                      {{$message}}
                     </div>
                    @enderror
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="model7" class="col-md-5 col-form-label">PUBLISHED</label>
					<div class="col-md-7"><input type="checkbox" id="model7" name="published"></div>
					@error('published')
                     <div class="alert alert-warning" role="alert">
                      {{$message}}
                     </div>
                    @enderror
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="insert10" class="col-md-5 col-form-label"></label>
					<div class="col-md-7"><button class="btn btn-primary btn-lg" type="submit">Insert</button></div>
				</div>
			</form>
		</div>
	</body>

</html>