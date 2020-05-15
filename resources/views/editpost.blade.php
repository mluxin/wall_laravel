@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit your post id # {{ $post->id }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(['url' => "updatepost/$post->id"]) !!}
                        {!! Form::text('content', $post->content) !!}
                        {!! Form::submit('Update your post') !!}
                    {!! Form::close() !!}

                    <br/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
