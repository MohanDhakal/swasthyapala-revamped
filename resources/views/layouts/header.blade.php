    <div class="row ">
        <div class="mx-auto">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner d-none d-lg-block .d-xl-block .d-md-block " style="height:100vh;width:100vw">
                    <div class="carousel-item active" style="position: relative">
                        <img class="d-block w-100 h-100" src="{{ URL('/storage/images/carousel_first01.png') }} "
                            alt="First slide">
                        <a href="{{ URL('/post') }}" style="position: absolute;top:70%;left:40%; border-radius: 5px;
                        " class="btn btn-primary">Read Article</a>

                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 h-100" src="{{ URL('/storage/images/carousel_second01.png') }}"
                            alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100 h-100" src="{{ URL('/storage/images/carousel_third.png') }}"
                            alt="Third slide">
                        <a href="{{ URL('/contact') }}" style="position: absolute;top:70%;left:40%; border-radius: 5px;
                            " class="btn btn-primary">Contact Us</a>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
    </div>
