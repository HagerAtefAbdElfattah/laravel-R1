<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Contact Us</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
</head>

<body class="bg-dark">
  <div class="container">
    <div>
      <a href="{{ LaravelLocalization::getLocalizedURL('en') }}">English</a>
      <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}">Arabic</a>
  </div>
    <div class="row justify-content-center">
      <div class="col-md-4 mt-5 bg-light rounded">
        <h1 class="text-center font-weight-bold text-primary">Contact Us</h1>
        <hr class="bg-light">
        <h5 class="text-center text-success">{{__('messages.contact')}}</h5>
        <form action="{{route('contactUs')}}" method="get" enctype="multipart/form-data" id="form-box" class="p-2">
            @csrf
            <h5 class="text-center font-weight-bold text-primary">Your Message has been sent successfully</h5>
          <div class="form-group">
            <input type="submit" name="GoBack" id="submit" class="btn btn-primary btn-block" value="Go Back"  >
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>