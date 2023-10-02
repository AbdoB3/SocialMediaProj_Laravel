@extends('layouts.app')

@section('content')
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<div class="container">
<form action="/profile/{{$user->id}}" method="post" enctype="multipart/form-data">
@csrf
@method('PATCH')
   <div class="row">
<div class="md:w-1/4"></div>
<div class="md:w-1/4">
<label for="title" class="col-md-4 col-form-label ">{{ __('title') }}</label>


<input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->profile->title }}" required autocomplete="title" autofocus>

@error('title')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
<label for="description" class="col-md-4 col-form-label ">{{ __('description') }}</label>


<input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $user->profile->description }}" required autocomplete="description" autofocus>

@error('description')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
<label for="url" class="col-md-4 col-form-label ">{{ __('url') }}</label>


    <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? $user->profile->url }}" required autocomplete="url" autofocus>

    @error('url')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <form class="flex items-center space-x-6 m-4">
  <div class="shrink-0">
    @if (!empty($user->profile->image))
                                    <img src="{{ asset('storage/' . $user->profile->image) }}" class="h-16 w-16 object-cover  rounded-full m-4" 
                                     alt="">
                                @else
                                    <img src="/svg/tete.jpg" class="h-16 w-16 object-cover  rounded-full m-4"  alt="Default Image">
                                @endif 
  </div>
  <label class="block">
    <span class="sr-only">Choose profile photo</span>
    <input type="file" name="image" class="block w-full text-sm text-slate-500
      file:mr-4 file:py-2 file:px-4
      file:rounded-full file:border-0
      file:text-sm file:font-semibold
      file:bg-violet-50 file:text-violet-700
      hover:file:bg-violet-100
    "/>
  </label>
</form>
<div class="row pt-5">
<button class="w-24 h-12 hover:bg-sky-700 rounded-full rounded-l-md rounded-r-md bg-blue-500 text-white flex items-center justify-center">
 
        Edit post
    </button>
</div>
</div>
<div class="md:w-1/4"></div>
  



  

   



   </div>
   </form>
</div>
@endsection
