<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title>Car Details</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
	</head>

	<body>
		<div class="container">
			<form method="POST" action="{{ route ('carDetails',$car->id) }}" class="m-auto" style="max-width:600px" >
            @csrf
				<h3 class="my-4">Car Details</h3>
				<hr class="my-4" />
				<div class="form-group mb-3 row"><label for="title2" class="col-md-5 col-form-label">Car Title</label>
					<div class="col-md-7"><input type="text" value="{{ $car->carTitle }}" class="form-control form-control-lg" id="title2" name="title" required></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="content4" class="col-md-5 col-form-label">Content</label>
					<div class="col-md-7"><textarea class="form-control form-control-lg" id="content4" name="content" required>{{ $car->description }}</textarea></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="price6" class="col-md-5 col-form-label">Price</label>
					<div class="col-md-7"><input type="text" value="{{$car->price}}" class="form-control form-control-lg" id="price6" name="price" ></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="category" class="col-md-5 col-form-label">Category</label>
					<div class="col-md-7"><input type="text" value="{{$car->category->categoryName}}" class="form-control form-control-lg" id="category" name="category" ></div>
				</div>
				<hr class="bg-transparent border-0 py-1" />
				<div class="form-group mb-3 row"><label for="model7" class="col-md-5 col-form-label">Published</label>
					<div class="col-md-7"><input type="checkbox" id="model7" name="published"></div>
				</div>
			</form>
		</div>
	</body>

</html>