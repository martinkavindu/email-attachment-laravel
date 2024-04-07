<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>
</head>
<body>
 <div class ="container"> 
<h2 class = "text-center">contact</h2>

<form action="{{route('send.mail')}}" method = "POST">
  @csrf
  @if (session()->has('error'))
  <div class="alert alert-danger">
      {{ session()->get('error') }}
  </div>
@endif

@if (session()->has('success'))
  <div class="alert alert-success">
      {{ session()->get('success') }}
  </div>
@endif

  <div class="form-group">
    <label for="name">name:</label>
    <input type="text" class="form-control" id="name" name= "name"  value = "{{old('name')}}">
    @error('name') <span class = "text-danger">{{$message}} </span> @enderror
  </div>
  <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" id="email" name= "email"  value = "{{old('email')}}">
    @error('email') <span class = "text-danger">{{$message}} </span> @enderror
  </div>
  <div class="form-group">
    <label for="subject">subject:</label>
    <input type="text" class="form-control" id="subject" name= "subject"  value = "{{old('subject')}}">
    @error('subject') <span class = "text-danger">{{$message}} </span> @enderror
  </div>
  {{-- <div class="form-group">
    <label> Upload CV</label>

    <input type="file" name="file" class="form-control">
  </div> --}}
  <div class="form-group">
    <label for="message">Message:</label>
    <textarea class="form-control" name="message">{{ old('message') }}</textarea>
    @error('message') <span class="text-danger">{{ $message }}</span> @enderror
</div>

  <!-- <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div> -->
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</div>   
</body>
</html>