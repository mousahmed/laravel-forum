@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header font-weight-bold">Notifications</div>

        <div class="card-body">

            <ul class="list-group">
                @foreach($notifications as $notification)
                    <li class="list-group-item">
                        @if($notification->type == 'LaravelForum\Notifications\NewReplyAdded')
                            A new Reply was added to your discussion
                        @endif

                        @if($notification->type == 'LaravelForum\Notifications\ReplyMarkedAsBestReply')
                            Your reply was marked as best reply to the discussion
                        @endif
                        <strong>{{$notification->data['discussion']['title']}}</strong>
                        <a href="{{route('discussions.show' ,$notification->data['discussion']['slug'] )}}"
                           class="text-white btn btn-info btn-sm float-right "><i class="fa fa-eye"></i> View</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection
