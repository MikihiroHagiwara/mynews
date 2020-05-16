@extends('layouts.front2')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        @if (!is_null($headline))
            <div class="row">
                <div class="headline col-md-10 mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="caption mx-auto">
                                <div class="name">
                                    <h3>{{ str_limit($headline->name, 10) }}</h3>
                                </div>
                                <div　class="gender">
                                    <h3>{{ str_limit($headline->gender, 4) }}</h3>
                                </div>
                                <div class="hobby">
                                    <h3>{{ str_limit($headline->hobby, 100) }}</h3>
                                </div>
                                <div class="introduction">
                                    <h3>{{ str_limit($headline->introduction, 300) }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                               <div class="name">
                                    <h3>{{ str_limit($headline->name, 10) }}</h3>
                                </div>
                                <div　class="gender">
                                    <h3>{{ str_limit($headline->gender, 4) }}</h3>
                                </div>
                                <div class="hobby">
                                    <h3>{{ str_limit($headline->hobby, 150) }}</h3>
                                </div>
                                <div class="introduction">
                                    <h3>{{ str_limit($headline->introduction, 400) }}</h3> 
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection