@extends('layouts.skeleton')
@include('layouts.post-header')

@section('content')

    <article>
        <div class="container">

            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            @if (Session::has('msg'))
                <div class="alert alert-info">
                    {{ Session::get('msg') }}
                </div>
            @endif

            {{-- <p>{{ $visitor->name ?? '' }}</p> --}}

            <h3>{{ $post->title }}</h3>
            <hr>
            <div class="row">
                <div class="col-lg-8 col-md-10 col-sm-12">
                    <a href="#">
                        <img class="img-fluid" src="{{ $post->imageUri }}" alt="">
                    </a>

                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-8 col-md-10 col-sm-10 " style="text-align:justify; ">
                    @php
                        echo $post->content;
                    @endphp
                </div>
                <div class="col-lg-4 col-md-2 col-sm-2">
                    <h4>Recent Articles</h4>
                    @isset($posts)
                        @foreach ($posts as $item)
                            <a href="#" style="color:blue">{{$item->title}}</a><br>
                        @endforeach
                    @endisset

                </div>
            </div>
            <div class="row">

                <div id="commentBox" class="col-lg-8 col-md-10 mt-5">

                    @isset($visitor)
                        <div>
                            @php
                                echo "You are logged in as : <b>$visitor->name</b>";
                            @endphp
                        </div>
                    @endisset

                    <br>
                    <div> <b>Add new comment</b> </div><br>
                    <form method="POST" action="{{ URL('/comment/add/') }}">
                        @csrf
                        <input type="hidden" name="visitorId" value="{{ $visitor->id ?? '' }}" />
                        <input type="hidden" name="slug" value="{{ $post->title }}">
                        <input type="hidden" name="postId" value="{{ $post->id }}">
                        <textarea name="comment" cols="50" rows="5" placeholder=" write your comment..."></textarea>
                        <button class="btn btn-primary mt-2 rounded" type="submit">Add Comment</button>
                    </form>
                </div>
            </div>
            <h3>Comments...</h3><br>

            @isset($comments)
                @foreach ($comments as $item)
                    <div class=" row">
                        <div class="col-md-6 col-lg-6">
                            <b> <i class="fa fa-user" style="font-size:24px;"></i>
                                &nbsp{{ $item->name }}</b>
                            <div style="margin-left: 14px;">{{ $item->content }}</div>
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>
    </article>

@endsection
