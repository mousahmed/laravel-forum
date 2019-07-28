@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">Create Discussions</div>

        <div class="card-body">
            <form action="{{route('discussions.store')}}" method="post">
                @csrf

                <div class="form-group">
                    <label for="title">Title</label>
                    <input id="title" type="text" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label  for="content">Content</label>
                        <textarea name="content" id="content" class="form-control" cols="10" rows="2"
                                  required></textarea>
                </div>
                @if($channels->count() > 0)
                    <div class="form-group">
                        <label for="channel">Channel</label>
                        <select name="channel_id" id="channel" class="form-control">
                            @foreach($channels as $channel)
                                <option value={{$channel->id}}>{{$channel->name}}</option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Create Discussion</button>
                </div>
            </form>
        </div>

    </div>

@endsection
