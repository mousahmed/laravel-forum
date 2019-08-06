@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.css">
@endsection

@section('content')


    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <img width="40px" height="40px" style="border-radius: 50%"
                         src="{{Gravatar::src($discussion->user->email)}}" alt="">
                    <span class="ml-2 font-weight-bold">{{$discussion->user->name}}</span>
                </div>

            </div>
        </div>

        <div class="card-body">
            <div class="text-center"><span class="font-weight-bold">{{$discussion->title}}</span></div>

            <hr>

            {!! $discussion->content !!}

            @if($discussion->bestReply)
                <hr>
                <div class="card my-3 ">
                    <div class="card-header  bg-success text-white">
                        <div class="d-flex justify-content-between">
                            <div>
                                <img width="40px" height="40px" style="border-radius: 50%"
                                     src="{{Gravatar::src($discussion->bestReply->user->email)}}" alt="">
                                <span class="ml-2 font-weight-bold">{{$discussion->bestReply->user->name}}</span>
                            </div>
                            <div class="mt-2">
                                <strong>Best Reply</strong>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        {!! $discussion->bestReply->content !!}
                    </div>
                </div>
            @endif
        </div>
    </div>
    @if($discussion->replies->count() > 0)
        @foreach($discussion->replies()->paginate(3) as $reply)
            <div class="card my-3">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <img width="40px" height="40px" style="border-radius: 50%"
                                 src="{{Gravatar::src($reply->user->email)}}" alt="">
                            <span class="ml-2 font-weight-bold">{{$reply->user->name}}</span>
                        </div>
                        @auth
                            @if(auth()->user()->id == $discussion->user->id )
                                <div>
                                    <form
                                        action="{{route('discussions.best-reply',['discussion'=>$discussion->slug,'rely'=>$reply->id])}}"
                                        method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Mark As Best Reply</button>
                                    </form>
                                </div>
                            @endif
                        @endauth

                    </div>
                </div>

                <div class="card-body">
                    {!! $reply->content !!}
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-center mt-2">
            {{$discussion->replies()->paginate(3)->links()}}
        </div>
    @endif
    <div class="card mt-4">
        <div class="card-header">
            Add a Reply
        </div>
        <div class="card-body">
            @auth
                <form action="{{route('replies.store',$discussion->slug)}}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="content">Content</label>
                        <input id="content" type="hidden" name="content">
                        <trix-editor input="content"></trix-editor>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-success">Reply</button>
                    </div>
                </form>
            @else
                <a href="{{route('login')}}" class="btn btn-info text-white"><strong>Sign In To Reply</strong></a>
            @endauth
        </div>
    </div>



@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.0/trix-core.js"></script>
@endsection
