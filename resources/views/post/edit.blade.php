@extends('layouts.app')
@section('content')
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<div class="container">
<form action="/post/{{$post->id}}" method="post" enctype="multipart/form-data">
@csrf
@method('PATCH')
   <div class="row">
    <div class="md:w-1/4"></div>
    <div class="md:w-1/4">
        <label for="caption" class="col-md-4 col-form-label ">{{ __('caption') }}</label>


    <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') ?? $post->caption }}" required autocomplete="caption" autofocus>

    @error('caption')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
   
    <label for="image" class="col-md-4 col-form-label mt-4" >{{ __('image') }}</label>
<input id="image" type="file" class="form-control-file" name="image" value="{{ old('image') }}" required autocomplete="image" autofocus>


<button class="w-24 h-12 m-4 hover:bg-sky-700 rounded-full rounded-l-md rounded-r-md bg-blue-500 text-white flex items-center justify-center">
 
        Edit post
    </button>
    </div>
    <div class="md:w-1/4"></div>

   
   

    


   



   </div>
   </form>
</div>
@endsection
