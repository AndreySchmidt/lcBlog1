@extends('layouts.main')
@section('content')

<div><a href = "{{ route('main.index') }}" >Blog</a></div>


<div style="display:flex;">
    <div>

        @foreach($categories as $category)
        <div>
            <a href = "{{ route('category.post.index', $category->id) }}">{{ $category->title?? 'No category' }}</a>
        </div>
        @endforeach

    </div>

</div>
@endsection