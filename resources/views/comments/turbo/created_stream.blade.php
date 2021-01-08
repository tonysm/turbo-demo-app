<turbo-stream target="@domid($comment->post, 'comments')" action="append">
    <template>
        @include('comments._comment', ['comment' => $comment])
    </template>
</turbo-stream>

<turbo-stream target="@domid($comment->post, 'comments_count')" action="update">
    <template>
        @include('posts._post_comments_count', ['post' => $comment->post])
    </template>
</turbo-stream>

@unless(app()->runningInConsole())
    <turbo-stream target="new_comment" action="update">
        <template>
            @include('comments._form', ['post' => $comment->post, 'comment' => null])
        </template>
    </turbo-stream>
@endunless
