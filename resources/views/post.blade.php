@extends('layouts.skeleton')
@include('layouts.post-header')

@section('content')
    <!-- Post page Content -->

    <div class="container">
        <h3>Visit our Articles</h3>
        <hr>
        <div>{{ $cookie ?? '' }}</div>

        <div class="row">

            @isset($posts)
                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card border rounded">
                            <img class="card-img-top" src="{{ $post->imageUri ?? '/storage/images/post-sample-image.jpg' }}"
                                alt="Card image cap">
                            <div class="m-1" style="font-style: italic">
                                @foreach ($post->tags as $tag)
                                    {{ '#' . $tag }}
                                @endforeach
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <a href="{{ URL('/post-detail/' . $post->title) }}" class="btn btn-primary">Read Article</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- @endforeach --}}
            @endisset
        </div>
    </div>

@endsection
