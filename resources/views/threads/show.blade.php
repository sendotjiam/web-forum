@extends('layouts.app')
@section('title', $thread->title)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            @include('threads.partials.sidebar')
        </div>
        <div class="col-md-8">
            @include('alert')
            <div class="card card-body mb-3">
                <div class="media">
                    <img class="mr-3 rounded-circle" src="{{ $thread->user->avatar(55) }}" alt="avatar">
                    <div class="media-body">
                        <h5 class="mt-0">{{ $thread->title }}</h5>
                        <div class="threads-published mb-3">
                            {{$thread->created_at->diffForHumans()}} 
                            &middot; 
                            {{ $thread->user->name }}
                            &middot; 
                            {{ $thread->subject->name }}

                            @can('update', $thread)
                                &middot;
                                <a href="{{ route('threads.edit', $thread) }}">Edit</a>
                            @endcan
                            
                        </div>
                        {{-- <div>{{ $thread->description }}</div> --}}
                    </div>
                </div>
                <div class="mt-2">
                    {!! nl2br($thread->description) !!}
                </div>
            </div>

            <div class="card card-body mb-3">
                @if ($replies->count())
                    @foreach ($replies as $reply)
                        <div class="media mb-3">
                            <img class="mr-3 rounded-circle" src="{{ $reply->user->avatar(50) }}" alt="avatar">
                            <div class="media-body">
                                {!! nl2br($reply->description) !!}
                                
                                <div class="thread-published mt-2">
                                    {{ $reply->created_at->diffForHumans() }}
                                    &middot;
                                    {{ $reply->user->name }}
                                    &middot;
                                    @can('update', $reply)
                                        <a href="{{ route('replies.edit', $reply) }}">Edit</a>    
                                    @endcan
                                    
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    No Reply to this thread.
                @endif
            </div>
            <div class="card card-body mt-4 pb-1">
                <form action="{{ route('replies.create', $thread)}}" method="post">
                    @csrf
                    
                    <div class="form-group">
                        <textarea name="description" id="description" class="form-control" rows="5" placeholder="Text your reply here..."></textarea>
                    </div>

                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary">Reply</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection