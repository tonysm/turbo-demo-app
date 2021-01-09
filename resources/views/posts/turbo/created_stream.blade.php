<turbo-stream target="post_cards" action="prepend">
    <template>
        @include('posts._post_card', ['post' => $post])
    </template>
</turbo-stream>

<turbo-stream target="empty_posts" action="remove"></turbo-stream>
