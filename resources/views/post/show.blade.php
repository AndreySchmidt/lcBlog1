@extends('layouts.main')
@section('content')

<div><a href = "{{ route('main.index') }}" >Blog</a></div>
<div style="display:flex;">
    <div class="row mx-auto">
        <div><strong>{{ $post->title }}</strong> count: {{ $post->comments->count() }}</div>
        <div><strong>{{ $date->format('F') }}</strong> <strong>{{ $date->day }} . {{ $date->translatedFormat('F') }} . {{ $date->year }}</strong> {{ $date->format('H:i') }}</div>
        <div>
            <div><img src = "{{ asset( 'storage/' . $post->preview_image ) }}"></div>
            <div>{!! $post->content !!}</div>
            <div>Эта штука дергается из модели пост методом category: {{ $post->category->title?? 'No category' }}</div>
        </div>

    </div>

    <div class="row mx-auto"><strong>Похожие посты</strong></div>
    @foreach($relatedPosts as $post)
        <div class="row mx-auto"><a href = "{{ route('post.show', $post->id) }}">{{ $post->title }}</a></div>
    @endforeach

</div>
@endsection