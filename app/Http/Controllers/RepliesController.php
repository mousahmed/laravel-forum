<?php

namespace LaravelForum\Http\Controllers;

use Illuminate\Http\Request;
use LaravelForum\Discussion;
use LaravelForum\Http\Requests\Replies\CreateRepliesRequest;
use LaravelForum\Notifications\NewReplyAdded;
use LaravelForum\Reply;

class RepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRepliesRequest $request, Discussion $discussion)
    {
        //

        $data = $request->only('content');

        auth()->user()->replies()->create([
            'content' => $data['content'],
            'discussion_id' => $discussion->id,

        ]);
        if ($discussion->user->id != auth()->user()->id) {
            $discussion->user->notify(new NewReplyAdded($discussion));
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
