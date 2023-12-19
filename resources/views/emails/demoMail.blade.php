<x-mail::message>
# Introduction

The body of your message.<br>

Content:{{$content}}

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

{{-- This is how the template would be in html  --}}
{{-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <title>You've got mail</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <form action="action_page.php">
      
           <div class="form-group">
               <label for="title">Name</label>
               <input type="text" class="form-control" id="name" placeholder="Entername" name="name" value=" {{ $content['name'] }}">
          </div>
      
           <div class="form-group">
               <label for="title">Email</label>
               <input type="text" class="form-control" id="email" placeholder="email" name="email" value=" {{ $content['email'] }}">
           </div>

           <div class="form-group">
            <label for="title">Subject</label>
            <input type="text" class="form-control" id="subject" placeholder="Entername" name="subject" value=" {{ $content['subject'] }}">
           </div>

           <div class="form-group">
             <label for="subject">Content</label>
             <textarea id="content" name="content" placeholder="Write something.." style="height:200px"> {{ $content['content'] }} </textarea>
           </div>
          
      
        </form>
      </div>
      
</body>
</html> --}}
