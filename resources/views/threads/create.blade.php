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
                <h3 class="card-title">Create a New Thread!</h3>
                <form action="{{ route('threads.create') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <select name="subject" id="subject" class="form-control">
                                <option selected disabled>Choose</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}" >{{$subject->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" rows="10" class="form-control"></textarea>
                        </div>
                        <button type="submit"class="btn btn-primary">Create</button>
                    </form>                    
            </div>
        </div>
    </div>
</div>
@endsection
