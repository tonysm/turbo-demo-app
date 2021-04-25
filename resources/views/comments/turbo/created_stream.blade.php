<turbo-stream target="@domid($comment->post, 'comments')" action="append">
    <template>
        @include('comments._comment', ['comment' => $comment])
    </template>
</turbo-stream>

<turbo-stream target="new_comment" action="update">
    <template>
        @include('comments._form', ['post' => $comment->post, 'comment' => new \App\Models\Comment()])
    </template>
</turbo-stream>
