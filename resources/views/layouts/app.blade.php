<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
       

                <a class="navbar-brand" href="{{route('dashboard')}}">

                    <div class="d-flex">
                    <img src="/svg/logo.jpg" style="height:30px;border-right:1px solid black ;margin-right:10px;" alt=""  class="pr-3">
                  <div class="pl-3">ladox</div> 
                  </div>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 pl-md-5">
            <div class="text-center">
                <a href="{{route('dashboard')}}">
                <img src="/svg/home.png" style="max-height: 30px;" alt="">
            </a>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 pl-md-5">
            <div class="text-center">
            <button id="toggleBtn" class="flex items-center px-4 py-2 bg-white-500 text-white rounded-lg">
            <img src="/svg/rec.png"  alt="Image" class="w-5 h-5 mr-2" />
           
        </button>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 pl-md-5">
            <div class="text-center">
                <img src="/svg/group.png" style="max-height: 30px;" alt="">
            </div>
        </div>
    </div>
</div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Toggle the element's visibility when the button is clicked
            $("#toggleBtn").click(function () {
                $("#elementToToggle").toggle();
            });
        });
    </script>

<ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->username }}
    </a>


    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
 @auth

            <a class="dropdown-item" href="{{ route('profile.edit', ['user' => Auth::user()->id]) }}">
            <div class="d-flex">
                <div>
             @if (!empty(Auth::user()->profile->image))
    <img src="{{ asset('storage/' . Auth::user()->profile->image) }}" class="rounded-circle" style="max-height: 35px" alt="">
@else
    <img src="/svg/tete.jpg" class="rounded-circle" style="max-height: 35px" alt="Default Image">
@endif
                    </div>
                    <div>
                        <span> 
            {{Auth::user()->username}}
            
                       </span>
                    </div>
                   
                 </div>
                 
            </a>
<hr>
            <a class="dropdown-item" href="{{ route('profile.edit', ['user' => Auth::user()->id]) }}">
            <div class="d-flex">
                <div>
<img src="/svg/tet.png" style="max-height:25px;"alt="">
                    </div>
                    <div>
            {{ __('Edit') }}
                    </div>        
                 </div>     
            </a>
            @endauth
            @auth
            <a class="dropdown-item" href="/Setting">
            <div class="d-flex">
                <div>
<img src="/svg/parm.png" style="max-height:25px;"alt="">
                    </div>
                    <div>
            {{ __('Setting') }}
                    </div>
                   
                 </div>
            </a>
        @endauth

        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <div class="d-flex">
                <div>
<img src="/svg/images.png" style="max-height:25px;"alt="">
                    </div>
                    <div>
            {{ __('Logout') }}
                    </div>
                   
                 </div>
        </a>

       

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</li>


                        @endguest
                    </ul>

  
        </nav>
        <div class ="row">

     
        <div class="row">
        <div class="col-md-4"></div>       
        <div class="col-md-4" id="elementToToggle" style="display: none;">
            <label class="relative block">
                <span class="sr-only">Search</span>
                <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                    <svg class="h-5 w-5 fill-slate-300" viewBox="0 0 20 20"><!-- ... --></svg>
                </span>
                <input  id="search"  name="search" class="placeholder:italic placeholder:text-slate-400 block bg-white w-full border border-slate-300 roundbed-md py-2 pl-9 pr-3 shadow-sm focus:outline-none focus:border-sky-500 focus:ring-sky-500 focus:ring-1 sm:text-sm" placeholder="Search for anything..." type="text" />
            </label>
           <div id='result' class="panel panel-default" style="diplay:none">
<ul class="list-group" id="memelist">

</ul>
           </div>
        </div>       
    </div>
        </div>

        <ul>
    
    </ul>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#search').keyup(function () {
            var search = $('#search').val();
            if (search == "") {
                $('#result').html('');
                $('#memelist').hide();
            } else {
                // Send an AJAX GET request to the /search route with the search parameter
                $.ajax({
                    url: "{{ route('search') }}", // Use the route() function to generate the URL
                    type: 'GET',
                    data: { search: search }, // Send the search data as a query parameter
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include the CSRF token if your application uses CSRF protection
                    },
                    success: function (search) {
    $('#result').empty().html(search);
    $('#memelist').show();
},
                    error: function (xhr, status, error) {
                        // Handle any errors here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
</script>

        <main class="py-4">
            @yield('content')
        </main>
       
    </div>
 
</body>
</html>
