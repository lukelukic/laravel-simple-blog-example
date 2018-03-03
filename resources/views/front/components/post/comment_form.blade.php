<div id="comments">
    <div class="comment-bottom heading" id="comments-insert">
        <h3>Leave a Comment</h3>
        <form action="{{ route("postComment", ['postId' => $post->id]) }}" method="post">
            {{ csrf_field() }}
            <textarea cols="77" rows="6" name="content" placeholder="Message"></textarea>
            <input type="submit" value="Send">
        </form>
        <br>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }}
            </div>
        @endif
    </div>
</div>
