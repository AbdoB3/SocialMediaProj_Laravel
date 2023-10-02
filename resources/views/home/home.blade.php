@extends('layouts.app')

@section('content')
<div class="container">
    <style>
        /* Reset default browser styles */

        .image-button {
            background-color: transparent; /* Make the button background transparent */
            border: none; /* Remove the default button border */
            cursor: pointer; /* Change cursor to pointer on hover */
            padding: 10px 20px; /* Add padding for button text */
            font-size: 16px; /* Set font size */
            max-width: 100%; /* Ensure the button doesn't exceed its container's width */
        }

        .image-button img {
            vertical-align: middle; /* Center the image vertically */
            max-width: 100%; /* Ensure the image doesn't exceed its container's width */
        }

        /* Apply responsive styles for different screen sizes */
        @media screen and (max-width: 768px) {
            .image-button {
                font-size: 14px; /* Reduce font size for smaller screens */
            }
        }
    </style>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class=" justify-content-center align-items-center flex-wrap">
                @foreach ($posts as $post)
                    <div class="card mb-4 mx-2 post" style="max-width: 500px;">
                        <a href="/profile/{{$post->user->id}}" style="color: black; text-decoration: none; font-weight: bold;">
                            <div class="d-flex">
                                <div style="display: inline-flex;">
                                    @if (!empty($post->user->profile->image))
                                        <img src="{{ asset('storage/' . $post->user->profile->image) }}" class="rounded-circle" 
                                        style="width: 15%; padding: 6px;" alt="">
                                    @else
                                        <img src="/svg/tete.jpg" class="rounded-circle" style="width: 15%; padding: 6px;" alt="Default Image">
                                    @endif 
                                    <div class="font-weight-bold custom-padding">
                                        <p>{{$post->user->username}}<br>
                                            <strong style="font-weight: normal;">{{$post->created_at}}</strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <img src="{{ asset('storage/' . $post->image) }}" class="w-100" alt="Post Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->caption }}</h5>
                        </div>
                        <div class="row">
                            
                               
                          
                        <div class="col-md-4"> 
                       
       
   
                                <div class="post" data-post-id="{{ $post->id }}" >
                                <span class="like2"> {{ $post->like->count() }}</span>

                                <button class="ml-6 flex items-center  like-button" data-post-id="{{ $post->id }}">
                                <img src="svg/likenor.png" alt="Image" class="w-4 h-4 mr-2"> 
                                </button></div>
                        </div>
       
                            <div class="col-md-4"> 
                                <button class="image-button btn_comment">
                                    <img src="/svg/tet00.png"  class="flex items-center " style="max-height:25px;" alt="Image">
                                </button>
                                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                            </div>
                            <div class="col-md-4"> 
                                <button class="image-button">
                                    <img src="/svg/share.png" style="max-height:25px;" alt="Image">
                                </button>
                            </div>
                            
                        </div>
                            

                        @foreach ($post->comments->take(3) as $comment)
                                @if ($comment->post_id==$post->id)
                                    <div class="form-group m-2 d-inline-flex">
                                    <img src="{{asset('storage/' . $comment->user->profile->image)}} " class="rounded-circle"style="width: 9%; padding: 6px;" alt="img">
                                       <span class="mr-2">{{$comment->user->name}}</span>
                                        
                                        <input type="text" class="form-control "  readonly name="comment" value="{{$comment->comment}}">                        
                                    </div>
                                @endif
                            @endforeach
                            <button id="load-more-comments">View More</button>
                        <form action="{{route('add.comment',$post->id)}}" method="post" class='add_comment' >
                        @csrf
                            <div class="form-group m-3">
                                <textarea class="form-control " name="comment"  rows="3" class="comment"></textarea>
                                <div class="d-flex justify-content-end"><button type="submit" class="image-button"> <img src="/svg/send.png" style="max-height:25px;" alt=""></button></div>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{ $posts->links() }}
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<script>
   
  

    $('#load-more-comments').on('click', function() {
        // Send an AJAX request to fetch more comments
        $.ajax({
            url: "/load-more-comments", // Replace with your route to fetch more comments
            type: 'GET',
            
            success: function(response) {
                console.log(response)
                
                if (response.html !== '') {
                    // Append the new HTML to the "additional-comments" container
                    $('.additional-comments').append(response.html);
                } else {
                    $('#load-more-comments').hide(); // No more comments, hide the button
                }
            }
        });
    });







    $(document).ready(function() {
        $('.add_comment').submit(function(e) {
            e.preventDefault(); 
           
            var formData = $(this).serialize();
            var form = $(this);
            
            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                success: function(response) {
                    form.trigger('reset');
                },
            });
        });
    });



    const commentElements = document.getElementsByClassName('add_comment');

    for (let i = 0; i < commentElements.length; i++) {
    commentElements[i].style.display = 'none';
}
const commentButtons = document.querySelectorAll(".btn_comment");

commentButtons.forEach(button => {
    button.addEventListener("click", toggleCommentField);
});

function toggleCommentField(event) {
    // Find the parent post element
    const post = event.target.closest(".post");

    // Find the comment field within the post
    const commentField = post.querySelector(".add_comment");

    // Toggle the visibility of the comment field
    if (commentField.style.display === "none" || commentField.style.display === "") {
        commentField.style.display = "block";
    } else {
        commentField.style.display = "none";
    }
}





    $(document).ready(function () {

        // Attach the click event to a higher-level container (document)
        $(document).on('click', '.like-button', function () {
          

            var postId = $(this).data('post-id');
            var token = "{{ csrf_token() }}";

            $.ajax({
                type: "POST",
                url: "{{ route('like') }}",
                data: {
                    'post_id': postId,
                    '_token': token
                },
                success: function (data) {
    if (data.like_count !== undefined) {
        // Get the current like count for the specific post
        var currentLikeCount = parseInt($('.post[data-post-id="' + postId + '"] .like2').text());

        // Add 1 to the current like count (if it exists)
        currentLikeCount = (currentLikeCount || 0) + 1;

        // Update the like count for the specific post
        $('.post[data-post-id="' + postId + '"] .like2').text(currentLikeCount);
    } else {
        alert('No like count data received.');
    }
},

                error: function () {
                    alert('Error occurred while processing the like action.');
                }
            });
        });


        $('.unlike-button').click(function () {
            var postId = $(this).data('post-id');
            var token = "{{ csrf_token() }}";

            $.ajax({
                type: "DELETE",
                url: "{{ route('unlike') }}",
                data: {
                    'post_id': postId,
                    '_token': token
                },
                success: function () {
                    // Update the button or UI to indicate that the post is unliked.
                }
            });
        });
    });

    
</script>
@endsection
