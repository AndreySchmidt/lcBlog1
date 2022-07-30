<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class EditController extends Controller
{
    public function __invoke(Comment $comment)
    {
        // $comments = auth()->user()->comments;
        // return view('personal.comment.edit');
        return view('personal.comment.edit', compact('comment'));
    }
    
}
