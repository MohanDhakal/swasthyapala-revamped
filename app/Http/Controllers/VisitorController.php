<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Redirect;

class VisitorController extends Controller
{
    public function index()
    {
        return view('visitor');
    }

    public function authenticate(Request $request)
    {
        dd($request);
        // $credentials = $request->only('email', 'password');

    }

    public function add(Request $request)
    {
        $minutes = 7200;
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);

        try {

            $user = Visitor::where('email', '=', $request->input('email'))->first();

            if ($user === null) {
                //user doesn't exists already
                Visitor::create([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);

                //set email cookie for new user
                Cookie::queue(Cookie::make('email', $request->email, $minutes));
            }

            //retrieve post 
            // $post = Post::where('title', $request->slug)->first();

            $slug = $request->slug;

            return redirect()->route('post-detail', compact('slug'));

        } catch (\Throwable $th) {
            //throw $th;
            return view('error')->with('error', $th->getMessage());
        }
    }
}
