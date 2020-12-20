@extends('layouts.app')
@section('title', 'Edit Thread')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            @include('threads.partials.sidebar')
        </div>
        <div class="col-md-8">
            @include('alert')
            <div class="card card-body">
                <h3 class="card-title">Edit this Thread!</h3>
                <form action="{{ route('threads.edit', $thread) }}" method="post" autocomplete="off">
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control{{ $errors->has('title') ? ' is_invalid' : '' }}" value="{{ old('title') ?: $thread->title }}">
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <select name="subject" id="subject" class="form-control">
                            <option selected disabled>Choose</option>
                                @foreach ($subjects as $subject)
                                    <option {{ $subject->id == $thread->subject_id ? " selected" : ""}} value="{{ $subject->id }}" >{{$subject->name}}</option>
                                @endforeach
                           </select>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="10" class="form-control{{ $errors->has('description') ? ' is_invalid' : ''}}">{{ old('description') ?: $thread->description }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>      
                <form action="{{ route('threads.delete', $thread) }}" method="post">
                    @csrf
                    <button type="submit" class="mt-3 btn btn-danger">Delete</button>
                </form>              
            </div>
        </div>
    </div>
</div>
@endsection
