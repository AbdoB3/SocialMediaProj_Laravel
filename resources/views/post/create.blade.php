@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
@csrf
   <div class="row">

<div class="col-8 offset-2">
<div class="form-group row">
                    
<div class="row">
    Add post

</div>
   <label for="caption" class="col-md-4 col-form-label ">{{ __('caption') }}</label>


    <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus>

    @error('caption')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror

</div>
<div class="row ">
<label for="image" class="col-md-4 col-form-label ">{{ __('image') }}</label>
<input id="image" type="file" class="form-control-file" name="image" value="{{ old('image') }}" required autocomplete="image" autofocus>

</div>
<div class="row pt-3">
<button class='btn btn-primary '>add post</button>
</div>
   </div>
   </form>
</div>
@endsection
