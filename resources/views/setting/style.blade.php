@extends('layouts.app')


@section('content')



<div class="container">
<style>
        /* Reset default browser styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Create a gradient background */
.menu {
    background: rgb(255 255 255);
    padding: 20px;
    text-align: center;
}

.menu ul {
    list-style: none;
}

/* Style the menu items */
.menu ul li {
    margin-bottom: 10px;
}

.menu ul li a {
    text-decoration: none;
    color: black;
    font-size: 18px;
    display: block;
    padding: 10px; /* Equal padding on all sides */
    transition: background-color 0.3s ease;
}

/* Change background color on hover */
.menu ul li a:hover {
    background-color: #555;
}

/* Add responsive styling for smaller screens */
@media screen and (max-width: 768px) {
    .menu ul {
        flex-direction: column;
    }

    .menu ul li {
        margin-bottom: 5px;
    }
}

 

/* Add responsive styling for smaller screens */
@media screen and (max-width: 768px) {
    .profile-image {
        width: 15%; /* Adjust the width for smaller screens */
    }
}


      

    </style>
   <div class="row">
  <div class="col-md-3">
  <nav class="menu">
            <ul>
                <li style='background:gray;'><a href="/Setting/Style">Style</a></li>
                <li><a href="#">langue</a></li>
                <li><a href="#">Historique</a></li>
                <li><a href="#">contact</a></li>
                <li><a href="#">Notification</a></li>
            </ul>
        </nav>
  </div>
  <div class="col-md-5"></div>
  <div class="col-md-4"></div>

    </div>
</div>
@endsection
