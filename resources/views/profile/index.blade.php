@extends('layouts.front2')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                               <div class="name">
                                    {{ $post->name }}
                                </div>
                                <div class="body">
                                    {{ $post->gender }}
                                </div>
                                <div class="body">
                                    {{ $post->hobby }}
                                </div>
                                <div class="body">
                                    {{ $post->introduction }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
@endsection