
<div class="avatar av-l chatify-d-flex"><img src="{{ asset('storage/' . Auth::user()->profile->image) }}" class="rounded-circle" style="max-height:100px;" alt="">
</div>

<p class="info-name">{{ Auth::user()->username }}</p>

<div class="messenger-infoView-btns">
    <a href="#" class="danger delete-conversation">Delete Conversation</a>
</div>

{{-- shared photos --}}
<div class="messenger-infoView-shared">
    <p class="messenger-title"><span>Shared Photos</span></p>
    <div class="shared-photos-list"></div>
</div>
