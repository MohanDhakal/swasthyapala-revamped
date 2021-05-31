<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login as Visitor</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ URL('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

</head>

<body>
    <div class="container m-5">
        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <div class="row">
            <div class="col-lg-8 col-md-12">
                <h4>Register Yourself Before Commenting</h4>

                <form action="{{ URL('/visitor/add') }}" method="POST">
                    @csrf
                    <div class="form-group mt-4">
                        <input type="hidden" name="slug" value="{{ Request::get('slug') }}">
                        <label><b>Name</b></label>
                        <input style="width:100%" name="name" class=" form-control-lg rounded" type="text"
                            placeholder="Your Name">
                    </div>
                    <div class="form-group mt-4">
                        <div class="form-group floating-label-form-group controls">
                            <label> <b>Email Address</b> </label>
                            <input style="width:100%" name="email" type="email" class="form-control-lg rounded"
                                placeholder="Email Address" id="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Submit Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
