<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentFormRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentFormRequest $request)
    {
        return Comment::create($request->all());
    }
}
