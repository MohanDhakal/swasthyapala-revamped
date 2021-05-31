<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Visitor;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    //

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->limit(3)->get();

        foreach ($posts as $post) {
            $post->content = (strlen($post->content) > 50) ? substr($post->content, 0, 50) . '...' : $post->content;
            $post->tags = json_decode($post->tags);
        }
        // dd($posts[0]->content);

        return view('index')->with('posts', $posts);
    }
    public function post()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        foreach ($posts as $post) {
            $post->content = (strlen($post->content) > 50) ? substr($post->content, 0, 50) . '...' : $post->content;
            $post->tags = json_decode($post->tags);
        }

        return view('post')->with('posts', $posts);
    }
    public function contact()
    {
        return view('contact');
    }
    public function admin()
    {
        return view('auth.register');
    }
    public function about()
    {
        return view('about');
    }
    public function postDetail($slug)
    {
        //get the post and it's comments with commentor detail;
        try {

            $post = Post::where('title', $slug)->first();
            $comments = Comment::where('postId', $post->id)->get();
            $cookieValue = Cookie::get('email');
            $visitor = Visitor::where('email', $cookieValue)->first();
            // dd($cookieValue);


            if ($comments !== null) {
                foreach ($comments as $comment) {
                    $localVisitor = Visitor::where('id', $comment->visitorId)->first();
                    $comment->name = $localVisitor->name;
                }
            }
        } catch (\Throwable $th) {
            return view('error')->with('msg', 'error retrieving posts!!!');
        }

        //get 5 recent article's title;

        $posts = Post::orderBy('created_at', 'desc')->limit(5)->get();

        return view('post-detail')->with('post', $post)->with('visitor', $visitor)->with('comments', $comments)->with('posts',$posts);
    }


    //error view
    public function error()
    {
        return view('error');
    }
}
