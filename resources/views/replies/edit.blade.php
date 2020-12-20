@extends('layouts.app')
@section('title', 'Edit your Replied')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            @include('threads.partials.sidebar')
        </div>
        <div class="col-md-8">
            @include('alert')   
            <div class="card">
                <div class="card-header">Edit your reply in this thread: {{ $reply->thread->title }}</div>
                <div class="card-body">
                    <form action="{{ route('replies.edit', $reply) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <textarea name="description" id="description" rows="10" class="form-control">{{ old('description') ?: $reply->description}}</textarea>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Update Reply</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
