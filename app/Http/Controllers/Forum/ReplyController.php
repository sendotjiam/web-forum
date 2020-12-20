<?php

namespace App\Http\Controllers\Forum;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Thread;
use App\Reply;

class ReplyController extends Controller
{
    public function __construct() {
        // make sure the users logged into this page already Logged in
        $this->middleware('auth');
    }

    public function store(Thread $thread) {
        $this->validate(request(), ['description' => 'required']);

        $thread->replies()->create([
            'user_id' => auth()->id(),
            'description' => request('description'),
            'hash' => str_random(32)
        ]);

        return back();
    }

    public function edit(Reply $reply) {
        $this->authorize('update', $reply); 
        return view('replies.edit', compact('reply'));
    }

    public function update(Reply $reply) {
        $this->authorize('update', $reply);
        $this->validate(request(), ['description' => 'required']);

        $reply->update([
            'description' => request('description'),
        ]);

        return back()->with('success', 'Edit Success');
    }
}
