<x-admin-layout />
<div class="container">

    @if (session('status'))
        <div class="row mt-2">
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        </div>
    @endif
    <div class="row mt-2">
        <div>
            <a class="btn btn-primary" href="{{ URL('/posts/create') }}">Add New Post</a>
        </div>
    </div>

    <div class="row">
        <div class="mt-4 mb-6"><b>Yours Posts</b></div>
        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">Tags</th>
                        <th scope="col">Update</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($posts)
                        @foreach ($posts as $post)
                            <tr class="table-secondary">
                                <th scope="row">{{ $post->id }}</th>
                                <td><a href="{{ URL('post-detail/' . $post->title) }}"
                                        style="color: blue">{{ $post->title }}</a></td>
                                <td>@php echo $post->content; @endphp</td>
                                <td>
                                    @for ($i = 0; $i < count($post->tags); $i++)
                                        {{ '#' . $post->tags[$i] }}
                                    @endfor
                                </td>
                                <td><span style="color: green"><a
                                            href="{{ URL('/posts/' . $post->id . '/edit/') }}">Edit</a></span>/<span
                                        style="color: red"><a href="#"
                                            onclick="deletePost({{ $post->id }})">Delete</a></span>
                                </td>
                            </tr>
                        @endforeach

                    @endisset

                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="mt-5 mb-6"><b>Comments in your Posts</b></div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Post</th>
                    <th scope="col">Comments</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comments as $comment)
                    @foreach ($comment as $item)
                        <tr class="table-secondary">

                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td><a href="{{ URL('post-detail/' . $item->title) }}"
                                    style="color: blue">{{ $item->title }}</a></td>
                            <td>{{ $item->content }}</td>
                        </tr>
                    @endforeach

                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="mt-5 mb-6"><b>Messages From Visitors</b></div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Message</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr class="table-secondary">
                        <th scope="row">{{ $contact->id }}</th>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->message }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
