<turbo-stream target="@domid($comment->post, 'comments')" action="append">
    <template>
        @include('comments._comment', ['comment' => $comment])
    </template>
</turbo-stream>

<turbo-stream target="new_comment" action="update">
    <template>
        @include('posts._create_comment_trigger', ['post' => $comment->post])
    </template>
</turbo-stream>
