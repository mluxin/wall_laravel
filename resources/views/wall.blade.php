@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Wall</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => 'postonwall']) !!}
                        {!! Form::text('content') !!}
                        {!! Form::submit('Post on the wall') !!}
                    {!! Form::close() !!}

                    <br/>

                    <ul>
                    @foreach ($posts as $post)
                        <li>{{ $post->content }}
                            @if ($post->user_id == Auth::id())
                            <a href="{{ url('editpost', $post->id) }}">edit</a>
                            -
                            <a href="{{ url('deletepost', $post->id) }}">delete</a>
                            @endif
                        </li>
                    @endforeach
                    <ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
