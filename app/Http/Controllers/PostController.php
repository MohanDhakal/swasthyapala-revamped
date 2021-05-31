<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Foreach_;

use function PHPUnit\Framework\isEmpty;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        foreach ($posts as $post) {
            $post->content = (strlen($post->content) > 50) ? substr($post->content, 0, 50) . '...' : $post->content;
            $post->tags = json_decode($post->tags);
        }

        return view('blog.dashboard')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.add-post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->hasFile('file')) {

            //get filename with extension
            $filenamewithextension = $request->file('file')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('file')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename . '_' . time() . '.' . $extension;

            //Upload File
            $request->file('file')->storeAs('public/post-images', $filenametostore);

            // you can save image path below in database
            $path = asset('storage/post-images/' . $filenametostore);
            exit;
        }

        //isEmpty is true if title and content is not empty        

        if ($title = isEmpty($request->input('title')) && $content = isEmpty($request->get('content'))) {

            // dd($request->input('featuredImage'));
            // get filename with extension

            $path = '';
            if ($request->hasFile('featuredImage')) {

                $filenamewithextension = $request->file('featuredImage')->getClientOriginalName();

                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

                //get file extension
                $extension = $request->file('featuredImage')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $filename . '_' . time() . '.' . $extension;

                //Upload File
                $request->file('featuredImage')->storeAs('public/post-images', $filenametostore);

                // you can save image path below in database
                $path = asset('storage/post-images/' . $filenametostore);
            }

            $request->validate([
                'title' => 'required|string',
                'content' => 'required|string',
                'featuredImage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'categories' => 'required',
            ]);

            $authorId = Auth::id();

            $post = Post::create([
                'title' => $request->input('title'),
                'content' => $request->get('content'),
                'imageUri' => $path,
                'tags' => json_encode(explode(" ", $request->input('tags'))),
                'categories' => json_encode($request->input('categories')),
                'authorId' => $authorId
            ]);

            return redirect('/dashboard')->with('status', ' post added sucessfully!');
        }
    }

    /**
     * @return \Illuminate\Http\Response
     * Display the specified resource.
     *
     * @param  int  $id
     */

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id', $id)->first();
        $tags = '';
        foreach (json_decode($post->tags) as $tag) {
            $tags = ($tags . ' ' . $tag);
        }
        // dd($post->imageUri);
        return view('blog.add-post')->with('post', $post)->with('tags', $tags)->with('route', '/posts/' . $post->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->content = $request->get('content');
        $post->tags = json_encode(explode(" ", $request->input('tags')));
        if (isEmpty($request->input('categories'))) {
            $post->categories = json_encode($request->input('categories'));
        }
        $post->save();
        return redirect('/dashboard')->with('status', ' post updated sucessfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        redirect('/dashboard')->with('status', ' post deleted sucessfully!!');
    }
}
