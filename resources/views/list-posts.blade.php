@extends('layout.mainlayout')

@section('content')
    <div class="text-muted">
        <div class="container mt-5 mb-5">
            <div class="row filter_data">
                @foreach ($posts as $post)
                    <div class="col-xl-4 col-md-12 mb-1">
                        <div class="card">
                            <img class="card-img-top" src="/api/post/image/{{ $post->image }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ substr($post->content, 0,  60) }}...</p>
                                <span style="background-color:green; color:white; border-radius:20px; padding: 5px;">{{ $post->category->name}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
<b></b>
