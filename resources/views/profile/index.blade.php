@extends('layouts.app')


@section('content')
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<style>
/* Style for the button container */
.image-button {
  position: relative;
  display: inline-block;
}

.image-button img {
  width: 100%;
  height: auto;
}

/* Style for the button */
.image-button .btn-container {
  position: absolute;
  top: 0; /* Adjust the top position as needed */
  right: 0; /* Adjust the right position as needed */
  cursor: pointer;
}

.image-button .btn {
  background-color: #555;
  color: white;
  font-size: 16px;
  padding: 4px 8px;
  border: none;
  border-radius: 50%; /* Makes the button circular */
}

/* Style for the menu */
.image-button .menu {
  position: absolute;
  top: 100%; /* Position menu below the button */
  right: 0;
  display: none;
  background-color: #fff;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.image-button .menu a {
  color: black;
  padding: 8px 12px;
  text-decoration: none;
  display: block;
}

.image-button .menu a:hover {
  background-color: #f2f2f2;
}

.image-button:hover .menu {
  display: block;
}
</style>

<div class="container">
   <div class="row">
    <div class="col-3 p-5">
    @if (!empty($user->profile->image))
    <img src="{{ asset('storage/' . $user->profile->image) }}" class="rounded-circle" style="height: 200px" alt="">
@else
    <img src="/svg/tete.jpg" class="rounded-circle" style="height: 200px" alt="Default Image">
@endif  
  </div>
    <div class="col-9 pt-5">
        <div>
            <div class="d-flex justify-content-between align-items-baseline">
              <div> <h1>{{ $user->username }}</h1> </div>
              @auth
              @if (auth()->user()->id != $user->id)
             
             
              <div  class="post" data-user-id="{{ $user->id }}">
              <button id="flow" class="bg-{{$color}}-500 hover:bg-{{$color}}-700 text-white font-semibold py-2 px-4 rounded-full shadow-md follow "data-user-id="{{ $user->id }}">
            {{$text}}
            </button>
          </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   

    $(document).ready(function () {








        $(document).on('click', '.follow', function () {
          

            var follow = $(this).data('user-id');
            var token = "{{ csrf_token() }}";
           

            $.ajax({
                type: "POST",
                url: "{{ route('follow') }}",
                data: {
                    'userid': follow,
                    '_token': token
                },
              
                success: function (data) {
                  if(data=='oui')
                  {
                    $('#flow').css('background','red');
                    $('#flow').text('unfollow');

                  }else{
                    $('#flow').css('background','green');
                    $('#flow').text('follow');


                  }
},

                error: function () {
                }
            });
        });


       
    });
</script>
            </script>
              @endif
                  @endAuth      

                @auth
                @if(auth()->user()->id == $user->id)
                <div class="d-flex">
                  <div>
                  <img src="/svg/add.png" style="max-height:25px;" alt="">
                  </div>
                  <div>
                  <a href="{{url('/post/create')}}" style="text-decoration: none; color: black; color: initial;">Add New Post</a>

                  </div>
                </div>
                @endif
                  @endAuth
            </div>
             
          
            <div class="d-flex">
                <div style="margin:4px;"><strong>{{$user->post->count()}}</strong>posts</div>
                <div style="margin:4px;"><strong>{{$count}}</strong>flowers</div>
                <div style="margin:4px;"><strong>900</strong>flowing</div>
            </div>
            <div class="pt-4 " style="font-weight: bold;">{{ $user->profile->title }}</div>
            <div>{{$user->profile->description}}</div>
            <div><a href="{{$user->profile->url}}">{{$user->profile->url}}</a></div>
        </div>
    </div>
   </div>

   <div class="flex flex-wrap -mx-2 pt-4">
    @foreach($user->post as $post)
    <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/4 px-2 pb-5">
        <div class="relative image-button">
            <a href="/post/{{$post->id}}">
                <img src="/storage/{{$post->image}}" class="w-full h-auto" alt="Post Image">
                @auth
                @if(auth()->user()->id == $user->id)
                    <div class="absolute top-0 right-0 p-2">
                        <button class="bg-gray-600 text-white rounded-full p-2 hover:bg-red-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                        <div class="hidden menu bg-white border border-gray-300 absolute top-8 right-0 py-2 rounded-lg shadow">
                            <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Delete</a>
                            <a href="/post/{{$post->id}}/edit" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Update</a>
                        </div>
                    </div>
                @endif
                @endauth
            </a>
        </div>
    </div>
    @endforeach
</div>

</div>
@endsection
