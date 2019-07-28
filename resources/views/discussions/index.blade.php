@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-end mb-2">
    <a href="{{route('discussions.create')}}" class="btn btn-success">Add Discussion</a>
</div>
    <div class="card">
        <div class="card-header">Discussions</div>

        <div class="card-body">
            @if($discussions->count() > 0)
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Channel</th>
                        <th scope="col">Author</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($discussions as $index=>$discussion)
                        <tr>
                            <th scope="row">{{ $index + $discussions->firstItem()}}</th>
                            <td>{{$discussion->title}}</td>
                            <td>{{$discussion->channel->name}}</td>
                            <td>{{$discussion->user->name}}</td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
                <div class="d-flex justify-content-center">
                    {{$discussions->links()}}
                </div>
            @endif
        </div>

    </div>

@endsection
