<x-turbo-stream :target="[$comment->parent, 'comments']" action="append">
    @include('comments._comment', ['comment' => $comment])
</x-turbo-stream>

<x-turbo-stream :target="[$comment->parent, 'create_comment']" action="update">
    @include('entries._create_comment_trigger', ['entry' => $comment->parent])
</x-turbo-stream>
