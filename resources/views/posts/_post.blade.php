<div>
    <h1>{{ $post->title }}</h1>

    <article>
        {!! nl2br(e($post->content)) !!}
    </article>
</div>
