<?php

namespace App\Http\Controllers\Forum;
use App\Subject;
use App\Thread;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function __construct() {
        // make sure the users logged into this page already Logged in
        $this->middleware('auth', ['except' => 'index']);
    }

    public function index() {
        $threads = Thread::withCount('replies')->latest()->paginate(5);
        return view('threads.index', compact('threads'));
    }

    public function mine() {
        $threads = auth()->user()->threads()->withCount('replies')->latest()->paginate(5);
        return view('threads.index', compact('threads'));
    }

    public function create() {
        $subjects = Subject::all();
        return view('threads.create', ['subjects' => $subjects]);
    }

    public function store() {
        $slug= str_slug(request('title'));

        auth()->user()->threads()->create([
            'title' => request('title'),
            'slug' => $slug,
            'description' => request('description'),
            'subject_id' => request('subject')
        ]);
        // $thread = new Thread;
        // $thread->user_id = auth()->id();
        // $thread->title = request('title');
        // $thread->slug = $slug;
        // $thread->description = request('description');
        // $thread->subject_id = request('subject');
        // $thread->save();
        return redirect()->route('threads.index')->with('success', 'Your thread was created!');
    }

    public function show($slug) {
        $thread = Thread::whereSlug($slug)->first();
        $replies = $thread->replies;
        return view('threads.show', compact('thread', 'replies'));
    }

    public function edit(Thread $thread) {

        $this->authorize('update', $thread);
        $subjects = Subject::all();
        return view('threads.edit', compact('thread', 'subjects'));
    }

    public function update(Thread $thread) {

        $this->authorize('update', $thread);

        $slug= str_slug(request('title'));
        $thread->update([
            'title' => request('title'),
            'slug' => $slug,
            'description' => request('description'),
            'subject_id' => request('subject')
        ]);

        // return redirect()->route('threads.show', $thread)->with('success', 'Thread was updated!');
        return back()->with('success', 'Your thread was updated!');;
    }

    public function destroy(Thread $thread) {
        $thread->delete();
        return redirect()->route('threads.me')->with('success', 'Thread deleted successfully!');
    }
}

