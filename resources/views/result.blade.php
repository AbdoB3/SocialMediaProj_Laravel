<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
@if(count($users) > 0)
    @foreach($users as $user2)
        <li class="list-group-item">
        <a href="{{ url('profile/' . $user2->id) }}" class="flex items-center">
  <img src="/storage/{{$user2->profile->image}}" class="rounded-full w-16 h-16" alt="">
  <span class="ml-2">{{ $user2->username }}</span>
</a>    
 </li>
    @endforeach
@else
    <li class="list-group-item">No users found.</li>
@endif
