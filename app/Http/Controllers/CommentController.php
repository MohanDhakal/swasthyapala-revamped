<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function add(Request $request)
    {
        $msg = 'comment added sucessfully!!';
        $validator =   Validator::make($request->all(), [
            'comment' => 'required|string',
        ]);


        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        try {
            Comment::create([
                'visitorId' => $request->input('visitorId'),
                'postId' => $request->input('postId'),
                'content' => $request->input('comment'),
            ]);
        } catch (\Throwable $th) {
            $msg = 'error in your comment';
        }
        return back()->with('msg', $msg);
    }
    public function edit($id)
    {
    }
    public function update(Request $request, $id)
    {
    }
}
