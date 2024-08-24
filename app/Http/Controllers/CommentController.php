<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCommentRequest;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $req)
    {

        $data = $req->validated();

        // Store the comment in the database
        Comment::create($data);
        return back()->with('success', 'Your comment has been submitted successfully.');
    }
}
