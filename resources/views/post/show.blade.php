@extends('layouts.main')
@section('content')

<div><a href = "{{ route('main.index') }}" >Blog</a></div>
<div>
@auth()
<a href = "{{ route('personal.main.index') }}" >Личный кабинет</a>
@endauth
@guest()
<a href = "{{ route('personal.main.index') }}" >Войти</a>
@endguest
</div>

<div style="display:flex;">
    <div class="row mx-auto">
        <div><strong>{{ $post->title }}</strong> count коментариев: {{ $post->comments->count() }}</div>
        <div><strong>{{ $date->format('F') }}</strong> <strong>{{ $date->day }} . {{ $date->translatedFormat('F') }} . {{ $date->year }}</strong> {{ $date->format('H:i') }}</div>
        <div>
            <div><img src = "{{ asset( 'storage/' . $post->preview_image ) }}"></div>
            <div>{!! $post->content !!}</div>
            <div>Эта штука дергается из модели пост методом category: {{ $post->category->title?? 'No category' }}</div>
        </div>

        <div class = "row">
            <section class = "comment-list">
            @foreach($post->comments as $comment)
                <div class="mt-2">{{ $comment->user->name }}</div>
                <div class="">{{ $comment->message }}</div>
                <div class="">{{ $comment->dateAsCarbon->diffForHumans() }}</div>
            @endforeach
            </section>
            @auth()
            <div><strong>Коментарий</strong></div>
                <form action = "{{ route('post.comment.store', $post->id) }}" method="POST">
                    @csrf
                    <input type = "hidden" name = "post_id" value = "{{ $post->id }}" />
                    <textarea name = "message"></textarea>
                    <div><button class = "btn btn-primary" type = "submite">Ok</button></div>
                </form>
            </div>
            @endauth
        </div>

    <div class="row mx-auto"><strong>Похожие посты</strong></div>
    @foreach($relatedPosts as $post)
        <div class="row mx-auto"><a href = "{{ route('post.show', $post->id) }}">{{ $post->title }}</a></div>
    @endforeach
</div>
@endsection