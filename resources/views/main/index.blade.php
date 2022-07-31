@extends('layouts.main')
@section('content')

<div><a href = "{{ route('main.index') }}" >Blog</a></div>


<div style="display:flex;">
    <div>
        <div><strong>Посты with пагинацией (в доках он в Database -> Pagination)</strong></div>
        @foreach($posts as $post)
        <div>
            <div><img src = "storage/{{ $post->preview_image }}"></div>
            <div>{{ $post->title }}</div>
            <div>Эта штука дергается из модели пост методом category: {{ $post->category->title?? 'No category' }}</div>
        </div>
        @endforeach

        <div class="row mx-auto">{{ $posts->links() }}</div>
    </div>
    <div>
        <div><strong>Рандомные посты</strong></div>
        @foreach($randomPosts as $post)
        <div>
            <div><img src = "storage/{{ $post->preview_image }}"></div>
            <div>{{ $post->title }}</div>
            <div>Эта штука дергается из модели пост методом category: {{ $post->category->title?? 'No category' }}</div>
        </div>
        @endforeach

        <div><strong>Популярные посты</strong></div>
        @foreach($likedPosts as $post)
        <div>
            <div><img src = "storage/{{ $post->preview_image }}"></div>
            <div>{{ $post->title }}</div>
            <div>Эта штука дергается из модели пост методом category: {{ $post->category->title?? 'No category' }}</div>
        </div>
        @endforeach

    </div>
</div>
@endsection