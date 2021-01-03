<turbo-stream target="@domid($comment)" action="remove"></turbo-stream>

<turbo-stream target="@domid($comment->post, 'comments_count')" action="update">
    <template>
        @include('posts._post_comments_count', ['post' => $comment->post])
    </template>
</turbo-stream>
