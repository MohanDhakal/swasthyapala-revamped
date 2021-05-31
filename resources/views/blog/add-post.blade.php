
@extends('blog.layouts.admin')
@section('content')
    <div class="container m-5">
        <div class="row">
            <div class="col-lg-10 col-sm-12">
                <label style="font-size: 30px;color:green;"><b>Add New Post</b></label>
                <hr>
                <form method="POST" action="{{ $route ?? '/posts' }}" enctype="multipart/form-data" accept="application">
                    @csrf

                    @isset($route)
                        {{ method_field('PUT') }}
                    @endisset

                    {{-- post title --}}
                    <div class="form-group mt-4">
                        <label><b>Title of Post*</b></label>
                        <input style="width:100%" class=" form-control-lg rounded" value="{{ $post->title ?? '' }}"
                            type="text" placeholder="Title of The Post" name="title" />
                    </div>

                    {{-- Image Upload --}}
                    @if (!isset($route))
                        <div class="form-group py-3">
                            <label for="featuredImage"><b>Add Featured Image* </b></label>
                            <input type="file" style="width:50%" class="form-control-file" name="featuredImage"
                                id="featuredImage">
                        </div>
                    @endif

                    {{-- Post Content --}}
                    <div class="form-group">
                        <label for="content"><b>Write Your Content*</b></label>
                        <input id="x" required type="hidden" name="content" value="{{ $post->content ?? '' }}" />
                        <trix-editor  input="x"></trix-editor>

                    </div>

                    {{-- Categories --}}
                    <div class="form-group ">
                        <div class="mt-2">
                            <label for="categories"><b>Select Category*</b></label>
                        </div>
                        <div class="mt-3 p-2 border-2 rounded  border-info">
                            <input type="checkbox" id="health" name="categories[]" value="health">
                            <label for="health">Health & Fitness&nbsp</label>
                            <input type="checkbox" id="agriculture" value="agriculture" name="categories[]">
                            <label for="agriculture">Agriculture&nbsp</label>
                            <input type="checkbox" id="lifestyle" value="lifestyle & experience" name="categories[]">
                            <label for="scales">Lifestyle and Experience&nbsp</label>
                            <input type="checkbox" id="mental" value="mental-health" name="categories[]">
                            <label for="scales">Mental Health</label>
                            <input type="checkbox" id="food" value="food" name="categories[]">
                            <label for="scales">Food</label>
                        </div>

                    </div>

                    {{-- tags --}}
                    <div class="form-group">
                        <label><b>Add Tags</b></label>
                        <input style="width:100%" class=" form-control-lg rounded" name="tags" value="{{ $tags ?? '' }}"
                            type="text" placeholder="tags are splitted with space: eg. health food" />
                    </div>

                    {{-- button --}}
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Submit Post</button>
                    </div>
                </form>
            </div>
            <div class="col-2 ">
                @foreach ($errors->all() as $error)
                    <span style="color: red">{{ $error }}</span><br><br>
                @endforeach
            </div>
        </div>

    </div>

@endsection
