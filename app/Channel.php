<?php

namespace LaravelForum;



class Channel extends Model
{
    //
    public function discussions(){
        return $this->hasMany(Discussion::class);
    }


}
