<?php

namespace LaravelForum;


use LaravelForum\Notifications\ReplyMarkedAsBestReply;

class Discussion extends Model
{
    //
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function markAsBestReply(Reply $reply)
    {
        $this->update([
            'reply_id' => $reply->id,
        ]);
        if($reply->user->id = $this->user->id){
            return;
        }
        $reply->user->notify(new ReplyMarkedAsBestReply($reply->discussion));
    }

    public function bestReply()
    {
        return $this->belongsTo(Reply::class, 'reply_id');
    }

    public function scopeFilterByChannels($builder)
    {
        if (request()->query('channel')) {
            $channel = Channel::where('slug', request()->query('channel'))->first();
            if ($channel) {
                return $builder->where('channel_id', $channel->id);
            }

            return $builder;
        }
        return $builder;
    }
}
