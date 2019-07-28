@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">Channels</div>

        <div class="card-body">
            @if($channels->count() > 0)
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Discussions</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($channels as $index=>$channel)
                        <tr>
                            <th scope="row">{{ $index + $channels->firstItem()}}</th>
                            <td>{{$channel->name}}</td>
                            <td>{{$channel->discussions->count()}}</td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>
            <div class=" row justify-content-center">
                {{$channels->links()}}
            </div>
            @endif
        </div>

    </div>

@endsection
