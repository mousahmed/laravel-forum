@extends('layouts.app')

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
                </div>
            </div>




@endsection
