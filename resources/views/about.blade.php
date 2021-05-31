@extends('layouts.skeleton')
@include('layouts.post-header');
@section('content')

    <!-- Main Content -->
    <div class="container">

        <div class="row">
            <div style="text-align: justify" class="col-lg-8 col-md-10">
                <h3>Why we do what we do?</h3>
                <hr>
                <p >Whenever we hear the term health we directly relate it to being sick and subconscious mind links it with
                    the nasty environment of hospitals. It doesn’t have to be so if we make ourselves aware and conscious.</p>
                <p>Swasthyapala emerges with a concept of building healthy environment around by sharing knowledge and
                    experiences of experts and enthusiasts. Currently the team is focused on writing articles and sharing
                    experiences in categories like Health & Fitness, Food, Agriculture, mental health, and self improvement.
                </p>
                <p>Any enthusiast or an expert can join simply by registering to our system. Anyone are allowed to write
                    anything on their own, no cross-checking or filtering from other authority will be done so whatever you
                    have written, it’s your personal property and you can edit or delete your content at any time.
                </p>
            </div>
        </div>
        <h3>Meet Our Team</h3>
        <hr>
        <div class="row">
            <div class="col-lg-4 col-sm-12 col-md-6 d-flex flex-column justify-content-center align-items-center">
                <img class="rounded-circle" src="{{ URL('/storage/images/mohan.jpg') }}" width="200" height="200">
                <p><b>Mohan Kumar Dhakal</b>
                </p>
                <p style="color:blue;text-align: center;margin-top:-20px">Flutter Developer</p>

                <p style="text-align: center;margin-top:-20px"> I am a Flutter Developer and a fitness Enthusiast and
                    Currently I am doing nothing.</p>
                <div class="col-lg-8 col-md-10 mx-auto">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="#">
                                <span class="fa-stack fa-sm">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <span class="fa-stack fa-sm">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <span class="fa-stack fa-sm">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 col-md-6 d-flex flex-column justify-content-center align-items-center">
                <img class="rounded-circle" src="{{ URL('/storage/images/mohan.jpg') }}" width="200" height="200">
                <p><b>Ghanshyam Joshi</b>
                </p>
                <p style="color:blue;text-align: center;margin-top:-20px">Machine Learning Engineer</p>

                <p style="text-align: center;margin-top:-20px"> I am a Flutter Developer and a fitness Enthusiast and
                    Currently I am doing nothing.</p>
                <div class="col-lg-8 col-md-10 mx-auto">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="#">
                                <span class="fa-stack fa-sm">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <span class="fa-stack fa-sm">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <span class="fa-stack fa-sm">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 col-md-6 d-flex flex-column justify-content-center align-items-center">
                <img class="rounded-circle" src="{{ URL('/storage/images/mohan.jpg') }}" width="200" height="200">
                <p><b>Jitendra Bhatta</b>
                </p>
                <p style="color:blue;text-align: center;margin-top:-20px">Java Developer</p>

                <p style="text-align: center;margin-top:-20px"> I am a Flutter Developer and a fitness Enthusiast and
                    Currently I am doing nothing.</p>
                <div class="col-lg-8 col-md-10 mx-auto">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="#">
                                <span class="fa-stack fa-sm">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <span class="fa-stack fa-sm">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <span class="fa-stack fa-sm">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
@endsection
