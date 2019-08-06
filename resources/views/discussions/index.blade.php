@extends('layouts.app')

@section('content')

    @if($discussions->count() > 0)
        @foreach($discussions as $discussion)
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div>
                            <img width="40px" height="40px" style="border-radius: 50%"
                                 src="{{Gravatar::src($discussion->user->email)}}" alt="">
                            <span class="ml-2 font-weight-bold">{{$discussion->user->name}}</span>
                        </div>
                        <div>
                            <a href="{{route('discussions.show',$discussion->slug)}}" class="btn btn-success"><i class="fa fa-eye"></i> View</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="text-center"><span class="font-weight-bold">{{$discussion->title}}</span></div>
                </div>
            </div>
        @endforeach
        <div class="d-flex justify-content-center mt-2">
        {{$discussions->links()}}
        </div>
    @endif


@endsection
