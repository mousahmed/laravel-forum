<?php

namespace LaravelForum\Http\Controllers;

use Illuminate\Http\Request;
use LaravelForum\Discussion;
use LaravelForum\Http\Requests\Discussions\CreateDiscussionsRequest;
use LaravelForum\Reply;

class DiscussionsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified'])->only(['create', 'store', 'edit', 'update', 'delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('discussions.index')->with('discussions', Discussion::filterByChannels()->paginate(10));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('discussions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDiscussionsRequest $request)
    {
        //

        $data = $request->only(['title', 'content', 'slug', 'channel_id']);
        $data['slug'] = str_slug($request->title);
        auth()->user()->discussions()->create($data);
        session()->flash('success', 'The discussions has been created successfully');
        return redirect(route('discussions.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Discussion $discussion)
    {
        //
        return view('discussions.show', compact('discussion'));
    }

    public function reply(Discussion $discussion, Reply $reply)
    {
        $discussion->markAsBestReply($reply);
        return redirect()->back();
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
