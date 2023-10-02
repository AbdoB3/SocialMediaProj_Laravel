@extends('layouts.app')

@section('content')
<div class="container">
    <style>
.custom-padding {
    padding: 4px; /* Adjust the padding as needed */
}

.custom-margin {
    margin: 10px; /* Adjust the margin as needed */
}</style>
   <div class="row">
    
    <div class="col-8">
        
            <img src="/storage/{{$post->image}}" class="w-100" alt="">

    </div>
    <div class="col-4">
        <div>
        <div class="d-flex">
    <div class="pr-5 pl-3 custom-padding">
    @if (!empty($post->user->profile->image))
    <img src="{{ asset('storage/' . $post->user->profile->image) }}" class="rounded-circle" style="max-height: 30px" alt="">
@else
    <img src="/svg/tete.jpg" class="rounded-circle" style="max-height: 30px" alt="Default Image">
@endif 
    </div>
    <div class="font-weight-bold custom-padding">
        <a href="/profile/{{$post->user->id}}" style="color:black;text-decoration: none;">
            <p><strong>{{$post->user->username}}</strong></p>
        </a>
    </div>
    <div class="pl-3 custom-padding">
        <a href="#" class="pl-3">Follow</a>
    </div>
</div>

            <hr>
           
                <div class="font-weight-bold">
                          <a href="/profile/{{$post->user->id}}" style="color:black;text-decoration: none;">  <p><strong>{{$post->user->username}}</strong></p></a>

                </div>
        <p><strong>{{$post->caption}}</strong></p>
        
    </div>
    
   </div>
</div>
@endsection
