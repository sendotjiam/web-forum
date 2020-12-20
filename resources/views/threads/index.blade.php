@extends('layouts.app')
@section('title', 'Welcome to the Dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            @include('threads.partials.sidebar')
        </div>
        <div class="col-md-8">
            @include('alert')
            <div class="card card-body">
                @foreach ($threads as $thread)
                    <a href="{{ route('threads.show', $thread->slug )}}" class="threads">
                        <div class="threads-body">
                            <div class="threads-title">{{$thread->title}}</div>
                            <div class="threads-published">
                                {{ $thread->created_at->diffForHumans() }} 
                                &middot; 
                                {{ $thread->user->name }}
                                &middot; 
                                {{ $thread->subject->name }}
                                &middot; 
                                {{ $thread->replies_count }} Replies
                            </div>
                        </div>
                    </a>
                @endforeach    
            </div>
            <br>
            {!! $threads->links() !!}
        </div>
    </div>
</div>
@endsection
