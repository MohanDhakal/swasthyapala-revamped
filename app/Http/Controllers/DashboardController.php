<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Contact;
use App\Models\Post;
use App\Models\User;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //getting posts of the authenticated user

        $user = Auth::user();
        $posts = Post::where('authorId', $user->id)->orderBy('id','DESC')->get();
        $comments = [];


        foreach ($posts as $post) {

            $post->content = (strlen($post->content) > 50) ? substr($post->content, 0, 50) . '...' : $post->content;
            $post->tags = json_decode($post->tags);

            //get all the coments of the post
            $newComments = Comment::where('postId', $post->id)->orderBy('id','DESC')->get();
            array_push($comments, $newComments);

            foreach ($newComments as $comment) {
                $visitor = Visitor::where('id', $comment->visitorId)->first();
                $comment->title = $post->title;
                $comment->name = $visitor->name;
            }
        }
        // dd($comments);

        //get all the message sent
        $contacts = Contact::orderBy('id','DESC')->get();

        return view('blog.dashboard')->with('posts', $posts)->with('comments', $comments)->with('contacts', $contacts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
