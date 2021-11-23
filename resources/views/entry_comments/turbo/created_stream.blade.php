<turbo-stream target="@domid($comment->parent, 'comments')" action="append">
    <template>
        @include('comments._comment', ['comment' => $comment])
    </template>
</turbo-stream>

<turbo-stream target="@domid($comment->parent, 'create_comment')" action="update">
    <template>
        @include('entries._create_comment_trigger', ['entry' => $comment->parent])
    </template>
</turbo-stream>
