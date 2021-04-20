<turbo-stream target="new_comment" action="update">
    <template>
        @include('comments._form', ['post' => $comment->post, 'comment' => new \App\Models\Comment()])
    </template>
</turbo-stream>
