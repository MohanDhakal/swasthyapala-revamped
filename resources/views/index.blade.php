@extends('layouts.app')
@section('content')
    <div class="container">
        <h3 class="mt-5">What do we write on?</h3>
        <hr>
        {{-- first section --}}
        <div class="row mt-5">
            <div class="col-lg-4 col-sm-12 col-md-12">
                <div class="container-fluid border border-info rounded-circle d-flex flex-column justify-content-center align-items-center"
                    style="height: 320px;width:320px;">
                    <div id="whatWeDo"
                        class="container m-auto rounded-circle d-flex flex-column justify-content-center align-items-center rounded"
                        style="height:290px;width:290px;background-color:rgb(11, 197, 11)">
                        <img class="w-50 h-50  " src="{{ URL(asset('/storage/images/family.png')) }}" alt="...">
                        <p>Lifestyle & Experiences</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 col-md-12 ">
                <div class="container-fluid border border-info rounded-circle d-flex flex-column justify-content-center align-items-center"
                    style="height: 320px;width:320px;">
                    <div id="whatWeDo"
                        class="container m-auto rounded-circle d-flex flex-column justify-content-center align-items-center"
                        style="height:290px;width:290px;background-color:rgb(11, 197, 11)">
                        <img class="w-50 h-40" src="{{ URL(asset('/storage/images/Food_image.png')) }}" alt="...">
                        <p>Food & Health</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 col-md-12 ">
                <div class="container-fluid border border-info rounded-circle d-flex flex-column justify-content-center align-items-center"
                    style="height: 320px;width:320px;">
                    <div id="whatWeDo"
                        class="container m-auto rounded-circle d-flex flex-column justify-content-center align-items-center"
                        style="height:290px;width:290px;background-color:rgb(11, 197, 11)">

                        <img class="w-50 h-50  " src="{{ URL(asset('/storage/images/meditation.png')) }}" alt="...">
                        <p>Mental Wellbeing</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- second section --}}
        <div>

            <h3 class="mt-5 ">Recent Articles</h3>
        </div>
        <hr>

        <div class="row">
            @foreach ($posts as $post)
                <div class="col-lg-4 col-sm-12 col-md-4">
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
        </div>
        {{-- third section --}}
        <hr>
        <div class="row">
            <h3 class="mt-5 ml-2">Let's Work Together</h3>

            <div class=" col-lg-12 col-sm-12 col-md-12"><b><a href="#">Swasthyapala</a></b> is the the team
                of enthusiasts and experts
                working
                co-operatively to help each other build a healthy environment.
            </div>
        </div>
    </div>

@endsection
