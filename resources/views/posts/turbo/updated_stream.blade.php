<turbo-stream target="@domid($post, 'header')" action="replace">
    <template>
        <turbo-frame id="@domid($post, 'header')">{{ $post->title }}</turbo-frame>
    </template>
</turbo-stream>

<turbo-stream target="@domid($post)" action="replace">
    <template>
        <turbo-frame id="@domid($post)">
            @include('posts._post', ['post' => $post])
        </turbo-frame>
    </template>
</turbo-stream>
